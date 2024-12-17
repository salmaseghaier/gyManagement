<?php

namespace App\Controller;

use App\Repository\AbonnementRepository;
use App\Repository\CourseRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminController extends AbstractController
{
    #[Route('/admin/dashboard', name: 'admin_dashboard')]
    public function dashboard(UserRepository $userRepo , CourseRepository $coursRepo, AbonnementRepository $abonnementRepo): Response
    {
        $totalUsers = count($userRepo->findAll());
        $totalSubscriptions = count($abonnementRepo->findAll());
        $totalCourses = count($coursRepo->findAll());
        $newRegistrations = count($userRepo->findBy(['roles' => 'ROLE_USER']));
        return $this->render('admin/dashboard.html.twig', [
            'totalUsers' => $totalUsers,
            'totalSubscriptions' => $totalSubscriptions,
            'totalCourses' => $totalCourses,
            'newRegistrations' => $newRegistrations,
        ]);
    }

}