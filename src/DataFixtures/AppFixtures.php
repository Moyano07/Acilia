<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $arrCategories = [];
        //Category
        for ($i = 1; $i < 6; $i++) {
            $category = Category::create(
                'Category ' . $i, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
            );
            $manager->persist($category);
            $arrCategories[] = $category;
        }

        //Product
        foreach ($arrCategories as $category) {
            for ($i = 1; $i < 11; $i++) {
                $product = Product::create(
                    'Product ' . $i, $category, random_int(100, 999), $i % 2 ? 'USD' : 'EUR', $i % 2 ? true : false
                );
                $manager->persist($product);
            }

        }

        $manager->flush();
    }
}
