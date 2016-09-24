<?php
namespace Album;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    // service
    'service_manager' => [
        'aliases' => [
            // alias model Album -> ZendDbSql
            Model\AlbumRepositoryInterface::class => Model\ZendDbSqlRepository::class,
        ],
        'factories' => [
            // Init test db - We don't need this -> see example in Blog module
            Model\AlbumRepository::class => InvokableFactory::class,
            //
            Model\ZendDbSqlRepository::class => Factory\ZendDbSqlRepositoryFactory::class,
        ],
    ],

    // controller
    'controllers' => [
        'factories' => [
            //
            Controller\AlbumController::class => Factory\AlbumControllerFactory::class,
        ],
    ],

    // router
    // 'router' => [
    //     'routes' => [
    //         'album' => [
    //             'type'    => Segment::class,
    //             'options' => [
    //                 'route' => '/album[/:action[/:id]]',
    //                 'constraints' => [
    //                     'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
    //                     'id'     => '[0-9]+',
    //                 ],
    //                 'defaults' => [
    //                     'controller' => Controller\AlbumController::class,
    //                     'action'     => 'index',
    //                 ],
    //             ],
    //         ],
    //     ],
    // ],

    // This lines opens the configuration for the RouteManager
    'router' => [
        // Open configuration for all possible routes
        'routes' => [
            // Define a new route called "blog"
            'album' => [
                // Define a "literal" route type:
                'type' => Literal::class,
                // Configure the route itself
                'options' => [
                    // Listen to "/blog" as uri:
                    'route' => '/album',
                    // Define default controller and action to be called when
                    // this route is matched
                    'defaults' => [
                        'controller' => Controller\AlbumController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    // view
    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];