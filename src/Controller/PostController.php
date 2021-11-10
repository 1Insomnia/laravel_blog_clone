<?php

namespace App\Controller;

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
     * @param Post $post
     * @return Response
     */
    #[Route('/article-{slug}', name: 'post_read')]
    public function read(Post $post): Response
    {
        return $this->render('post/read.html.twig', [
            "post" => $post
        ]);
    }
}
