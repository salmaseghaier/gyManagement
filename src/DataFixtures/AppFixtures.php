<?php

namespace App\DataFixtures;

use App\Entity\Abonnement;
use App\Entity\Course;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Create User
        //$user = new  User();
        //$user -> setEmail("test@test.com");
        //$user -> setPassword("test");
        //$manager -> persist($user);

        // Create Abonnement
        //$abonnement = new Abonnement();
        //$abonnement -> setType('Monthly')
          //  -> setPrice(50.0)
            //-> setStartDate(new \DateTime())
            //-> setEndDate(new \DateTime('+1 month'))
            //-> setUser($user);
//        $manager -> persist($abonnement);

        // Create Cpourse
//        $course = new Course();
//        $course -> setTitle('Yoga')
//            ->setDescription('Yoga relaxing')
//            ->setSchedule(new \DateTime('+1 day'));
//        $manager ->persist($course);

        $manager->flush();
    }
}
