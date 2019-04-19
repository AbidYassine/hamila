<?php

namespace HayderBundle\Controller;

use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HayderBundle\Entity\Demande;
use Symfony\Component\HttpFoundation\Request;

class DemandeBackController extends Controller
{
    /**
     * Lists all demande entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $dql   = "SELECT a FROM HayderBundle:Demande a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );


        $em = $this->getDoctrine()->getManager();
        $demandes= $em->getRepository(Demande::class)->findAll();
        $demande1 = 0;
        $demande2 = 0;
        $demande3 = 0;
        foreach ($demandes as $demande) {
            if($demande->getTypeDemande() == "Demande d informations sur les procédures")
                $demande1++;
            if($demande->getTypeDemande() == "Demande d informations sur les garanties")
                $demande2++;
            if($demande->getTypeDemande() == "Demande d informations sur adhésion")
                $demande3++;
        }
        $pieChart = new PieChart();
        $pieChart->getData()->setArrayToDataTable(
            [['Task', 'Hours per Day'],
                ['Demande d informations sur les procédures',      $demande1],
                ['Demande d informations sur les garanties',      $demande2],
                ['Demande d informations sur adhésion',      $demande3]
            ]
        );
        $pieChart->getOptions()->setTitle('Demandes');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);


        return $this->render('@HayderBundle/back/demande/index.html.twig', array(
            'demandes' => $pagination,
            'piechart'=> $pieChart,
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

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
            $em->flush();

            return $this->redirectToRoute('demande_show_back', array('id' => $demande->getId()));
        }

        return $this->render('@HayderBundle/back/demande/new.html.twig', array(
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

        return $this->render('@HayderBundle/back/demande/show.html.twig', array(
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

            return $this->redirectToRoute('demande_edit_back', array('id' => $demande->getId()));
        }

        return $this->render('@HayderBundle/back/demande/edit.html.twig', array(
            'demande' => $demande,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
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

        return $this->redirectToRoute('demande_index_back');
    }


    public function repondreAction(){
        dump($_POST);


        $em = $this->getDoctrine()->getManager();
        $reclamation = $em->getRepository(Demande::class)->find($_POST['id']);

        $reclamation->setReponse($_POST['reponse']);
        $reclamation->setEtat($_POST['etat']);
        $em->flush();

        return $this->redirectToRoute('demande_index_back');

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
