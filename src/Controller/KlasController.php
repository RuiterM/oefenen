<?php

namespace App\Controller;

use App\Entity\Klas;



use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KlasController extends AbstractController
{
    #[Route('/klas')]
    public function klas(ManagerRegistry $doctrine): Response
    {
        $klassen=$doctrine->getRepository(Klas::class)->findAll();

        return $this->render('klas/index.html.twig', [
            'klassen'=>$klassen
        ]);
    }
}