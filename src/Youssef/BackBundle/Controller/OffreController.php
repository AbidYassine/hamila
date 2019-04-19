<?php

namespace Youssef\BackBundle\Controller;
use AmineBundle\Entity\Avis;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ColumnChart;
use Youssef\BackBundle\Entity\Assureur;
use Youssef\BackBundle\Entity\Offre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Offre controller.
 *
 */
class OffreController extends Controller
{
    /**
     * Lists all offre entities.
     *
     */
    public function statAction(Request $request)
    {

        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        if($user = $token->getUser()=='anon.'){
            return $this->redirectToRoute('fos_user_security_login');
        }
        else if($user = $token->getUser() !='anon.'){
            $token = $this->get('security.token_storage')->getToken();
            $user = $token->getUser();
            if($user->hasRole('ROLE_AGENT')){
        $em = $this->getDoctrine()->getManager();
        $souscriptions = $em->getRepository('YoussefBackBundle:Souscription')->getstat();

         $data = array();
         $stat=['id offre','nombre souscription'];
         array_push($data,$stat);
         foreach ($souscriptions as $souscription)
         {

             $stat =array();
             array_push($stat,$souscription['Offre'],(int)$souscription['a']);
             $stat=[$souscription['Offre'],(int)$souscription['a']];
             array_push($data,$stat);
         }
         $oldColumnChart = new ColumnChart();
         $oldColumnChart->getData()->setArrayToDataTable(
             $data
         );
         $oldColumnChart->getOptions()->getLegend()->setPosition('bottom');
         $oldColumnChart->getOptions()->setWidth(700);
         $oldColumnChart->getOptions()->setHeight(400);
         $oldColumnChart->getOptions()->setTitle("statistique des offres");


         return $this->render('@YoussefBack/Offre/stat.html.twig', array(
             'oldColumnChart' => $oldColumnChart,

         ));
            }
        }


        else{
            return $this->redirectToRoute('fos_user_security_login');
        }
        return $this->redirectToRoute('fos_user_security_login');




    }
    public function indexAction()
    {

        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        if($user = $token->getUser()=='anon.'){
            return $this->redirectToRoute('fos_user_security_login');
        }
        else if($user = $token->getUser() !='anon.'){
            $token = $this->get('security.token_storage')->getToken();
            $user = $token->getUser();
            if($user->hasRole('ROLE_AGENT')){
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $id = $user->getId();
        }
        $em = $this->getDoctrine()->getManager();

        $offres = $em->getRepository('YoussefBackBundle:Offre')->findBy(

            ['Assureur' => $id]
        );

        return $this->render('@YoussefBack/Offre/liste.html.twig', array(
            'offres' => $offres,
        ));
            }
        }


        else{
            return $this->redirectToRoute('fos_user_security_login');
        }
        return $this->redirectToRoute('fos_user_security_login');



    }

    /**
     * Creates a new offre entity.
     *
     */
    public function newAction(Request $request)
    {

        $token = $this->get('security.token_storage')->getToken();
        $user = $token->getUser();
        if($user = $token->getUser()=='anon.'){
            return $this->redirectToRoute('fos_user_security_login');
        }
        else if($user = $token->getUser() !='anon.'){
            $token = $this->get('security.token_storage')->getToken();
            $user = $token->getUser();
            if($user->hasRole('ROLE_AGENT')){
        $offre = new Offre();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm('Youssef\BackBundle\Form\OffreType', $offre);
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $id = $user->getId();
        }
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ass = $em->getRepository('YoussefBackBundle:Assureur')->find($id);

            $offre->setAssureur($ass);
            $em = $this->getDoctrine()->getManager();
            $em->persist($offre);
            $em->flush();


            $avi = new Avis();
            $em2= $this->getDoctrine()->getManager();
            $repository = $em2
                ->getRepository('YassineBackBundle:Avis');
            $time=new \DateTime('now');
            $avi->setDateAvis($time);
            $avi->setRatingAvis(0);
            $avi->setIdOffre($offre->getId());
            $avi->setIdClient(14);
            $em2->persist($avi);
            $em2->flush();

            return $this->redirectToRoute('youssef_back_ajouter_offre');
        }

        return $this->render('@YoussefBack/Offre/ajout.html.twig', array(
            'offre' => $offre,
            'form' => $form->createView(),
        ));
    }
}


else{
    return $this->redirectToRoute('fos_user_security_login');
}
return $this->redirectToRoute('fos_user_security_login');



}

    /**
     * Finds and displays a offre entity.
     *
     */
    public function showAction(Offre $offre)
    {
        $deleteForm = $this->createDeleteForm($offre);

        return $this->render('offre/show.html.twig', array(
            'offre' => $offre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing offre entity.
     *
     */
    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $offre = $em->getRepository('YoussefBackBundle:Offre')->find($id);
        $editForm = $this->createForm('Youssef\BackBundle\Form\OffreType', $offre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('youssef_back_liste_offre');
        }

        return $this->render('@YoussefBack/Offre/modifier.html.twig', array(
            'offre' => $offre,
            'form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a offre entity.
     *
     */
    public function deleteAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $offre=$em->getRepository("YoussefBackBundle:Offre")->find($id);
        $em->remove($offre);
        $em->flush();
        return $this->redirectToRoute('youssef_back_liste_offre');

    }

    /**
     * Creates a form to delete a offre entity.
     *
     * @param Offre $offre The offre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Offre $offre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('offre_delete', array('id' => $offre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
