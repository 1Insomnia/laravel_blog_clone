<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
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
            // Create Category
            $category = new Category();
            $category->setName($val['name']);
            $category->setSlug($val['slug']);
            $manager->persist($category);

            // Create posts related to the category
            for ($i = 1; $i <= 10; $i++) {
                $post = new Post();
                $post->setTitle("Article {$i}");
                $post->setSlug("article-{$val['name']}-{$i}");
                $post->setDescription(str_repeat("Description {$i}", 10));
                $post->setBody(str_repeat("Content {$i}", 15));
                $post->setAuthor("Author {$i}");
                $post->setMainImage("main-image-{$val['name']}-{$i}");
                $post->setCategory($category);
                $manager->persist($post);
            }
        }

        $manager->flush();
    }
}
