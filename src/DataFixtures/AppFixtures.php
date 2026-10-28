<?php

namespace App\DataFixtures;

use App\Entity\Exercice;
use App\Entity\Groupement;
use App\Enum\StatutExercice;
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

        $exercice1 = new Exercice();
        $exercice1->setDateDebut(new \DateTime('2026-01-01'));
        $exercice1->setDateFin(new \DateTime('2026-12-31'));
        $exercice1->setDateLimitePrets(new \DateTime('2026-11-30'));
        $exercice1->setDateRetribution(new \DateTime('2026-12-15'));
        $exercice1->setStatut(StatutExercice::EN_COURS);
        $exercice1->setGroupement($groupement1);
        $manager->persist($exercice1);

        $exercice2 = new Exercice();
        $exercice2->setDateDebut(new \DateTime('2025-01-01'));
        $exercice2->setDateFin(new \DateTime('2025-12-31'));
        $exercice2->setDateLimitePrets(new \DateTime('2025-11-30'));
        $exercice2->setDateRetribution(new \DateTime('2025-12-15'));
        $exercice2->setStatut(StatutExercice::CLOTURE);
        $exercice2->setGroupement($groupement2);
        $manager->persist($exercice2);

        $manager->flush();
    }
}
