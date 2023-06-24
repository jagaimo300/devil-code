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


    $routes->scope('/contact', function (RouteBuilder $builder) {

        $builder->connect('/', ['controller' => 'Pages', 'action' => 'contact']);

        $builder->fallbacks();
    });

    $routes->scope('/sitemaps', function (RouteBuilder $builder) {

        $builder->connect('/', ['controller' => 'Pages', 'action' => 'sitemaps']);

        $builder->fallbacks();
    });

    $routes->scope('/site-policy', function (RouteBuilder $builder) {

        $builder->connect('/', ['controller' => 'Pages', 'action' => 'policy']);

        $builder->fallbacks();
    });

    $routes->connect('/blogs/search', ['controller' => 'Blogs', 'action' => 'search']);

    $routes->connect('/blogs/list', ['controller' => 'Blogs', 'action' => 'list']);

    $routes->connect('/blogs', ['controller' => 'Blogs', 'action' => 'index']);

	$routes->connect(
	    '/blogs/{cat}/{slug}',
	    ['controller' => 'Blogs', 'action' => 'view'],
	)
	->setPatterns(['cat' => '\w+', 'slug' => '[a-zA-Z_0-9-]+'])
	->setPass(['cat', 'slug']);

	$routes->connect(
	    '/blogs/{cat}',
	    ['controller' => 'Blogs', 'action' => 'category'],
	)
	->setPatterns(['cat' => '\w+'])
	->setPass(['cat']);

};
