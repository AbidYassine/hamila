<?php

namespace Yassine\BackBundle\Controller;

use Yassine\BackBundle\Entity\Avis;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Avi controller.
 *
 */
class AvisController extends Controller
{
    /**
     * Lists all avi entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $avis = $em->getRepository('YassineBackBundle:Avis')->findAll();

        return $this->render('@YassineBack/avis/liste.html.twig', array(
            'avis' => $avis,
        ));
    }

    /**
     * Creates a new avi entity.
     *
     */
    public function newAction(Request $request)
    {
        $avi = new Avis();
        $form = $this->createForm('Yassine\BackBundle\Form\AvisType', $avi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $avi->setRatingAvis($request->get("id"));
            dump($avi);
            $em = $this->getDoctrine()->getManager();
            $em->persist($avi);
            $em->flush();

            return $this->redirectToRoute('yassine_back_avis_list');
        }

        return $this->render('@YassineBack/avis/ajout.html.twig', array(
            'avis' => $avi,
            'form' => $form->createView(),
        ));
    }



    public function new2Action(Request $request,$id,$idclient,$idoffre,$conjoint,$enfant,$montant)
    {

        $em = $this->getDoctrine()->getManager();
        $avis = $em->getRepository('YassineBackBundle:Avis')->findBy(array('idClient'=>$this->getUser()->getId(),'idOffre'=>$idoffre));
        if(sizeof($avis)==1)
        {
            $avis[0]->setRatingAvis($id);
            $em = $this->getDoctrine()->getManager();
            $em->persist($avis[0]);
            $em->flush();
        }
        else
        {
            $avi = new Avis();
            $form = $this->createForm('Yassine\BackBundle\Form\AvisType', $avi);
            $form->handleRequest($request);
            $time=new \DateTime('now');
            $avi->setDateAvis($time);
            $avi->setRatingAvis($id);
            $avi->setIdClient($idclient);
            $avi->setIdOffre($idoffre);
            $em = $this->getDoctrine()->getManager();
            $em->persist($avi);
            $em->flush();
        }

        $offre = $em->getRepository('YoussefBackBundle:Offre')->find($idoffre);
        return $this->render('@YoussefFront/Offre/afficheOffre.html.twig', array(
            'offre' => $offre,
            'montant' => $montant,
            'c' => $conjoint,
            'e' => $enfant,
        ));

          //  return $this->redirectToRoute('youssef_front_recherche_offres');
    }






    /**
     * Finds and displays a avi entity.
     *
     */
    public function showAction(Avis $avi)
    {
        $deleteForm = $this->createDeleteForm($avi);

        return $this->render('avis/show.html.twig', array(
            'avi' => $avi,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing avi entity.
     *
     */
    public function editAction(Request $request, Avis $avi)
    {
        $deleteForm = $this->createDeleteForm($avi);
        $editForm = $this->createForm('Yassine\BackBundle\Form\AvisType', $avi);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('avis_edit', array('idAvis' => $avi->getIdavis()));
        }

        return $this->render('avis/edit.html.twig', array(
            'avi' => $avi,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a avi entity.
     *
     */
    public function deleteAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $experience=$em->getRepository("YassineBackBundle:Avis")->find($id);
        $em->remove($experience);
        $em->flush();
        return $this->redirectToRoute('yassine_back_avis_list');

    }

    /**
     * Creates a form to delete a avi entity.
     *
     * @param Avis $avi The avi entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Avis $avi)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('avis_delete', array('idAvis' => $avi->getIdavis())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
