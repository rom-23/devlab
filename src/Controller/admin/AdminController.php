<?php

namespace App\Controller\admin;

use App\Repository\CategoryRepository;
use App\Repository\ProjectRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     * @param PaginatorInterface $paginator
     * @param ProjectRepository $repository
     * @param CategoryRepository $categoryRepository
     * @param Request $request
     * @return Response
     */
    public function admin(PaginatorInterface $paginator, ProjectRepository $repository, CategoryRepository $categoryRepository, Request $request): Response
    {
        $projects = $repository->findAll();
        $categories = $paginator->paginate(
            $categoryRepository->findAllVisibleQuery(),
            $request->query->getInt('page', 1), 4
        );
        return $this->render('admin/AdminHome.html.twig', [
            'pagination' => $paginator,
            'categories' => $categories,
            'projects' => $projects
        ]);
    }
}
