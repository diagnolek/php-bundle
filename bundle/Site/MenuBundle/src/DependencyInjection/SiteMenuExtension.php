<?php
/**
 * @author Sebastian Pondo
 */

namespace Site\MenuBundle\DependencyInjection;

use Site\MenuBundle\Service\SiteNavigation;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class SiteMenuExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../../config')
        );

        $container->register('site.menu_navigation', SiteNavigation::class);

        $loader->load('services.yaml');
        $loader->load('pages.yaml');
    }
}
