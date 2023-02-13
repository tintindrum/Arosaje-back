<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(HttpClientInterface $client): Response
    {
        return $this->render('accueil/index.html.twig', [
            'citation' => $client->request('GET', 'https://kaamelott.chaudie.re/api/random')->toArray(),
        ]);
    }
}
