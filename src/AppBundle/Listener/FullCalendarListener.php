<?php

namespace AppBundle\Listener;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Toiba\FullCalendarBundle\Entity\Event;
use Toiba\FullCalendarBundle\Event\CalendarEvent;
use Symfony\Component\HttpFoundation\Request;

use Ali\BackBundle\Entity\rendezVous;
class FullCalendarListener
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var UrlGeneratorInterface
     */
    private $router;
    private $container;
    public function __construct(EntityManagerInterface $em, UrlGeneratorInterface $router ,ContainerInterface $container)
    {
        $this->em = $em;
        $this->router = $router;
        $this->container=$container;
    }
    public function loadEvents(CalendarEvent $calendar)
    {
        $startDate = $calendar->getStart();
        $endDate = $calendar->getEnd();
        $filters = $calendar->getFilters();


       $id= $this->container->get('security.token_storage')->getToken()->getUser()->getId();
       $expert=$this->em->getRepository('AliBackBundle:Expert')->findOneBy(
            array('idAsUser' => $id));
        $rendezVous = $this->em->getRepository('AliBackBundle:rendezVous')->findBy(
                array('idExpert' => $expert->getId()));
        foreach ($rendezVous as $rdv) {

            $bookingEvent = new Event(
                $rdv->getLieuRendezVous(),
                $rdv->getDateRendezVous(),
                $rdv->getDateRendezVous()
            );

            $calendar->addEvent($bookingEvent);
        }

    }
}