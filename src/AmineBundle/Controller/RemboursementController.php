<?php

namespace AmineBundle\Controller;

use AmineBundle\Entity\Notification;
use AmineBundle\Entity\Remboursement;
use AmineBundle\Entity\Souscription;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Remboursement controller.
 *
 */
class RemboursementController extends Controller
{
    /**
     * Lists all remboursement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $token = $this->get('security.token_storage')->getToken();

        if($user = $token->getUser()=='anon.'){
            return $this->redirectToRoute('fos_user_security_login');
        }

            $remboursements = $em->getRepository('AmineBundle:Remboursement')->findBy(array('idClient'=>$this->getUser()->getId()));
        return $this->render("@Amine/remboursement/index.html.twig", array(
            'remboursements' => $remboursements,
        ));
    }

    /**
     * Creates a new remboursement entity.
     *
     */
    public function newAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $identifantoffre=$em->getRepository('AmineBundle:Souscription')->findByIdClient($this->getUser()->getId());

        $emm=$this->getDoctrine()->getManager();
        $identifiantAssureur=$emm->getRepository('AmineBundle:Offre')->findByIdOffre($identifantoffre[0]->getIdOffre());
        $em=$this->getDoctrine()->getManager();
        $idsoucription=$em->getRepository('AmineBundle:Souscription')->findByIdClient($this->getUser()->getId());

        $remboursement = new Remboursement();

        $remboursement->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
        $remboursement->setIdSouscription($idsoucription[0]->getIdSouscription());
        $remboursement->setMontantRembourcement(10);
        $remboursement->setExtension('png');
        $remboursement->setValidation('En Cours de Traitement');
        $remboursement->setDateRembourcement('11/04/2019');
        $remboursement->setTypeRembourcement($request->get('Rembourcement'));
        $form = $this->createForm('AmineBundle\Form\RemboursementType', $remboursement);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $this->calculemontantRemboursement($remboursement);
            $em->persist($remboursement);
            $em->flush();

