<?php

namespace App\Controllers;

use App\Core\Views\View;

class SecurityController
{
    public function login(): void
    {
        $myView = new View("security/login", "front");
        $myView->setData([
            'pageTitle' => 'Connexion',
            'pageDescription' => 'Connectez-vous à votre compte'
        ]);
        $myView->render();
    }

    public function register(): void
    {
        $myView = new View("security/register", "front");
        $myView->setData([
            'pageTitle' => 'Inscription',
            'pageDescription' => 'Inscrivez-vous pour créer un compte'
        ]);
        $myView->render();
    }

    public function logout(): void
    {
        $myView = new View("security/logout", "front");
        $myView->setData([
            'pageTitle' => 'Déconnexion',
            'pageDescription' => 'Déconnectez-vous de votre compte'
        ]);
        $myView->render();
    }
}
