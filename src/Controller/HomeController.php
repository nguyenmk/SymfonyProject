<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController{

    /**
     * @Route("/bonjour/{prenom}", name="bonjour")
     * @Route("/bonjour/", name="bonjourSimple")
     * @Route("/bonjour/{prenom}/{age}", name = "bonjour_complet")
     */
    public function bonjour($prenom = "inconnu", $age = 0) {
        return $this->render('home.html.twig', [
            'salut' => "Salut " . $prenom . " de " . $age . " ans. Comment vas tu?",
            'people' => []
        ]);
    }

    /**
    * @Route("/", name="homepage")
    */
    public function home() {
        $prenom = ["Michael" => 25, "Rachel" => 18, "Gerald" => 14];
    
        return $this->render('home.html.twig', [
            'salut' => "Salut comment ca va les geeks",
            'people' => $prenom
        ]);
    }
}
