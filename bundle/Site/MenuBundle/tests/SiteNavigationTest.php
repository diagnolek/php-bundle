<?php
/**
 * @author Sebastian Pondo
 */

namespace Site\MenuBundle\Tests;

use Site\MenuBundle\Service\SiteNavigation;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SiteNavigationTest extends KernelTestCase
{

    public function testShowMenu(): void
    {
        self::bootKernel();

        $container = static::getContainer();
        $siteNavigator = $container->get(SiteNavigation::class);

        $this->assertStringContainsString('Wzorce', $siteNavigator->menu(1));
    }

}
