<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setEmail("john@wick.us");
        //$user->setNom('wick');
        $user->setPassword("john");
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->passwordEncoder->encodePassword($user, "wick"));
        $manager->persist($user);
        $user2 = new User();
        $user2->setEmail("jack@dalton.us");
        //$user2->setNom("dalton");
        $user2->setPassword("jack");
        $user2->setPassword($this->passwordEncoder->encodePassword($user2, "dalton"));
        
        $manager->persist($user2);
        $manager->flush();

    }
}
