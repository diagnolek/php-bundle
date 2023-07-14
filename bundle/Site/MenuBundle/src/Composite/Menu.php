<?php
/**
 * @author Sebastian Pondo
 */

namespace Site\MenuBundle\Composite;

abstract class Menu
{
    protected array $menus = [];

    abstract function show(): string;
    abstract function getDeep(): int;

    public function addMenu(Menu $menu): void
    {
        if (in_array($menu, $this->menus, true)) {
            return;
        }
        $this->menus[] = $menu;
    }

    public function removeMenu(Menu $menu): void
    {
        $this->menus = array_udiff($this->menus,[$menu],fn($a, $b) => $a !== $b);
    }

}
