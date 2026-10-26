<?php

namespace App\Command;

use Doctrine\DBAL\DriverManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'assane:db:create',
    description: 'CrÃ©er la base de donnÃ©es avec_les_femmes'
)]
class AssaneDbCreateCommand extends Command
{
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $io = new SymfonyStyle($input, $output);

        try {
            $connection = DriverManager::getConnection([
                'driver' => 'pdo_mysql',
                'host' => '127.0.0.1',
                'port' => 3306,
                'user' => 'root',
                'password' => '',
            ]);

            $connection->executeStatement(
                'CREATE DATABASE IF NOT EXISTS avec_les_femmes
                CHARACTER SET utf8mb4
                COLLATE utf8mb4_unicode_ci'
            );

            $io->success(
                'La base de donnÃ©es avec_les_femmes est crÃ©Ã©e ou existe dÃ©jÃ .'
            );

            $connection->close();

            return Command::SUCCESS;
        } catch (\Throwable $e) {
            $io->error('Erreur : ' . $e->getMessage());

            return Command::FAILURE;
        }
    }
}
