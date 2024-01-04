<?php

namespace App\Controllers\Admin;

use Core\Views\View;

class AdminController
{
    public function dashboard(): void
    {
        $myView = new View('admin/dashboard', 'back');
    }

    public function comments(): void
    {
        $myView = new View('admin/comments', 'back');
    }
    public function pages(): void
    {
        $myView = new View('admin/pages', 'back');
    }
    
}
