<?php

namespace App\Controllers;

use Core\Views\View;

class MainController
{
    public function home(): void
    {
        $myView = new View('main/home', 'front');
    }
    public function artist()
    {
        $myView = new View("main/artist", "front");
    }
    public function template()
    {
        $myView = new View("main/template", "front");
    }
}
