<?php

namespace App\DataFixtures;

use App\Entity\Adresse;
use App\Entity\Personne;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($p = 0; $p < 10; $p++) {
            $personne = new Personne;
            $personne->setNom($faker->lastName);
            $personne->setPrenom($faker->firstName);

            for ($c = 0; $c < mt_rand(1, 5); $c++) {
                $adresse = new Adresse;
                $adresse->setRue($faker->streetName);
                $adresse->setVille($faker->city);
                $adresse->setCodePostal($faker->postcode);
                $personne->addAdress($adresse);
            }
            $manager->persist($personne);
        }
        $manager->flush();
    }
}
