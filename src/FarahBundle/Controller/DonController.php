<?php

namespace FarahBundle\Controller;

use FarahBundle\Entity\Don;
use FarahBundle\Entity\HistoryDon;
use FarahBundle\Entity\ListeDon;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DonController extends Controller
{

    public function listeAction()

    {
        $repo = $this->getDoctrine()->getRepository(ListeDon::class);
        $liste = $repo->findAll();

        return $this->render('@Farah/Default/listeDon.html.twig', ['liste' => $liste,]);
    }

    public function listeBackAction()

    {
        $repo = $this->getDoctrine()->getRepository(ListeDon::class);
        $liste = $repo->findAll();

        return $this->render('@Farah/Default/listeDonBack.html.twig', ['liste' => $liste,]);
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository("FarahBundle:ListeDon")->find($id);
        $em->remove($list);
        $em->flush();
        return $this->redirectToRoute('farah_affiche_don_back');
    }

    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $listeDon = $em->getRepository('FarahBundle:ListeDon')->find($id);
        $editForm = $this->createForm('FarahBundle\Form\ListeDonType', $listeDon);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('farah_affiche_don_back');
        }

        return $this->render('@Farah/Default/modifier.html.twig', array(
            'list' => $listeDon,
            'form' => $editForm->createView(),
        ));
    }

    public function ajouterDonAction(Request $request)
    {
        if($request->getMethod() == "POST"){
            $nom = $request->get('nom');
            $prenom = $request->get('prenom');
            $desc = $request->get('desc');
            $somme = $request->get('somme');

            $don = new ListeDon();
            $don->setNom($nom);
            $don->setPrenom($prenom);
            $don->setDescription($desc);
            $don->setSomme($somme);
            $don->setSommeRestante($somme);

            $em = $this->getDoctrine()->getManager();
            $em->persist($don);
            $em->flush();

            $this->addFlash("success", "Don ajouter avec succeé");
            return$this->redirectToRoute('farah_don_ajouter');
        }
        return $this->render('@Farah/Don/ajouterDon.html.twig');
    }

    public function donateAction(Request $request, $idP)
    {
        $em = $this->getDoctrine()->getManager();
        $don = $em->getRepository('FarahBundle:ListeDon')->find($idP);
        if($request->getMethod() == "POST"){
            $somme = $request->get('somme');

            $donate = new Don();
            $donate->setSomme($somme);
            $donate->setIdClient($this->getUser()->getId());
            $donate->setIdP($idP);

            $don->setSommeRestante($don->getSommeRestante() - $somme);

            $history = new HistoryDon();
            $history->setDon($donate);
            $history->setUser($this->getUser());

            $em->persist($donate);
            $em->persist($history);
            $em->merge($don);
            $em->flush();
            $this->addFlash("success", "Merci de faire un don de " . $somme . "DT");
           // return $this->redirectToRoute('farah_don_donate', array('idP'=>$idP));
            return$this->redirectToRoute('farah_affiche_don');
        }
        return $this->render('@Farah/Don/donate.html.twig', array('don'=>$don));
    }

    public function showHistoryAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $history = $em->getRepository('FarahBundle:HistoryDon')->findAll();

        return $this->render('@Farah/Don/history.html.twig', array('history'=>$history));
    }

    public function deleteHistoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $don = $em->getRepository('FarahBundle:HistoryDon')->find($id);
        $em->remove($don);
        $em->flush();
        return$this->redirectToRoute('farah_don_history');
    }
}
