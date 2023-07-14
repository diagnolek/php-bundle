<?php
/**
 * @author Sebastian Pondo
 */

namespace App\Service;


use Symfony\Component\DependencyInjection\Attribute\AsAlias;

#[AsAlias('app.abc_service')]
class Abc
{
    public function show(): string
    {
        return "Abc";
    }

}
