<?php

namespace Ali\BackBundle\Controller;

use Ali\BackBundle\Entity\rendezVous;
use Ivory\GoogleMap\Map;
use Ivory\GoogleMap\Event\Event;
use Ivory\GoogleMap\Base\Coordinate;
use Ivory\GoogleMap\Overlay\MarkerShape;
use Ivory\GoogleMap\Overlay\MarkerShapeType;
use Ivory\GoogleMap\Overlay\Marker;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Rendezvous controller.
 *
 */
class rendezVousController extends Controller
{

    /**
     * Lists all expert entities.
     *
     */
    public function indexAction()
    {
        $this->RendezVousTermineeAction();
        $em = $this->getDoctrine()->getManager();

        $rendezVous = $em->getRepository('AliBackBundle:rendezVous')->findAll();

        return $this->render('@AliBack/rendezVous/liste.html.twig', array(
            'rendezVous' => $rendezVous,
        ));
    }

    /**
     * Creates a new expert entity.
     *
     */
    public function newAction(Request $request)
    {
        $rendezVous = new rendezVous();
        $form = $this->createForm('Ali\BackBundle\Form\rendezVousType', $rendezVous);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rendezVous);
            $em->flush();

            return $this->redirectToRoute('ali_back_rendezVous_view');
        }

        return $this->render('@AliBack/rendezVous/ajout.html.twig', array(
            'rendezVous' => $rendezVous,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a expert entity.
     *
     */
    public function showAction(Expert $expert)
    {
        $deleteForm = $this->createDeleteForm($expert);

        return $this->render('expert/show.html.twig', array(
            'expert' => $expert,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing expert entity.
     *
     */
    public function editAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $rendezVous=$em->getRepository("AliBackBundle:rendezVous")->find($id);
        $editForm = $this->createForm('Ali\BackBundle\Form\rendezVousType', $rendezVous);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ali_back_rendezVous_view');
        }

        return $this->render('@AliBack/rendezVous/modifier.html.twig', array(
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
        return $this->redirectToRoute('ali_back_rendezVous_view');

    }
    public function ListeRendezVousNonTraiteAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AliBackBundle:rendezVous');
        $listeRendezVous=$repository->FindRendezVousNonTraitee();
        return $this->render('@AliBack/rendezVous/rendezVousListe.html.twig', array(
            'rendezVous' => $listeRendezVous,
        ));
    }
    public function TraiterRendezVousAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $rendezVous=$em->getRepository("AliBackBundle:rendezVous")->find($id);
        $rendezVous->setEtat(1);
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {

            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $id = $user->getId();
        }
        $expert= $em->getRepository('AliBackBundle:Expert')->findOneBy(array('idAsUser' => $id));
        $rendezVous->setIdExpert($expert->getId());
        $em->persist($rendezVous);
        $em->flush();
        return $this->redirectToRoute('ali_back_rendezVous_view_traitee');
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
