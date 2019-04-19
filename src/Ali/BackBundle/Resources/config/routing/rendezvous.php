<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('rendezvous_index', new Route(
    '/',
    array('_controller' => 'AliBackBundle:rendezVous:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('rendezvous_show', new Route(
    '/{id}/show',
    array('_controller' => 'AliBackBundle:rendezVous:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('rendezvous_new', new Route(
    '/new',
    array('_controller' => 'AliBackBundle:rendezVous:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('rendezvous_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AliBackBundle:rendezVous:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('rendezvous_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AliBackBundle:rendezVous:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
