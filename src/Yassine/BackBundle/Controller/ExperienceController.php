<?php

namespace Yassine\BackBundle\Controller;

use Yassine\BackBundle\Entity\Experience;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Experience controller.
 *
 */
class ExperienceController extends Controller
{
    /**
     * Lists all experience entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $experiences = $em->getRepository('YassineBackBundle:Experience')->findAll();

        return $this->render('@YassineBack/experience/liste.html.twig', array(
            'experiences' => $experiences,
        ));

    }
    public function indexbackAction()
    {
        $em = $this->getDoctrine()->getManager();

        $experiences = $em->getRepository('YassineBackBundle:Experience')->findAll();

        return $this->render('@YassineFront/experience/listexperience.html.twig', array(
            'experiences' => $experiences,
        ));

    }

    /**
     * Creates a new experience entity.
     *
     */
    public function newAction(Request $request)
    {
        $experience = new Experience();
        $experience->setNbRep(0);
        $experience->setTitreExperience( $request->get("comment"));
        $time=new \DateTime('now');
        $experience->setDateExperience($time);
        $experience->setIdClient($this->getUser()->getId());
        $experience->setValider(0);
            $em = $this->getDoctrine()->getManager();
            $em->persist($experience);
            $em->flush();
        # Setup the message
        $message = \Swift_Message::newInstance()
            ->setSubject('Ajout d un sujet au forum ')
            ->setFrom('assurance.empact@gmail.com')
            ->setTo($this->getUser()->getEmail())
            ->setBody('Chers clients , merci pour avoir ajouter 
            un sujet dans notre forum , nous allors le traiter et vous envoyer un mail de confirmation , merci de votre patient');

        # Send the message
        $this->get('mailer')->send($message);
            return $this->redirectToRoute('yassine_back_experience_view');
    }

    /**
     * Finds and displays a experience entity.
     *
     */
    public function showAction(Experience $experience)
    {
        $deleteForm = $this->createDeleteForm($experience);

        return $this->render('experience/show.html.twig', array(
            'experience' => $experience,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing experience entity.
     *
     */
    public function editAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $experience=$em->getRepository("YassineBackBundle:Experience")->find($id);
        $editForm = $this->createForm('Yassine\BackBundle\Form\ExperienceType', $experience);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('yassine_back_experience_view');
        }

        return $this->render('@YassineBack/experience/modifier.html.twig', array(
            'experience' => $experience,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a experience entity.
     *
     */
    public function validerAction(Request $request, $id)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('YassineBackBundle:Experience');
        $expierence = $repository->FindExperience($id);
        $expierence[0]->setValider(1);
        $userManager = $this->container->get('fos_user.user_manager');

        $em = $this->getDoctrine()->getManager();
        $em->persist($expierence[0]);
        $em->flush();
        # Setup the message
        $message = \Swift_Message::newInstance()
            ->setSubject('Message de validation du sujet ')
            ->setFrom('assurance.empact@gmail.com')
            ->setTo("yabid759@gmail.com")
            ->setBody('Chers clients , merci pour avoir ajouter 
            un sujet dans notre forum , votre demande d ajout a éte confirmer , merci de votre patient');

        # Send the message
        $this->get('mailer')->send($message);
        return $this->redirectToRoute('yassine_front_experienceliste');
    }

    public function deleteAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $experience=$em->getRepository("YassineBackBundle:Experience")->find($id);
        $em->remove($experience);
        $em->flush();
        return $this->redirectToRoute('yassine_back_experience_view');
    }

    public function deletebackAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $experience=$em->getRepository("YassineBackBundle:Experience")->find($id);
        $em->remove($experience);
        $em->flush();
        return $this->redirectToRoute('yassine_front_experienceliste');
    }

    /**
     * Creates a form to delete a experience entity.
     *
     * @param Experience $experience The experience entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Experience $experience)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('experience_delete', array('idExperience' => $experience->getIdexperience())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
