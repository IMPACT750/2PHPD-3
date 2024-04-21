<?php

namespace App\DataFixtures;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $userpasswordHasher;

    public function __construct(UserPasswordHasherInterface $userpasswordHasher)
    {
        $this->userpasswordHasher = $userpasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $emails = [
            'yani@gmail.com', 'john@example.com', 'emma@example.com', 'alex@example.com',
            'sara@hotmail.com', 'mike@example.com', 'lisa@yahoo.com', 'david@example.com',
            'jane@gmail.com', 'peter@example.com', 'olivia@example.com', 'james@example.com',
            'chloe@gmail.com', 'robert@example.com', 'sophia@example.com', 'megan@example.com',
            'brandon@gmail.com', 'emily@example.com', 'mason@example.com', 'ava@example.com',
            'natalie@gmail.com', 'ryan@example.com', 'grace@example.com', 'nathan@example.com',
            'zoe@gmail.com', 'andrew@example.com', 'ella@example.com', 'liam@example.com',
            'hannah@gmail.com', 'william@example.com', 'mia@example.com', 'logan@example.com'
        ];

        $lastNames = [
            'Yani', 'Doe', 'Watson', 'Smith',
            'Johnson', 'Brown', 'Taylor', 'Anderson',
            'Thomas', 'Jackson', 'White', 'Harris',
            'Martin', 'Thompson', 'Garcia', 'Martinez',
            'Robinson', 'Clark', 'Lewis', 'Lee',
            'Walker', 'Hall', 'Allen', 'Young',
            'Hernandez', 'King', 'Wright', 'Lopez',
            'Hill', 'Scott', 'Green', 'Adams'
        ];

        $firstNames = [
            'Yani', 'John', 'Emma', 'Alex',
            'Sara', 'Mike', 'Lisa', 'David',
            'Jane', 'Peter', 'Olivia', 'James',
            'Chloe', 'Robert', 'Sophia', 'Megan',
            'Brandon', 'Emily', 'Mason', 'Ava',
            'Natalie', 'Ryan', 'Grace', 'Nathan',
            'Zoe', 'Andrew', 'Ella', 'Liam',
            'Hannah', 'William', 'Mia', 'Logan'
        ];

        $usernames = [
            'yani', 'john', 'emma', 'alex',
            'sara', 'mike', 'lisa', 'david',
            'jane', 'peter', 'olivia', 'james',
            'chloe', 'robert', 'sophia', 'megan',
            'brandon', 'emily', 'mason', 'ava',
            'natalie', 'ryan', 'grace', 'nathan',
            'zoe', 'andrew', 'ella', 'liam',
            'hannah', 'william', 'mia', 'logan'
        ];

        $passwords = [
            'yani', 'john', 'emma', 'alex',
            'sara', 'mike', 'lisa', 'david',
            'jane', 'peter', 'olivia', 'james',
            'chloe', 'robert', 'sophia', 'megan',
            'brandon', 'emily', 'mason', 'ava',
            'natalie', 'ryan', 'grace', 'nathan',
            'zoe', 'andrew', 'ella', 'liam',
            'hannah', 'william', 'mia', 'logan'
        ];

        for ($i = 0; $i < 32; $i++) {
            $user = new \App\Entity\User();
            $user->setEmailAddress($emails[$i]);
            $user->setLastName($lastNames[$i]);
            $user->setFirstName($firstNames[$i]);
            $user->setRoles(['ROLE_USER']);
            // ...

            // Replace 'UserPasswordHasherInterface' with the appropriate class instantiation.

            $user->setUsername($usernames[$i]);
            $user->setPassword($this->userpasswordHasher->hashPassword($user, $passwords[$i]));
            $manager->persist($user);
        }

        $manager->flush();
    }
}