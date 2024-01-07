<!-- Views/admin/users/create.php -->

<h1>Créer un Nouvel Utilisateur</h1>

<!-- Formulaire de création d'utilisateur -->
<form action="/admin/users/store" method="post">
    <!-- Champs du formulaire (username, email, password, etc.) -->
    <!-- Assurez-vous d'ajuster les champs en fonction de votre base de données -->
    <fieldset>
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>

        <!-- Ajoutez les autres champs de la table esgi_user ici -->
        <label for="avatar">Avatar:</label>
        <input type="text" name="avatar">

        <!-- Ajoutez d'autres champs au besoin -->
        <input type="submit"  >
    </fieldset>
</form>
