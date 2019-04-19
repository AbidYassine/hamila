<?php

namespace FarahBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Farah/Default/index.html.twig');
    }

    public function listeAction()
    {
        return $this->render('@Farah/Default/listeDon.html.twig');
    }
}
