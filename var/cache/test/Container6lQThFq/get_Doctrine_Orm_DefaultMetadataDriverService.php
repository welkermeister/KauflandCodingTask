<?php

namespace Container6lQThFq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Doctrine_Orm_DefaultMetadataDriverService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private '.doctrine.orm.default_metadata_driver' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Mapping\MappingDriver
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = new \Doctrine\Persistence\Mapping\Driver\MappingDriverChain();
        $a->addDriver(($container->privates['doctrine.orm.default_attribute_metadata_driver'] ??= new \Doctrine\ORM\Mapping\Driver\AttributeDriver(['C:\\KauflandCodingTask\\src\\Entity'], true)), 'App\\Entity');

        return $container->privates['.doctrine.orm.default_metadata_driver'] = new \Doctrine\Bundle\DoctrineBundle\Mapping\MappingDriver($a, ($container->privates['.service_locator.KLVvNIq'] ?? $container->load('get_ServiceLocator_KLVvNIqService')));
    }
}
