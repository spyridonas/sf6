<?php

namespace App\Controller;

use App\Services\Pluralize;
use App\Services\PluralizeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{

    public function __construct(private readonly PluralizeService $pluralize)
    {

    }

    #[Route('/demo/{name}', name: 'app_demo')]
    public function index(string $name): Response
    {
        $pluralized = $this->pluralize->pluralize($name);
        return $this->render('demo/index.html.twig', [
            'controller_name' => $pluralized,
        ]);
    }
}
