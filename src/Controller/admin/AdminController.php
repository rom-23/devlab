<?php

namespace App\Controller\admin;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
  /**
   * @Route("/backend", name="backend.home")
   * @param ProjectRepository $projectRepository
   * @return Response
   */
    public function admin(ProjectRepository $projectRepository): Response
    {
      $projects = $projectRepository->findAll();
        return $this->render('admin/AdminHome.html.twig', [
          'projects' => $projects
        ]);
    }

}
