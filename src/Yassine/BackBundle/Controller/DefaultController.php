<?php

namespace Yassine\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YassineBackBundle:Default:index.html.twig');
    }
}
