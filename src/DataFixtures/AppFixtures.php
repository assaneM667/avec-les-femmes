<?php

namespace App\DataFixtures;

use App\Entity\Groupement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $groupement1 = new Groupement();
        $groupement1->setNom('Groupement Dakar');
        $groupement1->setAdresse('Dakar');
        $groupement1->setTel('770000001');
        $manager->persist($groupement1);

        $groupement2 = new Groupement();
        $groupement2->setNom('Groupement Thies');
        $groupement2->setAdresse('Thies');
        $groupement2->setTel('770000002');
        $manager->persist($groupement2);

        $groupement3 = new Groupement();
        $groupement3->setNom('Groupement Saint-Louis');
        $groupement3->setAdresse('Saint-Louis');
        $groupement3->setTel('770000003');
        $manager->persist($groupement3);

        $manager->flush();
    }
}
