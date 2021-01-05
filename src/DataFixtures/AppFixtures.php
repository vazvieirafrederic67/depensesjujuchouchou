<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $category = new Categories();
         $category->setCategory('courses');
         $manager->persist($category);

         $category = new Categories();
         $category->setCategory('carburant');
         $manager->persist($category);

         $category = new Categories();
         $category->setCategory('esthéticienne');
         $manager->persist($category);

         $category = new Categories();
         $category->setCategory('facture');
         $manager->persist($category);

         $category = new Categories();
         $category->setCategory('autre');
         $manager->persist($category);

        $manager->flush();
    }
}
