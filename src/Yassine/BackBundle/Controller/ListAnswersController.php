<?php

namespace Yassine\BackBundle\Controller;

use Yassine\BackBundle\Entity\Experience;
use Yassine\BackBundle\Entity\ListAnswers;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Listanswer controller.
 *
 */
class ListAnswersController extends Controller
{
    /**
     * Lists all listAnswer entities.
     *
     */
    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('YassineBackBundle:ListAnswers');
        $listAnswers = $repository->FindAnswers($id);
        $idexp=$id;
        return $this->render('@YassineBack/answers/listeanswers.html.twig', array(
            'listAnswers' => $listAnswers,
            'idexp' => $idexp,
        ));
    }


    /**
     * Creates a new listAnswer entity.
     *
     */
    public function newAction(Request $request)
    {
        $listAnswer = new ListAnswers();
        $form = $this->createForm('Yassine\BackBundle\Form\ListAnswersType', $listAnswer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($listAnswer);
            $em->flush();

            return $this->redirectToRoute('yassine_back_answer_list');
        }

        return $this->render('@YassineBack/answers/ajoutanswer.html.twig', array(
            'listAnswer' => $listAnswer,
            'form' => $form->createView(),
        ));
    }

    public function new2Action(Request $request)
    {
        $listAnswer = new ListAnswers();
        $comment = $request->get("comment");
        $time=new \DateTime('now');
        $listAnswer->setDateReponse($time);
        $listAnswer->setCommentaire($comment);
        $listAnswer->setIdClient($this->getUser()->getId());
        $listAnswer->setIdExperience($request->get("idexp"));
            $em = $this->getDoctrine()->getManager();
            $em->persist($listAnswer);
            $em->flush();

        /*****EXPERIENCE +1 NB REP *****/
        $expierence = new Experience();
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('YassineBackBundle:Experience');
        $expierence = $repository->FindExperience($request->get('idexp'));
        $expierence[0]->setNbRep($expierence[0]->getNbRep()+1);
        $em = $this->getDoctrine()->getManager();
        $em->persist($expierence[0]);
        $em->flush();
        /********************************/
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('YassineBackBundle:ListAnswers');
        $listAnswers = $repository->FindAnswers($request->get('idexp'));
        return $this->render('@YassineBack/answers/listeanswers.html.twig', array(
            'listAnswers' => $listAnswers,
            'idexp' => $request->get("idexp"),
        ));
    }


    /**
     * Finds and displays a listAnswer entity.
     *
     */
    public function showAction(ListAnswers $listAnswer)
    {
        $deleteForm = $this->createDeleteForm($listAnswer);

        return $this->render('listanswers/show.html.twig', array(
            'listAnswer' => $listAnswer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing listAnswer entity.
     *
     */
    public function editAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $list_answer=$em->getRepository("YassineBackBundle:ListAnswers")->find($id);
        $editForm = $this->createForm('Yassine\BackBundle\Form\ListAnswersType', $list_answer);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('YassineBackBundle:ListAnswers');
            $listAnswers = $repository->FindAnswers($request->get('idexp'));
            return $this->render('@YassineBack/answers/listeanswers.html.twig', array('listAnswers' => $listAnswers,
                'idexp' => $request->get("idexp"),
                ));
        }

        return $this->render('@YassineBack/answers/modifieranswer.html.twig', array(
            'listAnswer' => $list_answer,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a listAnswer entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $list_answer=$em->getRepository("YassineBackBundle:ListAnswers")->find($id);
        $em->remove($list_answer);
        $em->flush();
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('YassineBackBundle:ListAnswers');
        $listAnswers = $repository->FindAnswers($request->get('idexp'));
        return $this->render('@YassineBack/answers/listeanswers.html.twig', array(
            'listAnswers' => $listAnswers,
            'idexp' => $request->get("idexp"),
        ));


    }

    /**
     * Creates a form to delete a listAnswer entity.
     *
     * @param ListAnswers $listAnswer The listAnswer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ListAnswers $listAnswer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('listanswers_delete', array('idTopic' => $listAnswer->getIdtopic())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
