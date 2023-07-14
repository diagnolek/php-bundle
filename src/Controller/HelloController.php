<?php

namespace App\Controller;

use App\Event\CustomEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{

    public function __construct(
        readonly private EventDispatcherInterface $eventDispatcher
    ){}

    #[Route('/', name: 'app_hello')]
    public function index(): Response
    {

        //dd($this->container->get('app.abc_service'));

        $this->eventDispatcher->dispatch(new CustomEvent());

        return $this->render('hello/index.html.twig', [
            'controller_name' => 'HelloController',
        ]);
    }
}
