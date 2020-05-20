<?php

namespace App\DataFixtures;

use App\Entity\Empresa;
use App\Entity\Candidat;
use App\Entity\Oferta;
use DateTime;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $emp=new Empresa();
        $emp->setCorreu("a18josibacuc@inspedralbes.cat")
        ->setLogo("logo.png")->setTipus("pintor");
        $manager->persist($emp);

        $of= new Oferta();
        $of->setDataPub(new DateTime())
        ->setDescripcio("Pintura")
        ->setEmpresa($emp);

        $manager->persist($of);

        $cand= new Candidat();
        $cand->setNom("Jose")
        ->setCognoms("Ibarra")
        ->setTelefon(1111)
        ->addOferta($of);


        $manager->persist($cand);


        $manager->flush();
    }
}
