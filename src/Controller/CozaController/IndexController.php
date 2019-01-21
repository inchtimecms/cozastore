<?php

namespace App\Controller\CozaController;

use Symfony\Component\Routing\Annotation\Route;

class IndexController extends BaseController
{
    /**
     * @Route("/", name="coza_index")
     */
    public function index()
    {
        return $this->render('themes/cozastore/pages/index.html.twig', [
            "system" => $this->getSystemEntity(),
            "mainMenu" => $this->getMainMenuEntity(),
        ]);
    }
}
