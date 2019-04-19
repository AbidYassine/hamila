<?php

namespace AmineBundle\Controller;

use AmineBundle\Entity\Cotisation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cotisation controller.
 *
 */
class CotisationBackController extends Controller
{
    /**
     * Lists all cotisation entities.
     *
     */
    public function indexAction()
    {

        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getRoles();

            $em = $this->getDoctrine()->getManager();
            $cotisations = $em->getRepository('AmineBundle:Cotisation')->findBy(array('idAssureur' => $this->getUser()->getId()));
            $idClient = array();
            $idunique = array();
            for ($i = 0; $i < sizeof($cotisations); ++$i) {
                $idClient[$i] = $cotisations[$i]->getIdClient();
            }

            $idunique = array_unique($idClient);
            $user = $em->getRepository('AppBundle:User')->findBy(array('id' => $idunique));
            return $this->render("@Amine/cotisationBack/index.html.twig", array(
                'cotisations' => $cotisations, 'client' => $user
            ));
        }



    /**
     * Creates a new cotisation entity.
     *
     */
    public function newAction(Request $request)
    {
        $cotisation = new Cotisation();
        $form = $this->createForm('AmineBundle\Form\CotisationType', $cotisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation);
            $em->flush();

            return $this->redirectToRoute('cotisation_show', array('idCotisation' => $cotisation->getIdcotisation()));
        }

