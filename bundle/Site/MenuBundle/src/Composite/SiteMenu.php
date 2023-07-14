<?php
/**
 * @author Sebastian Pondo
 */

namespace Site\MenuBundle\Composite;

class SiteMenu extends Menu
{

    public function __construct(
        private string $name,
        private string $route = '',
        private string $cssClass = '',
        private int $deep = 0) {}

    function show(int $deep = 0): string
    {
        $id = rand(1000,9999);
        $str = '';
        if (count($this->menus)) {
            if ($this->deep >= $deep) {
                $str .= '<li class="nav-item'.($this->cssClass?" ".$this->cssClass : "").'">';
                $str .= '<a id="dropdownSubMenu'.$id.'" href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false" >'.$this->name.'</a>';
                $str .= '<ul aria-labelledby="dropdownSubMenu'.$id.'" class="dropdown-menu border-0 shadow">';
            }
            foreach ($this->menus as $menu) {
                $str .= $menu->show($deep);
            }
            if ($this->deep >= $deep) {
                $str .= '</ul>';
                $str .= '</li>';
            }
        } elseif ($this->deep >= $deep) {
            $str .= '<li class="nav-item p-0'.($this->cssClass?" ".$this->cssClass : "").'"><a href="'.$this->route.'" class="nav-link">'.$this->name.'</a></li>';
        }
        return $str;
    }

    function getDeep(): int
    {
        return $this->deep;
    }
}
