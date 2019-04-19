<?php

namespace Ali\BackBundle\Controller;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ColumnChart;
use Ali\BackBundle\Entity\Expert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Controller\RegistrationController;
/**
 * expert controller.
 *
 */
class ExpertController extends Controller
{
    public function calenderAction()
    {
        $em = $this->getDoctrine()->getManager();
        $experts = $em->getRepository('AliBackBundle:Expert')->findAll();
        return $this->render('@AliBack/rendezVous/calendar.html.twig');
    }
    /**
     * Lists all expert entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $experts = $em->getRepository('AliBackBundle:Expert')->findAll();
        return $this->render('@AliBack/expert/liste.html.twig', array(
            'experts' => $experts,
        ));
    }

    /**
     * Creates a new expert entity
     *
     */
    public function newAction(Request $request)
    {


       /* $expert = new Expert();
        $expert->setType('exp');
        $expert->setDisponibiliteExpert(1);
        $form = $this->createForm('Ali\BackBundle\Form\ExpertType', $expert);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($expert);
            $em->flush();
            return $this->redirectToRoute('ali_back_expert_view');
        }
        return $this->render('@AliBack/expert/ajout.html.twig', array(
            'expert' => $expert,
            'form' => $form->createView(),
        ));*/
    }
    /**
     * Displays a form to edit an existing expert entity.
     *
     */
    public function editAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $expert=$em->getRepository("AliBackBundle:Expert")->find($id);
        $editForm = $this->createForm('Ali\BackBundle\Form\ExpertType', $expert);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ali_back_expert_view');
        }

        return $this->render('@AliBack/expert/modifier.html.twig', array(
            'expert' => $expert,
            'form' => $editForm->createView(),
        ));
    }
    /**
     * Deletes a expert entity.
     *
     */
    public function deleteAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $expert=$em->getRepository("AliBackBundle:Expert")->find($id);
        $em->remove($expert);
        $em->flush();
        return $this->redirectToRoute('ali_back_expert_view');

    }
    public function statAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $experts = $em->getRepository('AliBackBundle:Expert')->findAll();
        $data = array();
        $stat=['id expert','note'];
        array_push($data,$stat);
        foreach ($experts as $expert)
        {

            $stat =array();
            array_push($stat,$expert->getNomExpert(),$expert->getNote());
            $stat=[$expert->getNomExpert(),$expert->getNote()];
            array_push($data,$stat);
        }
        $oldColumnChart = new ColumnChart();
        $oldColumnChart->getData()->setArrayToDataTable(
            $data
        );
        $oldColumnChart->getOptions()->getLegend()->setPosition('bottom');
        $oldColumnChart->getOptions()->setWidth(700);
        $oldColumnChart->getOptions()->setHeight(400);
        $oldColumnChart->getOptions()->setTitle("statistique note experts");


        return $this->render('@AliBack/expert/stat.html.twig', array(
            'oldColumnChart' => $oldColumnChart,

        ));
    }
}
