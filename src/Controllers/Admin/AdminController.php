<?php

namespace App\Controllers\Admin;

use App\Models\Comment;
use Core\Views\View;

class AdminController
{
    public function dashboard(): void
    {
        $myView = new View('admin/dashboard', 'back');
    }

    public function comments(): void
    {
        // Retrieve comments from the database or any data source
        $comments = Comment::findAll(); // Assuming a static method for retrieving all comments

        // Render the view with the comments data
        $myView = new View('admin/comments', 'back', ['comments' => $comments]);
        $myView->render();
    }
    public function pages(): void
    {
        $myView = new View('admin/pages', 'back');
    }
    
}
