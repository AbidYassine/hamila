<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('expert_index', new Route(
    '/',
    array('_controller' => 'AliBackBundle:expert:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('expert_show', new Route(
    '/{id}/show',
    array('_controller' => 'AliBackBundle:expert:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('expert_new', new Route(
    '/new',
    array('_controller' => 'AliBackBundle:expert:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('expert_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AliBackBundle:expert:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('expert_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AliBackBundle:expert:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
