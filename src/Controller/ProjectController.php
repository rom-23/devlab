<?php

namespace App\Controller;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
  /**
   * @Route("/project", name="project")
   * @param ProjectRepository $projectRepository
   * @return Response
   */
  public function allProjects(ProjectRepository $projectRepository): Response
  {
    $projects = $projectRepository->findAll();
    return $this->render('admin/AdminHome.html.twig', [
      $this->Json(['results' => $projects], 200)
    ]);
  }

  /**
   * @Route("/project/{id}", name="project.search")
   * @param ProjectRepository $repository
   * @param Project $project
   * @return jsonResponse
   * @throws NonUniqueResultException
   */
  public function search(ProjectRepository $repository, Project $project): Response
  {
    $showProject = $repository->findOneBySomeField($project->getId());
    $technologies = $showProject->getTechnologies();
    $images = $showProject->getPictures();
    $tools = $showProject->getTools();
    return $this->render('user/project/Project.html.twig', [
      'techno' => $technologies,
      'projects' => $showProject,
      'images' => $images,
      'tools' => $tools
    ]);
    //return $this->Json(['results' => $showProject], 200);
  }
}
