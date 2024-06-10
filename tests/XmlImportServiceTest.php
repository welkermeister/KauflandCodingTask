<?php

namespace App\Tests;

use App\Service\XmlImportService;
use App\Entity\Article;
use ErrorException;
use SebastianBergmann\Type\VoidType;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class XmlImportServiceTest extends KernelTestCase
{

    private XmlImportService $xmlImportService;
    private array $correctArray;

    public function testReadValidXml(): void
    {
        $validXmlPath = "tests\\testdata\\test_feed.xml";
        
        $testArray = $this->xmlImportService->createEntities($validXmlPath);

        $this->assertEquals($this->correctArray, $testArray);
    }

    public function testReadInvalidXml(): void
    {
        $this->expectError();

        $invalidXmlPath = "tests\\testdata\\faulty_test_feed.xml";

        $testArray = $this->xmlImportService->createEntities($invalidXmlPath);

        $this->assertFileExists('errorlogs\\log.txt');
    }

    public function setUp(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        $this->xmlImportService = $container->get(XmlImportService::class);

        $correctArticle = new Article();
        $correctArticle->setEntityId(340);
        $correctArticle->setCategoryName('Green Mountain Ground Coffee');
        $correctArticle->setSku(20);
        $correctArticle->setName('Green Mountain Coffee French Roast Ground Coffee 24 2.2oz Bag');
        $correctArticle->setDescription('');
        $correctArticle->setShortdesc('Green Mountain Coffee French Roast Ground Coffee 24 2.2oz Bag steeps cup after cup of smoky-sweet, complex dark roast coffee from Green Mountain Ground Coffee.');
        $correctArticle->setPrice(41.6000);
        $correctArticle->setLink('http://www.coffeeforless.com/green-mountain-coffee-french-roast-ground-coffee-24-2-2oz-bag.html');
        $correctArticle->setImage('http://mcdn.coffeeforless.com/media/catalog/product/images/uploads/intro/frac_box.jpg');
        $correctArticle->setBrand('Green Mountain Coffee');
        $correctArticle->setRating(0);
        $correctArticle->setCaffeineType('Caffeinated');
        $correctArticle->setCount(24);
        $correctArticle->setFlavored('No');
        $correctArticle->setSeasonal('No');
        $correctArticle->setInstock('Yes');
        $correctArticle->setFacebook(1);
        $correctArticle->setKCup(0);

        $this->correctArray = [[$correctArticle]];
    }
}
