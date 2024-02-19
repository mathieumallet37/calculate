<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private readonly UserPasswordHasherInterface $encoder
    ){}
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $hashed = $this->encoder->hashPassword($user,'password');
        $user->setEmail('contact@mcalculate.fr')
             ->setFirstname('Mathieu')
             ->setLastname('Mallet')
             ->setRoles(['ROLE_SUPER_ADMIN'])
             ->setPassword($hashed)
             ->setCreatedAt(new \DateTimeImmutable());
        $manager->persist($user);
        $manager->flush();
    }
}
