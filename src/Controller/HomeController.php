<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Depenses;
use App\Form\DepensesType;
use App\Repository\DepensesRepository;
use DateTime;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(DepensesRepository $depensesRepository): Response
    {
        $date = new DateTime('now');

        return $this->render('home/index.html.twig', [
            'depenses' => $depensesRepository->findHomeAllWithCategories(),
            'date' => $date
        ]);
    }
}
