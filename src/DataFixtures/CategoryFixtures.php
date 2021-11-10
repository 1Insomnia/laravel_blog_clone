<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = [
            [
                "name" => "releases",
                "slug" => "releases"
            ],
            [
                "name" => "envoyer",
                "slug" => "envoyer"
            ],
            [
                "name" => "forge",
                "slug" => "forge"
            ],
            [
                "name" => "vapor",
                "slug" => "vapor"
            ]
        ];

        foreach ($categories as $key => $val) {
            $category = new Category();
            $category->setName($val['name']);
            $category->setSlug($val['slug']);
            $manager->persist($category);
        }
        $manager->flush();
    }
}
