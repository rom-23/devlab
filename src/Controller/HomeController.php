<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param PaginatorInterface $paginator
     * @param ProjectRepository $repository
     * @param CategoryRepository $categoryRepository
     * @param Request $request
     * @return Response
     */
    public function home(PaginatorInterface $paginator, ProjectRepository $repository, CategoryRepository $categoryRepository, Request $request): Response
    {
        $projects = $repository->findAll();
        $categories = $paginator->paginate(
            $categoryRepository->findAllVisibleQuery(),
            $request->query->getInt('page', 1), 4
        );
        return $this->render('pages/Home.html.twig', [
            'pagination' => $paginator,
            'categories' => $categories,
            'projects' => $projects
        ]);
    }

}
