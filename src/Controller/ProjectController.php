<?php

namespace App\Controller;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ProjectController extends AbstractController
{
    /**
     * @Route("/project", name="project")
     * @param ProjectRepository $projectRepository
     * @param Request $request
     * @return Response
     */
    public function allProjects(ProjectRepository $projectRepository, Request $request): Response
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $projects = $projectRepository->findAll();
        $jsonObject = $serializer->serialize($projects, 'json', [
            'circular_reference_handler' => function ($project) {
                return $project;
            }
        ]);
        return $this->Json(['results' => $jsonObject], 200);
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
        $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $showProject = $repository->findOneBySomeField($project->getId());
        $jsonObject = $serializer->serialize($showProject, 'json', [
            'circular_reference_handler' => function ($project) {
                return $project;
            }
        ]);
        return $this->json(['code' => 200, $jsonObject], 200);
    }
}
