<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dashboard')]
class DashboardController extends AbstractController
{
    #[Route(name: 'app_user_dashboard', methods: ['GET'])]
    public function index(): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $courses = $user->getCourses() ?? [];
        $lessonsCompleted = 10; // Example: Replace with actual logic

        return $this->render('dashboard/index.html.twig', [
            'user' => $user,
            'courses' => $courses,
            'lessonsCompleted' => $lessonsCompleted,
        ]);
    }
}
