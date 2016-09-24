<?php
 namespace Album\Factory;

 use Interop\Container\ContainerInterface;
 use Album\Model\Album;
 use Album\Model\ZendDbSqlRepository;
 use Zend\Db\Adapter\AdapterInterface;
 use Zend\Hydrator\Reflection as ReflectionHydrator;
 use Zend\ServiceManager\Factory\FactoryInterface;

 class ZendDbSqlRepositoryFactory implements FactoryInterface
 {
     public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
     {
         return new ZendDbSqlRepository(
             $container->get(AdapterInterface::class),
             new ReflectionHydrator(),
             new Album('', '')
         );
     }
 }