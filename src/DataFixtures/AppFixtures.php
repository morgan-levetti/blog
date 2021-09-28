<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Comments;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use DateTimeInterface;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        // create 10 user! Bam!
        for ($i = 0; $i < 10; $i++) {
            $user = new user();
            $user->setUsername($faker->name);
            $user->setPassword($faker->password);
            $manager->persist($user);
        }

        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++){
            $comments = new Comments();
            $comments->setContent($faker->paragraph);
            $comments->setActive(true);
            $comments->setCreatedAt($faker->datetime);
            $comments->setUsername($faker->name);
            $manager->persist($comments);

        $manager->flush();
    }

 
}
}