<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('experience_index', new Route(
    '/',
    array('_controller' => 'YassineBackBundle:Experience:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('experience_show', new Route(
    '/{idExperience}/show',
    array('_controller' => 'YassineBackBundle:Experience:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('experience_new', new Route(
    '/new',
    array('_controller' => 'YassineBackBundle:Experience:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('experience_edit', new Route(
    '/{idExperience}/edit',
    array('_controller' => 'YassineBackBundle:Experience:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('experience_delete', new Route(
    '/{idExperience}/delete',
    array('_controller' => 'YassineBackBundle:Experience:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
