<?php
/**
 * @author Sebastian Pondo
 */

namespace Example\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    #[Route('/example/hello', name: 'example_hello')]
    public function __invoke()
    {
        return $this->render('@ExampleHello/hello.html.twig');
    }

}
