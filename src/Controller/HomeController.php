<?php

namespace App\Controller;

use App\Entity\Project;
use App\Repository\CategoryRepository;
use App\Repository\ProjectRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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

    /**
     * @Route("/project/{id}", name="home.search")
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
// Serialize your object in Json
        $jsonObject = $serializer->serialize($showProject, 'json', [
//            'ignored_attributes' => ['projectDesc'],
            'circular_reference_handler' => function ($project) {
                return $project;
            }
        ]);

       return $this->json(['code' => 200, $jsonObject], 200);


    }

}
