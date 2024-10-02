<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contacts = [
            $this->createContact('Maillet', 'Sébastien', '0612345678'),
            $this->createContact('Dupont', 'Jean', '0123456789'),
            $this->createContact('Durand', 'Marie', '0212345678'),
        ];

        foreach ($contacts as $contact) {
            $manager->persist($contact);
        }

        $manager->flush();
    }

    private function createContact(string $nom, string $prenom, string $telephone): Contact
    {
        $contact = new Contact();
        $contact
            ->setNom($nom)
            ->setPrenom($prenom)
            ->setTelephone($telephone)
        ;

        return $contact;
    }
}
