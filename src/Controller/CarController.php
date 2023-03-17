<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    #[Route('/car', name: 'app_car')]
    public function index(): Response
    {
        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
        ]);
    }

    #[Route('/carform', name: 'app_car_form')]
    public function carform(): Response
    {
        $car=new Car();

        $form=$this->createForm(CarType::class,$car);
        return $this->renderForm('car/new.html.twig', [
            'controller_name' => 'CarController',
            'form'=>$form
        ]);
    }
}
