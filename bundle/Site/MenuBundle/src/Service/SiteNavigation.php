<?php

namespace Site\MenuBundle\Service;

use Site\MenuBundle\Composite\SiteMenu;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SiteNavigation
{
    private SiteMenu $menu;

    public function __construct(
        readonly private UrlGeneratorInterface $url,
        readonly private ParameterBagInterface $params
    )
    {
        $this->menu = new SiteMenu("main");
        $this->parse($this->menu, $this->getPages());
    }

    public function menu(int $deep = 0): string
    {
        return $this->menu->show($deep);
    }

    private function getPages(): array
    {
        $pages = $this->params->get('pages');
        return (array) $pages;
    }

    private function parse(SiteMenu $menu, array $pages): void
    {
        foreach ($pages as $name => $page) {
            $label = $page['label'] ?? $name;
            $route = empty($page['route']) ? '' : $this->getUrl($page['route']);
            $cssClass = $page['style'] ?? '';
            if (!empty($page['pages']) && is_array($page)) {
                $mainMenu = new SiteMenu($label, $route, $cssClass, $menu->getDeep()+1);
                $menu->addMenu($mainMenu);
                $this->parse($mainMenu, $page['pages']);
            } else {
                $menu->addMenu(new SiteMenu($label, $route, $cssClass, $menu->getDeep()+1));
            }
        }
    }

    private function getUrl(string $route)
    {
        if ($route) {
            try {
                return $this->url->generate($route);
            } catch (RouteNotFoundException $ex) {}
        }
        return "";
    }
}
