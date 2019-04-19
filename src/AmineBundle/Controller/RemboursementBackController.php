<?php

namespace AmineBundle\Controller;

use AmineBundle\Entity\Remboursement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Remboursement controller.
 *
 */
class RemboursementBackController extends Controller
{
    /**
     * Lists all remboursement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $remboursements = $em->getRepository('AmineBundle:Remboursement')->findBy(array('idAssureur'=>$this->getUser()->getId()));
        $idunique = array();


        for($i = 0; $i < sizeof($remboursements); ++$i) {
            $idClient[$i]=$remboursements[$i]->getIdClient();
        }
if(sizeof($remboursements)>=1)
{

        $idunique = array_unique($idClient);
        $user = $em->getRepository('AppBundle:User')->findBy(array('id'=>$idunique));
        return $this->render("@Amine/RemboursementBack/index.html.twig", array(
            'remboursements' => $remboursements,'client' => $user
        ));
}
else
    {


        return $this->render("@Amine/RemboursementBack/indexvide.html.twig");
  }
    }

    /**
     * Creates a new remboursement entity.
     *
     */


    /**
     * Finds and displays a remboursement entity.
     *
     */
    public function showAction(Remboursement $remboursement)
    {
        $deleteForm = $this->createDeleteForm($remboursement);
        return $this->render("@Amine/RemboursementBack/show.html.twig", array(
            'remboursement' => $remboursement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing remboursement entity.
     *
     */
    public function editAction(Request $request, Remboursement $remboursement)
    {
        $deleteForm = $this->createDeleteForm($remboursement);
        $editForm = $this->createForm('AmineBundle\Form\RemboursementBackType', $remboursement);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            # Setup the message
            $message = \Swift_Message::newInstance()
                ->setSubject('Traitement de Remboursement')
                ->setFrom('bensaid240896@gmail.com')
                ->setTo($this->getUser()->getEmail())
                ->setBody('Vous avez Demander une remboursement concernant : '.$remboursement->getTypeRembourcement().'<br>'.'le: '.
                $remboursement->getDateRembourcement().'<br>'.'Notre réponse est la suivante : '.$remboursement->getValidation().'<br>'.'Cordialement', 'text/html');
                    $this->get('mailer')->send($message);
            # Send the message

            return $this->redirectToRoute('remboursementBackEdit', array('idRemboursement' => $remboursement->getIdremboursement()));
        }

        return $this->render("@Amine/RemboursementBack/edit.html.twig", array(
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

        return $this->redirectToRoute('remboursementBackIndex');
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
            ->setAction($this->generateUrl('remboursementBackDelete', array('idRemboursement' => $remboursement->getIdremboursement())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    public function piecejointAction(Remboursement $remboursement){
        $deleteForm = $this->createDeleteForm($remboursement);

        return $this->render("@Amine/RemboursementBack/piecejoint.html.twig", array(
            'remboursement' => $remboursement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function supprimerRemboursementAction($idRemboursement)
    {
        $remboursement = $this->getDoctrine()->getManager()->getRepository('AmineBundle:Remboursement')->findBy(array('idRemboursement'=>$idRemboursement));
        $em = $this->getDoctrine()->getManager();
        $em->remove($remboursement[0]);
        $em->flush();
        return $this->redirectToRoute("remboursementBackIndex");
    }
    public function clientRemboursementAction($id){
        $em = $this->getDoctrine()->getManager();
        $remboursement = $em->getRepository('AmineBundle:Remboursement')->findBy(array('idClient'=>$id));
        return $this->render("@Amine/RemboursementBack/indexSpecifique.html.twig", array(
            'remboursements' => $remboursement
        ));
    }


}
