<?php
/**
 * @author Sebastian Pondo
 */

namespace App\EventListener;

use App\Event\CustomEvent;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

#[AsEventListener]
final class MyListener
{

    public function __invoke(CustomEvent $event): void
    {
        $abc = "abc";
    }

}
