<?php
// In /module/Blog/src/Factory/ListControllerFactory.php:
namespace Album\Factory;

use Album\Controller\AlbumController;
use Album\Model\AlbumRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class AlbumControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return ListController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AlbumController($container->get(AlbumRepositoryInterface::class));
    }
}
