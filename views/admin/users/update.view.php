<!-- Views/admin/users/edit.php -->

<h1>Modifier l'Utilisateur <?= $user['username'] ?></h1>

<!-- Formulaire d'édition d'utilisateur -->
<form method="post" action="/admin/users/update/<?= $user['id'] ?>">
    <!-- Champs du formulaire pré-remplis avec les informations de l'utilisateur -->
    <!-- Assurez-vous d'ajuster les champs en fonction de votre base de données -->
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" name="username" value="<?= $user['username'] ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= $user['email'] ?>" required>

    <label for="password">Nouveau mot de passe:</label>
    <input type="password" name="password">

    <!-- Ajoutez les autres champs de la table esgi_user ici -->
    <label for="avatar">Avatar:</label>
    <input type="text" name="avatar" value="<?= $user['avatar'] ?>">

    <!-- Ajoutez d'autres champs au besoin -->

    <button type="submit">Mettre à Jour</button>
</form>
