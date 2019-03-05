<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Car;

use Faker\Factory;

class CarFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $car1 = new Car();
        $car1->setDriverName('Matt Smith');
        $car1->setColor('blue');
        $car1->setRegistration('12-KE-13442');

        $car2 = new Car();
        $car2->setDriverName('James Bond');
        $car2->setColor('black');
        $car2->setRegistration('191-C-007');

        $faker = Factory::create();
        $numStudents = 20;
        for ($i=0; $i < $numStudents; $i++) {
            $firstName = $faker->firstNameMale;
            $surname = $faker->lastName;

            $year = $faker->randomElement(['00','131','191', '09']);
            $county = $faker->randomElement(['C', 'KE', 'D']);
            $num = $faker->randomNumber(5);


            $reg = $year . '-' . $county .'-' . $num;

            $car = new Car();
            $car->setDriverName($firstName . ' ' . $surname);
            $car->setColor($faker->colorName);
            $car->setRegistration($reg);

            $manager->persist($car);
        }


        $manager->persist($car1);
        $manager->persist($car2);

        $manager->flush();
    }
}
