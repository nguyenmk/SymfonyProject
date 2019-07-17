<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Annonces;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AnnoncesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 1; $i < 10; $i++) {
            $annonce = new Annonces();

            $title = $faker->sentence();
            $description = $faker->paragraph(2);
            $photo = $faker->imageUrl(500, 400);

            $annonce->setTitre($title)
                    ->setPrix(mt_rand(8000, 20000))
                    ->setDescription($description)
                    ->setPhoto($photo);
            $manager->persist($annonce);
        }
        $manager->flush();
    }
}
