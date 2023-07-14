<?php

namespace Example\HelloBundle;

use Example\HelloBundle\DependencyInjection\ExampleHelloExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

/**
 * @author Sebastian Pondo
 */
class ExampleHelloBundle extends AbstractBundle
{

    public function getPath(): string
    {
        return dirname(__DIR__);
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return new ExampleHelloExtension();
    }

}
