<?php

namespace App\Controller;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of AccueilController
 *
 * @author stgam
 */
class AccueilController extends AbstractController{
    
    private $repository;
    
    #[Route('/', name: 'accueil')]
    public function index() : Response {
        $twoLasts = $this->repository->findTwoLasts();
        return $this->render("pages/accueil.html.twig", ['twoLasts' => $twoLasts]);
    }
    
    public function __construct(VisiteRepository $repository) {
        $this->repository = $repository;
    }
}
