<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @return Response
     */
    #[Route('/category', name: 'category_index')]
    public function index(): Response
    {
        return $this->render("hello");
    }

    /**
     * @param Category $category
     * @return Response
     */
    #[Route('/{slug}', name: 'category_read')]
    public function read(Category $category): Response
    {
        return $this->render('category/read.html.twig', [
            'category' => $category
        ]);
    }
}
