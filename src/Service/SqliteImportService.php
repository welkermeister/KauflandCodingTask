<?php

namespace App\Service;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManager;

class SqliteImportService
{
    public function __construct(
        private ArticleRepository $articleRepository,
    ) {
    }

    /**
     * @param Article $entity
     */
    public function persistEntities(array $entityBatches)
    {
        foreach($entityBatches as $entityBatch)
        {
            $this->articleRepository->addBatch($entityBatch);
        }
    }
}