<!-- Views/admin/users/update.php -->

<h1>Modifier l'Utilisateur</h1>

<!-- Formulaire de mise à jour d'utilisateur -->
<form action="/admin/users/update/<?php echo $user['id']; ?>" method="post">
    <!-- Champs du formulaire (username, email, password, etc.) pré-remplis avec les données de l'utilisateur -->
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" name="username" value="<?php echo $user['username']; ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

    <label for="password">Mot de passe:</label>
    <input type="password" name="password" required>

    <!-- Ajoutez les autres champs de la table esgi_user ici -->
    <label for="avatar">Avatar:</label>
    <input type="text" name="avatar" value="<?php echo $user['avatar']; ?>">

    <!-- Ajoutez d'autres champs au besoin -->

    <button type="submit">Mettre à Jour</button>
</form>
