<?php

namespace App\EventListener;
use Symfony\Component\Console\Event\ConsoleErrorEvent;
use Symfony\Component\Filesystem\Filesystem;

class ConsoleErrorListener
{
    public function __invoke(ConsoleErrorEvent $event): void
    {
        $filesystem = new Filesystem();
        $filesystem->dumpFile(
            'errorlogs/log.txt',
            $event->getError()
            // $event->getCommand()->getName()
        );
    }
}