<?php

namespace App\Controller\admin;

use App\Entity\Project;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminProjectController extends AbstractController
{

  /**
   * @Route("/admin/projects/index", name="admin.project.index")
   * @param ProjectRepository $projectRepository
   * @return Response
   */
  public function index(ProjectRepository $projectRepository)
  {
    $projects = $projectRepository->findAll();
    return $this->render('admin/Projects/AdminProjects.html.twig', [
      'projects' => $projects
    ]);
  }

  /**
   * @Route("/admin/projects/create", name="admin.project.new")
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return RedirectResponse|Response
   */
  public function new(Request $request, EntityManagerInterface $manager)
  {
    $project = new Project();
    $form = $this->createForm(ProjectType::class, $project);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $manager->persist($project);
      $manager->flush();
      $this->addFlash('success', 'Created with success');
      return $this->redirectToRoute('admin.project.index');
    }
    return $this->render('admin/Projects/New.html.twig', [
      'project' => $project,
      'form' => $form->createView()
    ]);
  }

  /**
   * @Route("/admin/projects/{id}", name="admin.project.edit", methods="GET|POST")
   * @param Project $project
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return RedirectResponse|Response
   */
  public function edit(Project $project, Request $request, EntityManagerInterface $manager)
  {
    $form = $this->createForm(ProjectType::class, $project);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $manager->flush();
      $this->addFlash('success', 'Updated with success');
      return $this->redirectToRoute('admin.project.index');
    }
    return $this->render('admin/Projects/Edit.html.twig', [
      'projects' => $project,
      'form' => $form->createView()
    ]);
  }

  /**
   * @Route("/admin/projects/{id}", name="admin.project.delete", methods="DELETE")
   * @param Project $project
   * @param Request $request
   * @param EntityManagerInterface $manager
   * @return RedirectResponse
   */
  public function delete(Project $project, Request $request, EntityManagerInterface $manager)
  {
    if ($this->isCsrfTokenValid('delete' . $project->getId(), $request->get('_token'))) {
      $manager->remove($project);
      $manager->flush();
      $this->addFlash('success', 'Deleted with success');
    }
    return $this->redirectToRoute('admin.project.index');
  }

}

