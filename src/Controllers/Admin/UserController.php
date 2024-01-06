<?php

namespace App\Controllers\Admin;

use Core\Views\View;
use Core\DB\DB;
use Core\DB\Model;



class UserController
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new DB();
    }

    public function users(): void
    {
        try {
            $query = $this->pdo->prepare('SELECT * FROM esgi_user');
            $query->execute();
            $users = $query->fetchAll();
            $myView = new View('admin/users', 'back', ['users' => $users]);
        } catch (\PDOException $e) {
            $this->handleError('Error fetching users: ' . $e->getMessage());
        }
    }

    // Display the update form or process the form submission
    public function update($id): void
    {
        try {
            $this->validateId($id);

            // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->processUpdateForm($id);
            } else {
                // Display the update form
                $this->displayUpdateForm($id);
            }
        } catch (\PDOException $e) {
            $this->handleError('Error updating user: ' . $e->getMessage());
        }
    }

    // Process the update form submission
public function updateSubmit($id): void
{
    try {
        $this->validateId($id);

        // Validez les données du formulaire ici (non inclus pour la simplicité)

        // Exemple de mise à jour dans la base de données (utilisez votre propre logique)
        $data = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'avatar' => $_POST['avatar'], // Ajoutez d'autres champs selon vos besoins
        ];

        $query = $this->pdo->prepare('UPDATE esgi_user SET username = :username, email = :email, password = :password, avatar = :avatar WHERE id = :id');
        $data['id'] = $id;
        $query->execute($data);

        // Redirige vers la liste des utilisateurs après la mise à jour
        $this->redirectToUserList();
    } catch (\PDOException $e) {
        $this->handleError('Database Error updating user: ' . $e->getMessage());
    } catch (\Exception $e) {
        $this->handleError('General Error updating user: ' . $e->getMessage());
    }
}

    // Display the update form
    private function displayUpdateForm($id): void
    {
        try {
            $this->validateId($id);

            $query = $this->pdo->prepare('SELECT * FROM esgi_user WHERE id = :id');
            $query->execute(['id' => $id]);
            $user = $query->fetch();

            $this->validateUser($user);

            $myView = new View('admin/users/update', 'back', ['user' => $user]);
        } catch (\PDOException $e) {
            $this->handleError('Error fetching user for update: ' . $e->getMessage());
        }
    }



    public function delete($id): void
    {
        try {
            $this->validateId($id);
    
            $query = $this->pdo->prepare('DELETE FROM esgi_user WHERE id = :id');
            $query->execute(['id' => $id]);
    
            // Utilisez ob_start() pour mettre en mémoire tampon la sortie
            ob_start();
    
            // Ajoutez un message à la console pour vérifier la suppression
            echo '<script>console.log("User deleted successfully!");</script>';
    
            // Obtenez la sortie mise en mémoire tampon
            ob_end_clean();
    
            // Vous pouvez maintenant rediriger en toute sécurité
            $this->redirectToUserList();
        } catch (\PDOException $e) {
            $this->handleError('Database Error deleting user: ' . $e->getMessage());
        } catch (\Exception $e) {
            $this->handleError('General Error deleting user: ' . $e->getMessage());
        }
    }

    public function create(): void
    {
        // Afficher le formulaire de création d'utilisateur
        $myView = new View('admin/users/create', 'back');
    }
    public function store(): void
    {
        try {
            // Validez les données du formulaire ici (non inclus pour la simplicité)

            // Exemple d'insertion dans la base de données (utilisez votre propre logique)
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'avatar' => $_POST['avatar'],
                // Ajoutez d'autres champs selon vos besoins
            ];

            $query = $this->pdo->prepare('INSERT INTO esgi_user (username, email, password, avatar) VALUES (:username, :email, :password, :avatar)');
            $query->execute($data);

            // Redirige vers la liste des utilisateurs après la création
            $this->redirectToUserList();
        } catch (\PDOException $e) {
            $this->handleError('Database Error creating user: ' . $e->getMessage());
        } catch (\Exception $e) {
            $this->handleError('General Error creating user: ' . $e->getMessage());
        }
    }
    
    
    private function validateId($id): void
    {
        if (empty($id)) {
            $this->handleError('Error: No user ID provided.');
        }
    }

    private function validateUser($user): void
    {
        if (!$user) {
            $this->handleError('Error: User not found.');
        }
    }

    private function handleError($message): void
    {
        // Log or display the error
        echo $message;
    }

    private function redirectToUserList(): void
    {
        // Redirect to the page listing users after deletion
        header('Location: /admin/users');
        exit();
    }
}
