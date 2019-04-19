<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('avis_index', new Route(
    '/',
    array('_controller' => 'YassineBackBundle:Avis:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('avis_show', new Route(
    '/{idAvis}/show',
    array('_controller' => 'YassineBackBundle:Avis:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('avis_new', new Route(
    '/new',
    array('_controller' => 'YassineBackBundle:Avis:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('avis_edit', new Route(
    '/{idAvis}/edit',
    array('_controller' => 'YassineBackBundle:Avis:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('avis_delete', new Route(
    '/{idAvis}/delete',
    array('_controller' => 'YassineBackBundle:Avis:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
