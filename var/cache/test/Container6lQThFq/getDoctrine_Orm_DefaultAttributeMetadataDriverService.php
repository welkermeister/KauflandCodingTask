<?php

namespace Container6lQThFq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrine_Orm_DefaultAttributeMetadataDriverService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'doctrine.orm.default_attribute_metadata_driver' shared service.
     *
     * @return \Doctrine\ORM\Mapping\Driver\AttributeDriver
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['doctrine.orm.default_attribute_metadata_driver'] = new \Doctrine\ORM\Mapping\Driver\AttributeDriver(['C:\\KauflandCodingTask\\src\\Entity'], true);
    }
}