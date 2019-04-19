<?php

namespace Youssef\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@YoussefBack/Default/index.html.twig');
    }
}
