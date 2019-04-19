<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('listanswers_index', new Route(
    '/',
    array('_controller' => 'YassineBackBundle:ListAnswers:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('listanswers_show', new Route(
    '/{idTopic}/show',
    array('_controller' => 'YassineBackBundle:ListAnswers:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('listanswers_new', new Route(
    '/new',
    array('_controller' => 'YassineBackBundle:ListAnswers:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('listanswers_edit', new Route(
    '/{idTopic}/edit',
    array('_controller' => 'YassineBackBundle:ListAnswers:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('listanswers_delete', new Route(
    '/{idTopic}/delete',
    array('_controller' => 'YassineBackBundle:ListAnswers:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
