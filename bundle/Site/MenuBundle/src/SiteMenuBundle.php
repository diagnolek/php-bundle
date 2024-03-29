<?php
/**
 * @author Sebastian Pondo
 */

namespace Site\MenuBundle;

use Site\MenuBundle\DependencyInjection\SiteMenuExtension;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

class SiteMenuBundle extends AbstractBundle
{

    public function getPath(): string
    {
        return dirname(__DIR__);
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return new SiteMenuExtension();
    }

}
