<?php

namespace Youssef\FrontBundle\Controller;

use AmineBundle\Controller\CotisationController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Youssef\BackBundle\Entity\Offre;
use Youssef\BackBundle\Entity\Souscription;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class SouscriptionController extends Controller
{
    public function PdfViewAction(Request $request)
    {
        $montant = $request->get("montant");
        $enfant = $request->get("enfant");
        $conjoint = $request->get("conjoint");
        $id_offre = $request->get("idOffre");
        $em = $this->getDoctrine()->getManager();

        $offre = $em->getRepository('YoussefBackBundle:Offre')->find($id_offre);
        $html = $this->renderView('@YoussefFront/Offre/pdf.html.twig', array(
            'offre' => $offre,
            'montant'=>$montant,
            'c' =>$conjoint,
            'e'=>$enfant
        ));
        $filename = 'Devis.pdf';
        $pdf = $this->get("knp_snappy.pdf")->getOutputFromHtml($html);
$user =$em->getRepository('AppBundle:User')->find($this->getUser()->getId());

        # Setup the message
        $message = \Swift_Message::newInstance()
            ->setBody('Bonjour Mr/Mme '.$user->getPrenom().' '.$user->getNom().' Empact Assurance Vous remercie pour votre confiance. vous trouvrez ci-joint votre devis')
            ->setFrom('assurance.empact@gmail.com')
            ->setTo($this->getUser()->getEmail())
            ->setSubject('Devis assurance');

        $attachement = \Swift_Attachment::newInstance($pdf, $filename, 'application/pdf' );
        $message->attach($attachement);

        # Send the message
        $this->get('mailer')->send($message);
        $referer = $request->headers->get('referer');
        return new RedirectResponse($referer);
    }

    public function souscrireViewAction(Request $request)
    {
        $montant = $request->get("montant");
        $tranche = $request->get("tranche");
        $enfant = $request->get("enfant");
        $conjoint = $request->get("conjoint");
        $id_offre = $request->get("idOffre");
        $em = $this->getDoctrine()->getManager();

        $offre = $em->getRepository('YoussefBackBundle:Offre')->find($id_offre);
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $id = $user->getId();
        }
        $souscription = new Souscription();
        $souscription->setIdClient($id);
        $souscription->setNbEnfant($enfant);
        $souscription->setConjoint($conjoint);
        $souscription->setNombreTranche($tranche);
        $souscription->setMontant($montant);
        $souscription->setOffre($offre);
        $Controleramine = new CotisationController();

        $em = $this->getDoctrine()->getManager();

        \Stripe\Stripe::setApiKey("sk_test_3BfcKYYsg0lxlh9YfnqPB8JV00HI2dOreM");

        \Stripe\Charge::create([
            "amount" => floor($montant*100*0.285),
            "currency" => "eur",
            "source" => "tok_visa", // obtained with Stripe.js
            "description" => "Charge for youssef.hamila@esprit.tn"
        ]);

            $em->persist($souscription);
            $em->flush();
        $Controleramine->calculetCotisation($montant,$tranche,$em,$id,$id_offre,$souscription->getId());
        return $this->render('@YoussefFront/Offre/recherche.html.twig' );
    }
    public function userSouscriptionsAction(Request $request)
    {
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $id = $user->getId();
        }
        $em = $this->getDoctrine()->getManager();

        $souscriptions = $em->getRepository('YoussefBackBundle:Souscription')->findBy(
            array('idClient' => $id)
             );


        return $this->render('@YoussefFront/Souscription/userSouscriptions.html.twig' ,array (
            'souscriptions'=>$souscriptions,
        ));
    }
    public function userSouscriptionAfficheAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $souscription = $em->getRepository('YoussefBackBundle:Souscription')->find($id);
        return $this->render('@YoussefFront/Souscription/userSouscriptionAffiche.html.twig' ,array (
            'souscription'=>$souscription,
        ));
    }
    public function annulationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $souscription = $em->getRepository('YoussefBackBundle:Souscription')->find($id);
        $souscription->setAbonnement(1);
        $em->persist($souscription);
        $em->flush();
        return $this->redirectToRoute('youssef_front_userSouscription_souscription' );
    }
    public function homeAction()
    {

        return $this->render('@YoussefFront/Default/index.html.twig' );
    }

}