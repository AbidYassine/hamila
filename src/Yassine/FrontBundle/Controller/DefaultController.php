<?php

namespace Yassine\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YassineFrontBundle:Default:index.html.twig');
    }
}
