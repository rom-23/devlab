<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiProjectsController extends AbstractController
{
    /**
     * @Route("/api/projects", name="api_projects_index", methods={"GET"})
     * @param ProjectRepository $projectRepository
     * @return JsonResponse
     */
    public function index(ProjectRepository $projectRepository)
    {
        $projects = $projectRepository->findAll();
        return $this->json($projects, 200, [], ['groups' => 'project:read']);
    }
}
