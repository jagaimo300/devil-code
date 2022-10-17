<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes) {
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder) {

        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        $builder->connect('/pages/*', 'Pages::display');

        $builder->fallbacks();
    });


    $routes->scope('/contact/*', function (RouteBuilder $builder) {

        $builder->connect('/', ['controller' => 'Pages', 'action' => 'contact']);

        $builder->fallbacks();
    });

    
    $routes->scope('/policy/*', function (RouteBuilder $builder) {

        $builder->connect('/', ['controller' => 'Pages', 'action' => 'policy']);

        $builder->fallbacks();
    });

    $routes->connect('/blogs', ['controller' => 'Blogs', 'action' => 'index']);

	$routes->connect(
	    '/blogs/{cat}/{slug}',
	    ['controller' => 'Blogs', 'action' => 'view'],
	)
	->setPatterns(['cat' => '\w+', 'slug' => '\w+'])
	->setPass(['cat', 'slug']);

	$routes->connect(
	    '/blogs/{cat}',
	    ['controller' => 'Blogs', 'action' => 'category'],
	)
	->setPatterns(['cat' => '\w+'])
	->setPass(['cat']);

};
