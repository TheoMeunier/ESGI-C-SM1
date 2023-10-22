<?php

namespace App\Controllers;

use App\Core\Views\View;

class MainController
{
 public function home()
{
    $pageTitle = 'Accueil';
    $myView = new View("main/home", "front");
    $myView->setData([
        'pageTitle' => $pageTitle,
        'pageDescription' => 'Bienvenue sur notre site web !'
    ]);
    $myView->render();
}

    public function aboutUs()
    {
        $myView = new View("main/aboutus", "front");
        $myView->setData([
            'pageTitle' => 'À propos de nous',
            'pageDescription' => 'Découvrez qui nous sommes et ce que nous faisons.'
        ]);
        $myView->render();
    }

    public function contact()
    {
        $myView = new View("main/contact", "front");
        $myView->setData([
            'pageTitle' => 'Contactez-nous',
            'pageDescription' => 'N\'hésitez pas à nous contacter pour toute question ou demande.'
        ]);
        $myView->render();
    }

    public function gallery()
    {
        $myView = new View("main/gallery", "front");
        $myView->setData([
            'pageTitle' => 'Galerie',
            'pageDescription' => 'Découvrez notre galerie de photos.'
        ]);
        $myView->render();
    }
}
