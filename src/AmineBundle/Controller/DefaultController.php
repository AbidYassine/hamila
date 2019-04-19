<?php

namespace AmineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Amine/Default/index.html.twig');
    }

    public function indexBackAction()
    {
        return $this->render('@Amine/Default/indexBack.html.twig');
    }
}
