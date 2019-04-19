<?php
/**
 * Created by PhpStorm.
 * User: bensa
 * Date: 13/04/2019
 * Time: 4:24 PM
 */

namespace AmineBundle\Controller;


use AmineBundle\Entity\Notification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
class NotificationController extends Controller
{
    public function displayAction(){


        $notficaiton = $this->getDoctrine()->getManager()->getRepository('AmineBundle:Notification')->findBy(array('icon'=>$this->getUser()->getId()));
        $session = new Session();
        $session->set('taille', sizeof($notficaiton));
        return $this->render('@Amine/remboursement/notification.html.twig',array(
            'notification' => $notficaiton,

        ));
    }

    public function supprimerNotifAction($id)
    {
        $notficaiton = $this->getDoctrine()->getManager()->getRepository('AmineBundle:Notification')->findBy(array('description'=>$id));
        var_dump($notficaiton);
        $em = $this->getDoctrine()->getManager();
        $em->remove($notficaiton[0]);
        $em->flush();
        return $this->redirectToRoute("remboursementBackIndex");
    }
}