<?php

namespace App\Controller;

use App\Entity\Leerlingen;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LeerlingController extends AbstractController
{
    #[Route('/leerlingen', name: "leerlingen")]
    public function leerlingen(ManagerRegistry $doctrine): Response
    {
        $Leerlingen=$doctrine->getRepository(Leerlingen::class)->findAll();

        return $this->render('klas/leerling.html.twig', [
            'leerlingen'=>$Leerlingen
        ]);
    }
}