            return $this->redirectToRoute('remboursement_show', array('idRemboursement' => $remboursement->getIdremboursement()));
        }

        return $this->render("@Amine/remboursement/new.html.twig", array(
            'remboursement' => $remboursement,
            'form' => $form->createView(),
        ));
    }

    public function newSousAction(Request $request,$id)
    {

        $em=$this->getDoctrine()->getManager();
        $identifantoffre=$em->getRepository('AmineBundle:Souscription')->findByIdClient($this->getUser()->getId());

        $emm=$this->getDoctrine()->getManager();
        $identifiantAssureur=$emm->getRepository('AmineBundle:Offre')->findByIdOffre($identifantoffre[0]->getIdOffre());
        $em=$this->getDoctrine()->getManager();
        $idsoucription=$em->getRepository('AmineBundle:Souscription')->findByIdClient($this->getUser()->getId());

        $remboursement = new Remboursement();

        $remboursement->setIdAssureur($identifiantAssureur[0]->getIdAssureur());
        $remboursement->setIdSouscription($id);
        $remboursement->setMontantRembourcement(10);
        $remboursement->setExtension('png');
        $remboursement->setValidation('En Cours de Traitement');
        $remboursement->setDateRembourcement('11/04/2019');
        $remboursement->setTypeRembourcement($request->get('Rembourcement'));
        $form = $this->createForm('AmineBundle\Form\RemboursementType', $remboursement);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $this->calculemontantRemboursement($remboursement,$id);
            $em->persist($remboursement);
            $em->flush();



            return $this->redirectToRoute('remboursement_show', array('idRemboursement' => $remboursement->getIdremboursement()));
        }

        return $this->render("@Amine/remboursement/new.html.twig", array(
            'remboursement' => $remboursement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a remboursement entity.
     *
     */
    public function showAction(Remboursement $remboursement)
    {
        $deleteForm = $this->createDeleteForm($remboursement);
        return $this->render("@Amine/remboursement/show.html.twig", array(
            'remboursement' => $remboursement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing remboursement entity.
     *
     */    public function editAction(Request $request, Remboursement $remboursement)

    {
        $deleteForm = $this->createDeleteForm($remboursement);
        $editForm = $this->createForm('AmineBundle\Form\RemboursementType', $remboursement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('remboursement_edit', array('idRemboursement' => $remboursement->getIdremboursement()));
        }

          return $this->render("@Amine/remboursement/edit.html.twig", array(
            'remboursement' => $remboursement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a remboursement entity.
     *
     */
    public function deleteAction(Request $request, Remboursement $remboursement)
    {
        $form = $this->createDeleteForm($remboursement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($remboursement);
            $em->flush();
        }

        return $this->redirectToRoute('remboursement_index');
    }

    /**
     * Creates a form to delete a remboursement entity.
     *
     * @param Remboursement $remboursement The remboursement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Remboursement $remboursement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('remboursement_delete', array('idRemboursement' => $remboursement->getIdremboursement())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function piecejointAction(Remboursement $remboursement){
        $deleteForm = $this->createDeleteForm($remboursement);

        return $this->render("@Amine/remboursement/piecejoint.html.twig", array(
            'remboursement' => $remboursement,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function testAction($id){
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('AmineBundle:Remboursement')->findByIdRemboursement($id);
        return $this->render('@Amine/remboursement/test.html.twig',array('modeles'=>$modeles));
    }
    public function lesidsAction(){
        $em=$this->getDoctrine()->getManager();
        $identifantoffre=$em->getRepository('AmineBundle:Souscription')->findByIdClient($this->getUser()->getId());

        $emm=$this->getDoctrine()->getManager();
        $identifiantAssureur=$emm->getRepository('AmineBundle:Offre')->findByIdOffre($identifantoffre[0]->getIdOffre());
        $em=$this->getDoctrine()->getManager();
        $idsoucription=$em->getRepository('AmineBundle:Souscription')->findByIdClient($this->getUser()->getId());
        return $this->render('@Amine/remboursement/new.html.twig',array('identifiantAssureur'=>$identifiantAssureur[0]->getIdAssureur() ,'idSouscription'=>$idsoucription[0]->getIdSouscription()));
    }

    public function calculemontantRemboursement($remboursement,$id){

        $em=$this->getDoctrine()->getManager();
        $identifantoffre=$em->getRepository('AmineBundle:Souscription')->find($id);
        var_dump($id);
        var_dump($identifantoffre);
        $emm=$this->getDoctrine()->getManager();
        $monoffre=$emm->getRepository('AmineBundle:Offre')->findByIdOffre($identifantoffre->getIdOffre());

        $pourcentageVisite=$monoffre[0]->getPourcentageVisiteOffre();
        $pourcentageMedicament=$monoffre[0]->getPourcentageMedicamentOffre();
        $pourcentageOperation=$monoffre[0]->getPourcentageOperationOffre();

        $plafondVisite=$monoffre[0]->getPlafondVisteOffre();
        $plafondMedicament=$monoffre[0]->getPlafondMediacementOffre();
        $plafondOperation=$monoffre[0]->getPlafondOperationOffre();

        if(strcmp($remboursement->getTypeRembourcement(), 'Medicament') == 0){
            if($remboursement->getMontantOperation()>$plafondMedicament){


                $plafond=$plafondMedicament;
                $pourcentage=( $pourcentageMedicament /100);
                $resultat = ( $plafond * $pourcentage );
                $remboursement->setMontantRembourcement($resultat);
            }
            else{
                $plafond=$remboursement->getMontantOperation();
                $pourcentage=( $pourcentageMedicament /100);
                $resultat = ( $plafond * $pourcentage );
                $remboursement->setMontantRembourcement($resultat);
            }
        }
        else if (strcmp($remboursement->getTypeRembourcement(), 'operation') == 0){


            if($remboursement->getMontantOperation()>$plafondOperation){
                $plafond=$plafondOperation;
                $pourcentage=( $pourcentageOperation /100);
                $resultat = ( $plafond * $pourcentage );
                $remboursement->setMontantRembourcement($resultat);
            }
            else{
                $plafond=$remboursement->getMontantOperation();
                $pourcentage=( $pourcentageOperation /100);
                $resultat = ( $plafond * $pourcentage );
                $remboursement->setMontantRembourcement($resultat);
            }
        }
        else{
            if($remboursement->getMontantOperation()>$plafondVisite){
                $plafond=$plafondVisite;
                $pourcentage=( $pourcentageVisite /100);
                $resultat = ( $plafond * $pourcentage );
                $remboursement->setMontantRembourcement($resultat);

            }
            else{
                $plafond=$remboursement->getMontantOperation();
                $pourcentage=( $pourcentageVisite /100);
                $resultat = ( $plafond * $pourcentage );
                $remboursement->setMontantRembourcement($resultat);
            }
        }

    }


    public function choixAction(){
        $em = $this->getDoctrine()->getManager();
        $souscription = $em->getRepository('AmineBundle:Souscription')->findBy(array('idClient'=>$this->getUser()->getId()));
        var_dump($souscription);
        for($i = 0; $i < sizeof($souscription);$i++)
        {
            $idSous[$i]=$souscription[$i]->getIdSouscription();

        }


        return $this->render("@YoussefFront/Souscription/userSouscriptions.html.twig",array('souscriptions'=>$souscription));
    }

}
