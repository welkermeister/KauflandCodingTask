<?php

namespace Container6lQThFq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_Command_SecretsDecryptToLocalService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'console.command.secrets_decrypt_to_local' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\SecretsDecryptToLocalCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['console.command.secrets_decrypt_to_local'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\SecretsDecryptToLocalCommand(($container->privates['secrets.vault'] ?? $container->load('getSecrets_VaultService')), ($container->privates['secrets.local_vault'] ??= new \Symfony\Bundle\FrameworkBundle\Secrets\DotenvVault('C:\\KauflandCodingTask/.env.test.local')));

        $instance->setName('secrets:decrypt-to-local');
        $instance->setDescription('Decrypt all secrets and stores them in the local vault');

        return $instance;
    }
}
