<?php

namespace HayderBundle\Controller;

use HayderBundle\Entity\Reclamation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Reclamation controller.
 *
 */
class ReclamationController extends Controller
{
    /**
     * Lists all reclamation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $reclamations = $em->getRepository('HayderBundle:Reclamation')->findBy(['user'=>$user]);

        return $this->render('@HayderBundle/reclamation/index.html.twig', array(
            'blocked' => $user->getBlocked(),
            'reclamations' => $reclamations,
        ));
    }

    public function rechercheAction(){
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $reclamations = $em->getRepository(Reclamation::class)->recherche($_GET['critere'],$user->getId());
        $resp = "";
        foreach ($reclamations as $reclamation) {
            $resp .= "<tr> <td><a href='/hayder%20pi/web/app_dev.php/hayder/reclamation/".$reclamation->getId()."/show'>".$reclamation->getId()."</a></td><td>".$reclamation->getUser()."</td>
<td>".$reclamation->getEtat()."</td>
<td>".$reclamation->getTypeReclamation()."</td>
<td>".$reclamation->getTexteLibre()."</td>
<td>".$reclamation->getPieceJointe()."</td>
<td>".$reclamation->getDate()->format('d/m/Y')."</td>
<td><a href='/hayder%20pi/web/app_dev.php/hayder/pdf/".$reclamation->getReponse()."'>Reponse</a></td>
  </tr>";
        }
        return new JsonResponse($resp);
    }


    /**
     * Creates a new reclamation entity.
     *
     */
    public function newAction(Request $request)
    {
        $reclamation = new Reclamation();
        $form = $this->createForm('HayderBundle\Form\ReclamationType', $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $reclamation->setEtat('Non traite');
            $reclamation->uploadPicture();
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            if ($user != 'anon.')
                $reclamation->setUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();

            return $this->redirectToRoute('reclamation_show', array('id' => $reclamation->getId()));
        }

        return $this->render('@HayderBundle/reclamation/new.html.twig', array(
            'reclamation' => $reclamation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reclamation entity.
     *
     */
    public function showAction(Reclamation $reclamation)
    {
        $deleteForm = $this->createDeleteForm($reclamation);

        return $this->render('@HayderBundle/reclamation/show.html.twig', array(
            'reclamation' => $reclamation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reclamation entity.
     *
     */
    public function editAction(Request $request, Reclamation $reclamation)
    {
        $deleteForm = $this->createDeleteForm($reclamation);
        $editForm = $this->createForm('HayderBundle\Form\ReclamationType', $reclamation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reclamation_edit', array('id' => $reclamation->getId()));
        }

        return $this->render('@HayderBundle/reclamation/edit.html.twig', array(
            'reclamation' => $reclamation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reclamation entity.
     *
     */
    public function deleteAction(Request $request, Reclamation $reclamation)
    {
        $form = $this->createDeleteForm($reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reclamation);
            $em->flush();
        }

        return $this->redirectToRoute('reclamation_index');
    }

    /**
     * Creates a form to delete a reclamation entity.
     *
     * @param Reclamation $reclamation The reclamation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reclamation $reclamation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reclamation_delete', array('id' => $reclamation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
