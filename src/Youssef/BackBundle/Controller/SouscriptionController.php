<?php

namespace Youssef\BackBundle\Controller;

use Youssef\BackBundle\Entity\Souscription;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Souscription controller.
 *
 */
class SouscriptionController extends Controller
{
    /**
     * Lists all souscription entities.
     *
     */
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
        $em = $this->getDoctrine()->getManager();
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $id = $user->getId();
        }
        $souscriptions = $em->getRepository('YoussefBackBundle:Souscription')->getadminSouscription($id);

        return $this->render('@YoussefBack/Souscription/liste.html.twig', array(
            'souscriptions' => $souscriptions,
        ));
            }
        }


        else{
            return $this->redirectToRoute('fos_user_security_login');
        }
        return $this->redirectToRoute('fos_user_security_login');




    }

    /**
     * Creates a new souscription entity.
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
        $souscription = new Souscription();
        $form = $this->createForm('Youssef\BackBundle\Form\SouscriptionType', $souscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($souscription);
            $em->flush();

            return $this->redirectToRoute('youssef_back_liste_Souscription');
        }

        return $this->render('@YoussefBack/Souscription/ajout.html.twig', array(
            'souscription' => $souscription,
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
     * Finds and displays a souscription entity.
     *
     */
    public function showAction(Souscription $souscription)
    {
        $deleteForm = $this->createDeleteForm($souscription);

        return $this->render('souscription/show.html.twig', array(
            'souscription' => $souscription,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing souscription entity.
     *
     */
    public function editAction(Request $request, $id )
        {
            $em = $this->getDoctrine()->getManager();
            $souscription = $em->getRepository('YoussefBackBundle:Souscription')->find($id);
            $editForm = $this->createForm('Youssef\BackBundle\Form\SouscriptionType', $souscription);
            $editForm->handleRequest($request);

            if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('youssef_back_liste_Souscription');
        }

        return $this->render('@YoussefBack/Souscription/modifier.html.twig', array(
            'offre' => $souscription,
            'form' => $editForm->createView()
));
}

    /**
     * Deletes a souscription entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $souscription=$em->getRepository("YoussefBackBundle:Souscription")->find($id);
        $em->remove($souscription);
        $em->flush();
        return $this->redirectToRoute('youssef_back_liste_Souscription');
    }
    public function desabonnementInterfaceAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $souscription=$em->getRepository("YoussefBackBundle:Souscription")->find($id);

        return $this->render('@YoussefBack/Souscription/traiterCas.html.twig', array(
            'souscription' => $souscription,
            ));
    }
    public function accepterAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $souscription=$em->getRepository("YoussefBackBundle:Souscription")->find($id);
        $em->remove($souscription);
        $em->flush();
        return $this->redirectToRoute('youssef_back_liste_Souscription');
    }
    public function refuserAction(Request $request,$id)
    {
        //envoi d'un mail au client pour l'informer du refus de sa demande
        $em=$this->getDoctrine()->getManager();
        $souscription=$em->getRepository("YoussefBackBundle:Souscription")->find($id);
        $souscription->setAbonnement(0);
        $em->persist($souscription);
        $em->flush();
        return $this->render('@YoussefBack/Souscription/refuser.html.twig'

        );
    }
    public function RechercheAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        if ($_GET!=null){
            $x=$_GET['x'];

            $query = $em->createQuery("SELECT a FROM YoussefBackBundle:Souscription a WHERE a.id LIKE :motcle or a.nbEnfant LIKE :motcle or a.idClient LIKE :motcle or a.nombreTranche LIKE :motcle or a.conjoint LIKE :motcle or a.dateSouscription LIKE :motcle or a.montant LIKE :motcle or a.abonnement LIKE :motcle ");

            //$results=$em->getRepository('MoezBackBundle:promotion')->findByEtat($x);
            $query->setParameter('motcle', '%'.$x.'%');
            $results = $query->getResult();
            return $this->render('@YoussefBack/Souscription/ajax.html.twig', array(
                'souscriptions' => $results,
            ));
        } else
            $jeux= $em->getRepository('YoussefBackBundle:Souscription')->findAll();


        return $this->render('@YoussefBack/Souscription/ajax.html.twig', array(
            'souscriptions' => $jeux,
        ));
    }

}
