<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
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
    public function allProjects(ProjectRepository $projectRepository,Request $request): Response
    {

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $projects = $projectRepository->findAll();

        $jsonObject = $serializer->serialize($projects, 'json', [
//            'ignored_attributes' => ['createdAt'],
            'circular_reference_handler' => function ($project) {
                return $project;
            }
        ]);
//        return $this->redirectToRoute('home',[
//            'json'=>$this->json(['code' => 200, $jsonObject], 200)
//        ]);

        return $this->Json(['results'=>$jsonObject],200);

    }
}
