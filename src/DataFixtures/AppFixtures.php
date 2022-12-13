<?php

namespace App\DataFixtures;

use App\Entity\Annonce;
use App\Entity\Marque;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
        
        //création des différentes marques
        $marques=[
            'Tesla',
            'Peugeot',
            'Audi',
            'Mercedes'
        ];
        $tabMark=[];
        foreach ($marques as $mark){
            $marque=new Marque();
            $marque->setName($mark);
            $tabMark[]=$marque;
            $manager->persist($marque);
        }
        
        $user = new User();
        $user->setUsername('adminFixtures');
        $user->setPassword('123123abc');
        $manager->persist($user);

        $fuelOptions = ['Essence', 'Diesel', 'Hybride'];
        for ($i = 1; $i <= 50; $i++) {

            $article = new Annonce();
            $article->setTitle($this->faker->sentence(4))
                ->setDescription($this->faker->paragraph(1))
                ->setModel($this->faker->sentence(3))
                ->setMarque($this->faker->randomElement($tabMark))
                ->setPrix($this->faker->randomFloat(2))
                ->setYear($this->faker->year())
                ->setKm($this->faker->randomFloat(2))
                ->setFuel($this->faker->randomElement($fuelOptions))
                ->setLicense($this->faker->numberBetween(0, 1))
                ->setImgfile($this->faker->imageUrl(640, 480, 'cars', true))
                ->setIsVisible($this->faker->numberBetween(0, 1))
                ->setAuthor($user);
            $manager->persist($article);
        }
        $manager->flush();
    }
}
