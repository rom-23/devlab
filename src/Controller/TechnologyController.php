<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\Technology;
use App\Repository\ProjectRepository;
use App\Repository\TechnologyRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TechnologyController extends AbstractController
{
    /**
     * @Route("/technology", name="technology")
     */
    public function index()
    {
        return $this->render('user/technology/Technology.html.twig');
    }

    /**
     * @Route("/technology/{id}", name="technology.search")
     * @param TechnologyRepository $repository
     * @param Technology $technology
     * @return jsonResponse
     * @throws NonUniqueResultException
     */
    public function search(TechnologyRepository $repository, Technology $technology): Response
    {
        $techno = $repository->findOneBySomeField($technology->getId());
       $projects = $techno->getProject()->toArray();
        return $this->render('user/technology/Technology.html.twig', [
            'techno' => $techno,
            'projects' => $projects
        ]);
    }
}
