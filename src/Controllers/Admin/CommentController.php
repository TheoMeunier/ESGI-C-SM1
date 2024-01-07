<?php

namespace App\Controllers\Admin;

use Core\Views\View;
use Core\DB\DB;
use Core\DB\Model;
use App\Models\Comment;

class CommentController
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new DB();
    }

    public function comments(): void
    {
        try {
            $query = $this->pdo->prepare('SELECT * FROM esgi_comment'); // Update the table name
            $query->execute();
            $comments = $query->fetchAll();
            $myView = new View('admin/comments', 'back', ['comments' => $comments]);
        } catch (\PDOException $e) {
            $this->handleError('Error fetching comments: ' . $e->getMessage());
        } catch (\Exception $e) {
            $this->handleError('General Error: ' . $e->getMessage());
        }
    }

    // Method to delete a comment
    public function delete($id): void
    {
        try {
            $this->validateId($id);

            $query = $this->pdo->prepare('DELETE FROM esgi_comment WHERE id = :id');
            $query->execute(['id' => $id]);

            $this->redirectToCommentList();
        } catch (\PDOException $e) {
            $this->handleError('Database Error deleting comment: ' . $e->getMessage());
        } catch (\Exception $e) {
            $this->handleError('General Error deleting comment: ' . $e->getMessage());
        }
    }

    private function validateId($id): void
    {
        if (empty($id)) {
            $this->handleError('Error: No comment ID provided.');
        }
    }

    private function redirectToCommentList(): void
    {
        // Redirect to the page listing comments after deletion
        header('Location: /admin/comments');
        exit();
    }

    private function handleError($message): void
    {
        // You can log the error, display a custom error page, or handle it in any way you prefer.
        // For now, we'll just echo the error message.
        echo $message;
    }
}
