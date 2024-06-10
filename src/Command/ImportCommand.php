<?php

namespace App\Command;

use App\Service\ErrorListenerService;
use App\Service\XmlImportService;
use App\Service\SqliteImportService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:import')]
class ImportCommand extends Command 
{

    public function __construct(
        private XmlImportService $xmlImportService,
        private SqliteImportService $sqliteImportService,
    ) {
        parent::__construct();
    }

    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $inputPath = $input->getArgument('path');
        $articles = [];

        // conditional for potential input file formats
        switch($input->getOption('input-type'))
        {
            case 'xml':
                $articles = $this->xmlImportService->createEntities($inputPath);
        }

        // conditional for potential database types
        switch($input->getOption('db-type'))
        {
            case 'sqlite':
                $this->sqliteImportService->persistEntities($articles);
        }
        return Command::SUCCESS;
    }
    
    
    protected function configure(): void
    {
        $this
            ->setDescription('Imports the contents of a selected file into a selected database.')
            ->setHelp('')
            ->addArgument('path', InputArgument::REQUIRED, 'Path to input file')
            ->addOption(
                'input-type',
                null,
                InputOption::VALUE_REQUIRED,
                'The file type of the input file.',
                'xml',
                ['xml']
            )
            ->addOption(
                'db-type',
                null,
                InputOption::VALUE_REQUIRED,
                'The type of database the data is imported to.',
                'sqlite',
                ['sqlite']
            );
    }
}