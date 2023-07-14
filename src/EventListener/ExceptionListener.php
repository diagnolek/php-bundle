<?php
/**
 * @author Sebastian Pondo
 */

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
    public function __invoke(ExceptionEvent $event): void
    {
        // You get the exception object from the received event
        $exception = $event->getThrowable();
        $message = sprintf(
            "[%s][error] %s with code: %s\n",
            date('Y-m-d H:i:s'),
            $exception->getMessage(),
            $exception->getCode()
        );

        file_put_contents(PATH_CORE.'/data/error.log',$message);
    }
}
