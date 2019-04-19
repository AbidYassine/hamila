<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('souscription_index', new Route(
    '/',
    array('_controller' => 'YoussefBackBundle:Souscription:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('souscription_show', new Route(
    '/{id}/show',
    array('_controller' => 'YoussefBackBundle:Souscription:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('souscription_new', new Route(
    '/new',
    array('_controller' => 'YoussefBackBundle:Souscription:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('souscription_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'YoussefBackBundle:Souscription:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('souscription_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'YoussefBackBundle:Souscription:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
