<?php

namespace App\Service;

use Symfony\Component\DomCrawler\Crawler;
use App\Entity\Article;
use XMLReader;

class XmlImportService
{
    public function __construct(

    )
    {

    }

    public function createEntities(string $path): array
    {
        $batches = [];

        $reader = new XMLReader();
        $reader->open($path);

        //find depth of items
        while($reader->read() && $reader->name == 'item')
        {
            $batch = [];

            //create entities and put in batches
            while(sizeof($batch) <= 100 && $reader->next()) 
            {
                $article = new Article();
                $article->setEntityId(intval($reader->getAttribute('entity_id')));
                $article->setCategoryName($reader->getAttribute('CategoryName'));
                $article->setSku($reader->getAttribute('sku'));
                $article->setName($reader->getAttribute('name'));
                $article->setDescription($reader->getAttribute('description'));
                $article->setShortdesc($reader->getAttribute('shortdesc'));
                $article->setPrice(floatval($reader->getAttribute('price')));
                $article->setLink($reader->getAttribute('link'));
                $article->setBrand($reader->getAttribute('Brand'));
                $article->setRating(intval($reader->getAttribute('Rating')));
                $article->setCaffeineType($reader->getAttribute('CaffeineType'));
                $article->setCount(intval($reader->getAttribute('Count')));
                $article->setFlavored($reader->getAttribute('Flavored'));
                $article->setSeasonal($reader->getAttribute('Seasonal'));
                $article->setInstock($reader->getAttribute('Instock'));
                $article->setFacebook(boolval($reader->getAttribute('Facebook')));
                $article->setKCup(boolval($reader->getAttribute('IsKCup')));
                $batch[] = $article;
            }
            $batches[] = $batch;
        }
        return $batches;
    }
}