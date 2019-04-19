<?php

namespace HayderBundle\Controller;

use AppBundle\Entity\User;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use HayderBundle\Entity\Demande;
use HayderBundle\Entity\Reclamation;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function statAction()
    {

        $em = $this->getDoctrine()->getManager();
        $reclamations = $em->getRepository(Reclamation::class)->findAll();
        $demandes= $em->getRepository(Demande::class)->findAll();
        $infoproc = [];
        $pieChart = new PieChart();
        $pieChart->getData()->setArrayToDataTable(
            [['Task', 'Hours per Day'],
                ['Reclamations', sizeof($reclamations)],
                ['Demandes',      sizeof($demandes)]
            ]
        );
        $pieChart->getOptions()->setTitle('My Daily Activities');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);

        return $this->render('@HayderBundle/Default/stat.html.twig', array('piechart' => $pieChart));
    }

    public function blockAction($id){
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);
        $user->setBlocked('true');
        $em->flush();
    }


    public function pdfAction($reponse)
    {
        $html = $this->renderView('@HayderBundle/Default/pdf.html.twig', array('reponse'=>$reponse

        ));

        return new PdfResponse(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            'file.pdf'
        );
    }


}