        return $this->render("@Amine/cotisation/new.html.twig", array(
            'cotisation' => $cotisation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cotisation entity.
     *
     */
    public function showAction(Cotisation $cotisation)
    {
        $deleteForm = $this->createDeleteForm($cotisation);

        return $this->render("@Amine/cotisationBack/show.html.twig", array(
            'cotisation' => $cotisation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cotisation entity.
     *
     */
    public function editAction(Request $request, Cotisation $cotisation)
    {
        $deleteForm = $this->createDeleteForm($cotisation);

        $editForm = $this->createForm('AmineBundle\Form\CotisationType', $cotisation);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            # Setup the message
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('AppBundle:User')->findBy(array('id'=>$cotisation->getIdClient()));
            $message = \Swift_Message::newInstance()
                ->setSubject('Traitement de Paiement')
                ->setFrom('assurance.empact@gmail.com')
                ->setTo($user[0]->getEmail())
                ->setBody('Nous vous informer que votre facture qui coute : '.$cotisation->getPrixTtc().' dt'.'<br>'.'valable de : '.
                    $cotisation->getDateDebutCotisation().'=> '.$cotisation->getDateFinCotisation().'<br>'.'sont etat de paiement est : '.$cotisation->getPaiement().'<br>'.'Cordialement', 'text/html');
            $this->get('mailer')->send($message);
            # Send the message
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cotisationBackEdit', array('idCotisation' => $cotisation->getIdcotisation()));
        }

        return $this->render("@Amine/cotisationBack/edit.html.twig", array(
            'cotisation' => $cotisation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cotisation entity.
     *
     */
    public function deleteAction(Request $request, Cotisation $cotisation)
    {
        $form = $this->createDeleteForm($cotisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cotisation);
            $em->flush();
        }

        return $this->redirectToRoute('cotisationBackIndex');
    }

    /**
     * Creates a form to delete a cotisation entity.
     *
     * @param Cotisation $cotisation The cotisation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cotisation $cotisation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cotisation_delete', array('idCotisation' => $cotisation->getIdcotisation())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    public function calculetCotisation($prixoffre,$nbtranche)
    {
        $em = $this->getDoctrine()->getManager();
        $monoffre = $em->getRepository('AmineBundle:Souscription')->findByIdClient($this->getUser()->getId());
        $emm = $this->getDoctrine()->getManager();
        $identifiantAssureur = $emm->getRepository('AmineBundle:Offre')->findByIdOffre($monoffre[0]->getIdOffre());
        $em = $this->getDoctrine()->getManager();
        $idsoucription = $em->getRepository('AmineBundle:Souscription')->findByIdClient($this->getUser()->getId());


        if ($nbtranche == 1) {

            $cotisation = new Cotisation();
            //STATIC
            $cotisation->setIdSouscription($idsoucription[0]->getIdSouscription());
            $cotisation->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
            $cotisation->setIdClient($this->getUser()->getId());
            $cotisation->setTva(19);
            $cotisation->setPrixHt(($prixoffre / $nbtranche) * 0.81);
            $cotisation->setPrixTtc($prixoffre / $nbtranche);
            $cotisation->setPaiement("Non Payer");

            //Dynamique
            $datedebut = date('d-m-Y');

            $datefin = strtotime("+12 months", strtotime($datedebut));
            $datefin = strftime('%d-%m-%Y', $datefin);


            $cotisation->setDateDebutCotisation($datedebut);
            $cotisation->setDateFinCotisation($datefin);

            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation);
            $em->flush();
        }

        if ($nbtranche == 2) {

            $datedebut = date('d-m-Y');
            $datefin = strtotime("+6 months", strtotime($datedebut));
            $datefin = strftime('%d-%m-%Y', $datefin);

            $cotisation = new Cotisation();
            $cotisation->setIdSouscription($idsoucription[0]->getIdSouscription());
            $cotisation->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
            $cotisation->setIdClient($this->getUser()->getId());
            $cotisation->setTva(19);
            $cotisation->setPrixHt(($prixoffre / $nbtranche) * 0.81);
            $cotisation->setPrixTtc($prixoffre / $nbtranche);
            $cotisation->setPaiement("Non Payer");
            $cotisation->setDateDebutCotisation($datedebut);
            $cotisation->setDateFinCotisation($datefin);


            $datedebut1 = $datefin;
            $datefin1 = strtotime("+6 months", strtotime($datedebut1));
            $datefin1 = strftime('%d-%m-%Y', $datefin1);

            $cotisation1 = new Cotisation();
            $cotisation1->setIdSouscription($idsoucription[0]->getIdSouscription());
            $cotisation1->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
            $cotisation1->setIdClient($this->getUser()->getId());
            $cotisation1->setTva(19);
            $cotisation1->setPrixHt(($prixoffre / $nbtranche) * 0.81);
            $cotisation1->setPrixTtc($prixoffre / $nbtranche);
            $cotisation1->setPaiement("Non Payer");
            $cotisation1->setDateDebutCotisation($datedebut1);
            $cotisation1->setDateFinCotisation($datefin1);


            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation);
            $em->flush();

            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation1);
            $em->flush();

        }
        if ($nbtranche == 3) {

            $datedebut = date('d-m-Y');
            $datefin = strtotime("+4 months", strtotime($datedebut));
            $datefin = strftime('%d-%m-%Y', $datefin);

            $cotisation = new Cotisation();
            $cotisation->setIdSouscription($idsoucription[0]->getIdSouscription());
            $cotisation->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
            $cotisation->setIdClient($this->getUser()->getId());
            $cotisation->setTva(19);
            $cotisation->setPrixHt(($prixoffre / $nbtranche) * 0.81);
            $cotisation->setPrixTtc($prixoffre / $nbtranche);
            $cotisation->setPaiement("Non Payer");
            $cotisation->setDateDebutCotisation($datedebut);
            $cotisation->setDateFinCotisation($datefin);

            $datedebut1 = $datefin;
            $datefin1 = strtotime("+4 months", strtotime($datedebut1));
            $datefin1 = strftime('%d-%m-%Y', $datefin1);

            $cotisation1 = new Cotisation();
            $cotisation1->setIdSouscription($idsoucription[0]->getIdSouscription());
            $cotisation1->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
            $cotisation1->setIdClient($this->getUser()->getId());
            $cotisation1->setTva(19);
            $cotisation1->setPrixHt(($prixoffre / $nbtranche) * 0.81);
            $cotisation1->setPrixTtc($prixoffre / $nbtranche);
            $cotisation1->setPaiement("Non Payer");
            $cotisation1->setDateDebutCotisation($datedebut1);
            $cotisation1->setDateFinCotisation($datefin1);

            $datedebut2 = $datefin1;
            $datefin2 = strtotime("+4 months", strtotime($datedebut2));
            $datefin2 = strftime('%d-%m-%Y', $datefin2);

            $cotisation2 = new Cotisation();
            $cotisation2->setIdSouscription($idsoucription[0]->getIdSouscription());
            $cotisation2->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
            $cotisation2->setIdClient($this->getUser()->getId());
            $cotisation2->setTva(19);
            $cotisation2->setPrixHt(($prixoffre / $nbtranche) * 0.81);
            $cotisation2->setPrixTtc($prixoffre / $nbtranche);
            $cotisation2->setPaiement("Non Payer");
            $cotisation2->setDateDebutCotisation($datedebut2);
            $cotisation2->setDateFinCotisation($datefin2);

            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation);
            $em->flush();

            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation1);
            $em->flush();

            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation2);
            $em->flush();
        }

        if ($nbtranche == 4) {

            $datedebut = date('d-m-Y');
            $datefin = strtotime("+3 months", strtotime($datedebut));
            $datefin = strftime('%d-%m-%Y', $datefin);

            $cotisation = new Cotisation();
            $cotisation->setIdSouscription($idsoucription[0]->getIdSouscription());
            $cotisation->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
            $cotisation->setIdClient($this->getUser()->getId());
            $cotisation->setTva(19);
            $cotisation->setPrixHt(($prixoffre / $nbtranche) * 0.81);
            $cotisation->setPrixTtc($prixoffre / $nbtranche);
            $cotisation->setPaiement("Non Payer");
            $cotisation->setDateDebutCotisation($datedebut);
            $cotisation->setDateFinCotisation($datefin);

            $datedebut1 = $datefin;
            $datefin1 = strtotime("+3 months", strtotime($datedebut1));
            $datefin1 = strftime('%d-%m-%Y', $datefin1);

            $cotisation1 = new Cotisation();
            $cotisation1->setIdSouscription($idsoucription[0]->getIdSouscription());
            $cotisation1->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
            $cotisation1->setIdClient($this->getUser()->getId());
            $cotisation1->setTva(19);
            $cotisation1->setPrixHt(($prixoffre / $nbtranche) * 0.81);
            $cotisation1->setPrixTtc($prixoffre / $nbtranche);
            $cotisation1->setPaiement("Non Payer");
            $cotisation1->setDateDebutCotisation($datedebut1);
            $cotisation1->setDateFinCotisation($datefin1);

            $datedebut2 = $datefin1;
            $datefin2 = strtotime("+3 months", strtotime($datedebut2));
            $datefin2 = strftime('%d-%m-%Y', $datefin2);

            $cotisation2 = new Cotisation();
            $cotisation2->setIdSouscription($idsoucription[0]->getIdSouscription());
            $cotisation2->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
            $cotisation2->setIdClient($this->getUser()->getId());
            $cotisation2->setTva(19);
            $cotisation2->setPrixHt(($prixoffre / $nbtranche) * 0.81);
            $cotisation2->setPrixTtc($prixoffre / $nbtranche);
            $cotisation2->setPaiement("Non Payer");
            $cotisation2->setDateDebutCotisation($datedebut2);
            $cotisation2->setDateFinCotisation($datefin2);


            $datedebut3 = $datefin2;
            $datefin3 = strtotime("+3 months", strtotime($datedebut3));
            $datefin3 = strftime('%d-%m-%Y', $datefin3);
            $cotisation3 = new Cotisation();
            $cotisation3->setIdSouscription($idsoucription[0]->getIdSouscription());
            $cotisation3->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
            $cotisation3->setIdClient($this->getUser()->getId());
            $cotisation3->setTva(19);
            $cotisation3->setPrixHt(($prixoffre / $nbtranche) * 0.81);
            $cotisation3->setPrixTtc($prixoffre / $nbtranche);
            $cotisation3->setPaiement("Non Payer");
            $cotisation3->setDateDebutCotisation($datedebut3);
            $cotisation3->setDateFinCotisation($datefin3);


            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation);
            $em->flush();

            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation1);
            $em->flush();

            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation2);
            $em->flush();

            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation3);
            $em->flush();

        }

        if ($nbtranche == 6) {

            $datedebut = date('d-m-Y');
            $datefin = strtotime("+2 months", strtotime($datedebut));
            $datefin = strftime('%d-%m-%Y', $datefin);

            $cotisation = new Cotisation();
            $cotisation->setIdSouscription($idsoucription[0]->getIdSouscription());
            $cotisation->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
            $cotisation->setIdClient($this->getUser()->getId());
            $cotisation->setTva(19);
            $cotisation->setPrixHt(($prixoffre / $nbtranche) * 0.81);
            $cotisation->setPrixTtc($prixoffre / $nbtranche);
            $cotisation->setPaiement("Non Payer");
            $cotisation->setDateDebutCotisation($datedebut);
            $cotisation->setDateFinCotisation($datefin);

            $datedebut1 = $datefin;
            $datefin1 = strtotime("+2 months", strtotime($datedebut1));
            $datefin1 = strftime('%d-%m-%Y', $datefin1);

            $cotisation1 = new Cotisation();
            $cotisation1->setIdSouscription($idsoucription[0]->getIdSouscription());
            $cotisation1->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
            $cotisation1->setIdClient($this->getUser()->getId());
            $cotisation1->setTva(19);
            $cotisation1->setPrixHt(($prixoffre / $nbtranche) * 0.81);
            $cotisation1->setPrixTtc($prixoffre / $nbtranche);
            $cotisation1->setPaiement("Non Payer");
            $cotisation1->setDateDebutCotisation($datedebut1);
            $cotisation1->setDateFinCotisation($datefin1);

            $datedebut2 = $datefin1;
            $datefin2 = strtotime("+2 months", strtotime($datedebut2));
            $datefin2 = strftime('%d-%m-%Y', $datefin2);

            $cotisation2 = new Cotisation();
            $cotisation2->setIdSouscription($idsoucription[0]->getIdSouscription());
            $cotisation2->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
            $cotisation2->setIdClient($this->getUser()->getId());
            $cotisation2->setTva(19);
            $cotisation2->setPrixHt(($prixoffre / $nbtranche) * 0.81);
            $cotisation2->setPrixTtc($prixoffre / $nbtranche);
            $cotisation2->setPaiement("Non Payer");
            $cotisation2->setDateDebutCotisation($datedebut2);
            $cotisation2->setDateFinCotisation($datefin2);


            $datedebut3 = $datefin2;
            $datefin3 = strtotime("+2 months", strtotime($datedebut3));
            $datefin3 = strftime('%d-%m-%Y', $datefin3);
            $cotisation3 = new Cotisation();
            $cotisation3->setIdSouscription($idsoucription[0]->getIdSouscription());
            $cotisation3->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
            $cotisation3->setIdClient($this->getUser()->getId());
            $cotisation3->setTva(19);
            $cotisation3->setPrixHt(($prixoffre / $nbtranche) * 0.81);
            $cotisation3->setPrixTtc($prixoffre / $nbtranche);
            $cotisation3->setPaiement("Non Payer");
            $cotisation3->setDateDebutCotisation($datedebut3);
            $cotisation3->setDateFinCotisation($datefin3);


            $datedebut4 = $datefin3;
            $datefin4 = strtotime("+2 months", strtotime($datedebut4));
            $datefin4 = strftime('%d-%m-%Y', $datefin4);
            $cotisation4 = new Cotisation();
            $cotisation4->setIdSouscription($idsoucription[0]->getIdSouscription());
            $cotisation4->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
            $cotisation4->setIdClient($this->getUser()->getId());
            $cotisation4->setTva(19);
            $cotisation4->setPrixHt(($prixoffre / $nbtranche) * 0.81);
            $cotisation4->setPrixTtc($prixoffre / $nbtranche);
            $cotisation4->setPaiement("Non Payer");
            $cotisation4->setDateDebutCotisation($datedebut4);
            $cotisation4->setDateFinCotisation($datefin4);

            $datedebut5 = $datefin4;
            $datefin5 = strtotime("+2 months", strtotime($datedebut5));
            $datefin5 = strftime('%d-%m-%Y', $datefin5);
            $cotisation5 = new Cotisation();
            $cotisation5->setIdSouscription($idsoucription[0]->getIdSouscription());
            $cotisation5->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
            $cotisation5->setIdClient($this->getUser()->getId());
            $cotisation5->setTva(19);
            $cotisation5->setPrixHt(($prixoffre / $nbtranche) * 0.81);
            $cotisation5->setPrixTtc($prixoffre / $nbtranche);
            $cotisation5->setPaiement("Non Payer");
            $cotisation5->setDateDebutCotisation($datedebut5);
            $cotisation5->setDateFinCotisation($datefin5);

            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation);
            $em->flush();

            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation1);
            $em->flush();

            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation2);
            $em->flush();

            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation3);
            $em->flush();

            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation4);
            $em->flush();

            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation5);
            $em->flush();

        }

    }
    public function appelcalculAction($prixoffre,$nbtranche){
        $this->calculetCotisation($prixoffre,$nbtranche);
        return $this->render("@Amine/cotisation/test.html.twig");
    }
    public function utilisateurNom($id){
        $em=$this->getDoctrine()->getManager();
        $utilisateur=$em->getRepository('AppBundle:User')->find($id);
        return $utilisateur->getNom();
    }
    public function utilisateurPrenom($id){
        $em=$this->getDoctrine()->getManager();
        $utilisateur=$em->getRepository('AppBundle:User')->find($id);
        return $utilisateur->getPrenom();
    }
    public function detailClientAction($id){
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findBy(array('id'=>$id));
        return $this->render("@Amine/CotisationBack/detailClient.html.twig", array('nom' => $user[0]->getNom(),'prenom'=> $user[0]->getPrenom(),'email' => $user[0]->getEmail()));
    }
    public function listClientAction($id){
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findBy(array('id'=>$id));
        return $this->render("@Amine/CotisationBack/listClient.html.twig", array('nom' => $user[0]->getNom(),'prenom'=> $user[0]->getPrenom(),'email' => $user[0]->getEmail()));
    }
    public function clientCotisationAction($id){
        $em = $this->getDoctrine()->getManager();
        $cotisations = $em->getRepository('AmineBundle:Cotisation')->findBy(array('idClient'=>$id));
        return $this->render("@Amine/cotisationBack/indexSpecifique.html.twig", array(
            'cotisations' => $cotisations
        ));
    }
    public function supprimerCotisationAction($id){
        $cotisation = $this->getDoctrine()->getManager()->getRepository('AmineBundle:Cotisation')->findBy(array('idCotisation'=>$id));
        $em = $this->getDoctrine()->getManager();
        $em->remove($cotisation[0]);
        $em->flush();
        $em = $this->getDoctrine()->getManager();
        $cotisations = $em->getRepository('AmineBundle:Cotisation')->findBy(array('idAssureur'=>$this->getUser()->getId()));
        $idClient = array();
        $idunique = array();


        for($i = 0; $i < sizeof($cotisations); ++$i) {
            $idClient[$i]=$cotisations[$i]->getIdClient();
        }

        $idunique = array_unique($idClient);

        $user = $em->getRepository('AppBundle:User')->findBy(array('id'=>$idunique));


        return $this->render("@Amine/cotisationBack/index.html.twig", array(
            'cotisations' => $cotisations, 'client' => $user
        ));
    }
}
