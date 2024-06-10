<?php

namespace App\Service;

use App\Repository\ArticleRepository;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
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
        $encoders = [new XmlEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $batches = [];
        $batch = [];

        $reader = new XMLReader();
        $reader->open($path);

        //find depth of items
        while($reader->read() && $reader->name !== 'item') {}

        //create entities and put in batches
        do
        {
            
            $item = $reader->readOuterXml();
            
            if(sizeof($batch) <= 100 && str_contains($item, 'entity'))
            {
                $decodedArticle = [];
                $decodedArticle = $serializer->decode($item, 'xml', ['as_collection' => true]);
                $article = $this->normalize((array)$decodedArticle);
                $batch[] = $article;
            } 
            else if (sizeof($batch) == 100)
            {
                $batches[] = $batch;
                $batch = [];
            }
            else
            {
                $batches[] = $batch;
                break;
            }

        } while($reader->next());

        $reader->close();
        return $batches;
    }

    private function normalize(array $decodedArticle) 
    {
        $article = new Article();
        $article->setEntityId(intval($decodedArticle['entity_id'][0]));
        $article->setCategoryName($decodedArticle['CategoryName'][0]);
        $article->setSku($decodedArticle['sku'][0]);
        $article->setName($decodedArticle['name'][0]);
        $article->setDescription($decodedArticle['description'][0]);
        $article->setShortdesc($decodedArticle['shortdesc'][0]);
        $article->setPrice(floatval($decodedArticle['price'][0]));
        $article->setLink($decodedArticle['link'][0]);
        $article->setImage($decodedArticle['image'][0]);
        $article->setBrand($decodedArticle['Brand'][0]);
        $article->setRating(intval($decodedArticle['Rating'][0]));
        $article->setCaffeineType($decodedArticle['CaffeineType'][0]);
        $article->setCount(intval($decodedArticle['Count'][0]));
        $article->setFlavored($decodedArticle['Flavored'][0]);
        $article->setSeasonal($decodedArticle['Seasonal'][0]);
        $article->setInstock($decodedArticle['Instock'][0]);
        $article->setFacebook(boolval($decodedArticle['Facebook'][0]));
        $article->setKCup(boolval($decodedArticle['IsKCup'][0]));
        return $article;
    }
}