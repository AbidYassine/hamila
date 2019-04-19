<?php

namespace Youssef\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YoussefFrontBundle:Default:index.html.twig');
    }
}
