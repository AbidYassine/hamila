<?php

namespace HayderBundle\Controller;

use HayderBundle\Entity\Demande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Demande controller.
 *
 */
class DemandeController extends Controller
{
    /**
     * Lists all demande entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();


        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $demandes = $em->getRepository('HayderBundle:Demande')->findBy(['user'=>$user]);

        return $this->render('@HayderBundle/demande/index.html.twig', array(
            'demandes' => $demandes,
            'blocked' => $user->getBlocked(),
        ));
    }

    /**
     * Creates a new demande entity.
     *
     */
    public function newAction(Request $request)
    {
        $demande = new Demande();
        $form = $this->createForm('HayderBundle\Form\DemandeType', $demande);
        $form->handleRequest($request);
        $user = $this->container->get('security.token_storage')->getToken()->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            $demande->setEtat('Non traite');
            $demande->uploadPicture();
                $demande->setUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
            $em->flush();

            return $this->redirectToRoute('demande_show', array(
                'id' => $demande->getId())
            );
        }

        return $this->render('@HayderBundle/demande/new.html.twig', array(
            'demande' => $demande,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a demande entity.
     *
     */
    public function showAction(Demande $demande)
    {
        $deleteForm = $this->createDeleteForm($demande);

        return $this->render('@HayderBundle/demande/show.html.twig', array(
            'demande' => $demande,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing demande entity.
     *
     */
    public function editAction(Request $request, Demande $demande)
    {
        $deleteForm = $this->createDeleteForm($demande);



        $editForm = $this->createForm('HayderBundle\Form\DemandeType', $demande);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demande_edit', array('id' => $demande->getId()));
        }

        return $this->render('@HayderBundle/demande/edit.html.twig', array(
            'demande' => $demande,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function rechercheAction(){
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $demandes = $em->getRepository(Demande::class)->recherche($_GET['critere'],$user->getId());
        $resp = "";
        foreach ($demandes as $demande) {
            $resp .= "<tr> <td><a href='/hayder%20pi/web/app_dev.php/hayder/demande/".$demande->getId()."/show'>".$demande->getId()."</a></td><td>".$demande->getUser()."</td>
<td>".$demande->getEtat()."</td>
<td>".$demande->getTypeDemande()."</td>
<td>".$demande->getMotif()."</td>
<td>".$demande->getTypeSoin()."</td>
<td>".$demande->getTexteLibre()."</td>
<td>".$demande->getPieceJointe()."</td>
<td>".$demande->getDate()->format('d/m/Y')."</td>
<td><a href='/hayder%20pi/web/app_dev.php/hayder/pdf/".$demande->getReponse()."'>Reponse</a></td>   </tr>";
        }
        return new JsonResponse($resp);
    }

    /**
     * Deletes a demande entity.
     *
     */
    public function deleteAction(Request $request, Demande $demande)
    {
        $form = $this->createDeleteForm($demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($demande);
            $em->flush();
        }

        return $this->redirectToRoute('demande_index');
    }

    /**
     * Creates a form to delete a demande entity.
     *
     * @param Demande $demande The demande entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Demande $demande)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demande_delete', array('id' => $demande->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


}
