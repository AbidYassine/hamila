<?php

namespace Ali\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ali\BackBundle\Entity\rendezVous;
use Symfony\Component\HttpFoundation\Request;

class RendezVousController extends Controller
{
    public function newAction(Request $request)
    {

        $rendezVous = new rendezVous();
        $rendezVous->setEtat(0);
        $rendezVous->setIdExpert(null);

        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $id = $user->getId();
        }
        $rendezVous->setIdClient($id);
        $form = $this->createForm('Ali\BackBundle\Form\rendezVousType', $rendezVous);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rendezVous);
            $em->flush();

            return $this->redirectToRoute('ali_front_mesRendezVous_view');
        }

        return $this->render('@AliFront/rendezVous/ajout.html.twig', array(
            'rendezVous' => $rendezVous,
            'form' => $form->createView(),
        ));
    }
    public function mesRendezVousAction()
    {
        $this->RendezVousTermineeAction();
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $id = $user->getId();
        }
        $em = $this->getDoctrine()->getManager();

        $rendezVous = $em->getRepository('AliBackBundle:rendezVous')->FindMesRendezVous($id);
        return $this->render('@AliFront/rendezVous/mesRendezVous.html.twig', array(
            'mesRendezVous' => $rendezVous,
        ));
    }
    public function editAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $rendezVous=$em->getRepository("AliBackBundle:rendezVous")->find($id);
        $editForm = $this->createForm('Ali\BackBundle\Form\rendezVousType', $rendezVous);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ali_front_mesRendezVous_view');
        }

        return $this->render('@AliFront/rendezVous/modifier.html.twig', array(
            'rendezVous' => $rendezVous,
            'form' => $editForm->createView(),
        ));
    }


    /**
     * Deletes a expert entity.
     *
     */
    public function deleteAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $rendezVous=$em->getRepository("AliBackBundle:rendezVous")->find($id);
        $em->remove($rendezVous);
        $em->flush();
        return $this->redirectToRoute('ali_front_mesRendezVous_view');

    }
    public function likeAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $rendezVous=$em->getRepository("AliBackBundle:rendezVous")->find($id);
        $rendezVous->setEtat(3);
        $expert=$em->getRepository("AliBackBundle:Expert")->find($rendezVous->getIdExpert());
        $expert->setNote($expert->getNote()+2);
        $em->persist($rendezVous);
        $em->persist($expert);
        $em->flush();
        return $this->redirectToRoute('ali_front_mesRendezVous_view');

    }
    public function dislikeAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $rendezVous=$em->getRepository("AliBackBundle:rendezVous")->find($id);
        $rendezVous->setEtat(3);
        $expert=$em->getRepository("AliBackBundle:Expert")->find($rendezVous->getIdExpert());
        $expert->setNote($expert->getNote()-1);
        $em->persist($rendezVous);
        $em->persist($expert);
        $em->flush();
        return $this->redirectToRoute('ali_front_mesRendezVous_view');

    }
    public function RendezVousTermineeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AliBackBundle:rendezVous');
        $listeRendezVous=$repository->FindRendezVousTerminee();
        foreach ($listeRendezVous as $r)
        {
            $r->setEtat(2);
            $em->persist($r);
            $em->flush();
        }
    }
}
