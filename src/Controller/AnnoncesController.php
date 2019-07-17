<?php

namespace App\Controller;

use App\Entity\Annonces;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\AnnoncesRepository;

class AnnoncesController extends AbstractController
{
    /**
     * @Route("/annonces", name="annonces")
     */
    public function index(AnnoncesRepository $repo)
    {
        //$repo = $this->getDoctrine()->getRepository(Annonces::class);
        $annonces = $repo->findAll();
        return $this->render('annonces/index.html.twig', [
            'controller_name' => 'AnnoncesController',
            'annonces' => $annonces
        ]);
    }

    /**
     * @Route("annonce/{id}", name="uneAnnonce")
     */
    public function uneAnnonce($id, AnnoncesRepository $repo) {
        $annonce = $repo->findOneById($id);
        return $this->render('annonces/annonce.html.twig', [
            'annonce' => $annonce
        ]);
    }
}
