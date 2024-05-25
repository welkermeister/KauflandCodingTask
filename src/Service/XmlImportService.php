<?php

namespace App\Service;

use Symfony\Component\DomCrawler\Crawler;
use App\Entity\Article;

class XmlImportService
{
    public function __construct(

    )
    {

    }

    public function createEntities(string $path): array
    {
        $items = [];

        $inputFile = file_get_contents($path);
        $crawler = new Crawler($inputFile);
        foreach($crawler->children()->first()->children() as $item)
        {
            $article = new Article();
            $article->setEntityId(intval($item->childNodes->item(0)->textContent));
            dd($item->childNodes->item(1));
            $article->setCategoryName($item->childNodes->item(1)->textContent);
            $article->setSku($item->childNodes->item(2)->textContent);
            $article->setName($item->childNodes->item(3)->textContent);
            $article->setDescription($item->childNodes->item(4)->textContent);
            $article->setShortdesc($item->childNodes->item(5)->textContent);
            $article->setPrice(floatval($item->childNodes->item(6)->textContent));
            $article->setLink($item->childNodes->item(7)->textContent);
            $article->setImage($item->childNodes->item(8)->textContent);
            $article->setBrand($item->childNodes->item(9)->textContent);
            $article->setRating(intval($item->childNodes->item(10)->textContent));
            $article->setCaffeineType($item->childNodes->item(11)->textContent);
            $article->setCount(intval($item->childNodes->item(12)->textContent));
            $article->setFlavored($item->childNodes->item(13)->textContent);
            $article->setSeasonal($item->childNodes->item(14)->textContent);
            $article->setInstock($item->childNodes->item(15)->textContent);
            $article->setFacebook(boolval($item->childNodes->item(16)->textContent));
            $article->setKCup(boolval($item->childNodes->item(17)->textContent));

            $items[] = $article;
        }
        return $items;
    }
}