<?php

namespace Container6lQThFq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrine_Dbal_DefaultConnection_ConfigurationService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'doctrine.dbal.default_connection.configuration' shared service.
     *
     * @return \Doctrine\DBAL\Configuration
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['doctrine.dbal.default_connection.configuration'] = $instance = new \Doctrine\DBAL\Configuration();

        $a = new \Doctrine\Bundle\DoctrineBundle\Middleware\DebugMiddleware(($container->privates['doctrine.debug_data_holder'] ??= new \Doctrine\Bundle\DoctrineBundle\Middleware\BacktraceDebugDataHolder(['default'])), ($container->services['debug.stopwatch'] ??= new \Symfony\Component\Stopwatch\Stopwatch(true)));
        $a->setConnectionName('default');

        $instance->setSchemaManagerFactory(($container->privates['doctrine.dbal.legacy_schema_manager_factory'] ??= new \Doctrine\DBAL\Schema\LegacySchemaManagerFactory()));
        $instance->setMiddlewares([$a]);

        return $instance;
    }
}
