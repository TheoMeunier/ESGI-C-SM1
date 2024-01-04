<?php

namespace App\Controllers\Admin;

use Core\Views\View;
use Core\DB\DB;

class UserController
{
    public function users(): void
    {
        try {
            $pdo = new DB();
            $query = $pdo->prepare('SELECT * FROM esgi_user');
            $query->execute();
            $users = $query->fetchAll();
            $myView = new View('admin/users', 'back', ['users' => $users]);
        } catch (\PDOException $e) {
            // Log or display the error
            echo 'Error fetching users: ' . $e->getMessage();
        }
    }

    public function update($id): void
    {
        try {
            // Check if $id is not null or empty
            if (!empty($id)) {
                $pdo = new DB();
    
                // Fetch user data based on ID
                $query = $pdo->prepare('SELECT * FROM esgi_user WHERE id = :id');
                $query->execute(['id' => $id]);
                $user = $query->fetch();
    
                // Check if the user exists
                if (!$user) {
                    echo 'Error: User not found.';
                    exit();
                }
    
                // Render the update view with user data
                $myView = new View('admin/users/update', 'back', ['user' => $user]);
            } else {
                // Handle the case where no ID is provided
                echo 'Error: No user ID provided for update.';
            }
        } catch (\PDOException $e) {
            // Log or display the error
            echo 'Error updating user: ' . $e->getMessage();
        }
    }
    public function delete($id): void
    {
        dd($id);    
        if ($id == null) {
            echo 'Error: No user ID provided for deletion.';
        } else {
            try {
                $pdo = new DB();
                $query = $pdo->prepare('DELETE FROM esgi_user WHERE id = :id');
                $query->execute(['id' => $id]);
    
                // Débogage : Afficher le nombre de lignes affectées par la requête DELETE
                $rowCount = $query->rowCount();
                echo 'Number of rows deleted: ' . $rowCount;
    
                // Après la suppression, redirigez vers la page de liste des utilisateurs
                header('Location: /admin/users');
                exit();
            } catch (\PDOException $e) {
                // Gérez ou affichez l'erreur de la base de données
                echo 'Database Error deleting user: ' . $e->getMessage();
            } catch (\Exception $e) {
                // Gérez ou affichez d'autres erreurs
                echo 'General Error deleting user: ' . $e->getMessage();
            }
        }
    }
    

    
    
}
