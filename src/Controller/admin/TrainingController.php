<?php

namespace App\Controller\admin;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrainingController extends AbstractController
{
  /**
   * @Route("/training", name="training")
   * @param ProjectRepository $projectRepository
   * @return Response
   */
  public function training(ProjectRepository $projectRepository): Response
  {
      $projects = $projectRepository -> findAll();
        return $this -> render( 'admin/SandBox.html.twig', [
          'projects' => $projects
        ]);
  }
}
