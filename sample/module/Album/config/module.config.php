<?php
namespace Album;

use Zend\Router\Http\Segment;
use Zend\Router\Http\Literal;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'service_manager' => [
        'aliases' => [
            Model\AlbumRepositoryInterface::class => Model\ZendDbSqlRepository::class,
        ],
        'factories' => [
            Model\AlbumRepository::class => InvokableFactory::class,
            Model\ZendDbSqlRepository::class => Factory\ZendDbSqlRepositoryFactory::class,
        ],
    ],

    'controllers' => [
        'factories' => [
            // Controller\AlbumController::class => InvokableFactory::class,
            Controller\AlbumController::class => Factory\AlbumControllerFactory::class,
        ],
    ],

    'router' => [
        'routes' => [
            'album' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/album[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\AlbumController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    // This lines opens the configuration for the RouteManager
    // 'router' => [
    //     // Open configuration for all possible routes
    //     'routes' => [
    //         // Define a new route called "blog"
    //         'album' => [
    //             // Define a "literal" route type:
    //             'type' => Literal::class,
    //             // Configure the route itself
    //             'options' => [
    //                 // Listen to "/blog" as uri:
    //                 'route' => '/album',
    //                 // Define default controller and action to be called when
    //                 // this route is matched
    //                 'defaults' => [
    //                     'controller' => Controller\AlbumController::class,
    //                     'action'     => 'index',
    //                 ],
    //             ],
    //         ],
    //     ],
    // ],

    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];
