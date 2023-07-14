<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

class AbcSubscriber implements EventSubscriberInterface
{
    public function onKernelController(ControllerEvent $event): void
    {
        $abc = "abc";
    }

    public function onKernelView(ViewEvent $event): void
    {
        $abc = "abc";
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::VIEW => 'onKernelView',
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
