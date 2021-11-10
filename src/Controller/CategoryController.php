<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @return Response
     */
    //#[Route('/{slug}', name: 'category_read')]
    //public function read(Category $category): Response
    //{
    //    return $this->render('category/read.html.twig', [
    //        'title' => ucfirst($category->getName()),
    //        'category' => $category
    //    ]);
    //}
}
