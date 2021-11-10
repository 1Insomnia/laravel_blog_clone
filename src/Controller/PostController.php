<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();
        return $this->render('post/index.html.twig', [
            "posts" => $posts
        ]);
    }

    /**
     * @param string $slug
     * @return Response
     */
    #[Route('/{slug}', name: 'post_read')]
    public function read(string $slug): Response
    {
        $post = $this->getDoctrine()->getRepository(Post::class)->findOneBy(["slug" => $slug]);
        $category = $this->getDoctrine()->getRepository(Category::class)->findOneBy(["slug" => $slug]);

        if (!empty($post)) {
            return $this->render('post/read.html.twig', [
                'title' => ucfirst((string) $post->getCategory()->getName()),
                "post" => $post
            ]);
        }

        if (!empty($category)) {
            return $this->render('category/read.html.twig', [
                'title' => ucfirst($category->getName()),
                'category' => $category]);
        }

        throw $this->createNotFoundException("Oops page doesn't exist");
    }
}
