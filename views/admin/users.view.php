<h1>Liste des Utilisateurs</h1>

<a href="/admin/users/create">Ajouter un Utilisateur</a>

<?php if (isset($users) && is_array($users)): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Avatar</th>
            <th>isDeleted</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['password'] ?></td>
                <td><?= $user['avatar'] ?></td>
                <td><?= $user['isDeleted'] ?></td>
                <td><?= $user['created_at'] ?></td>
                <td><?= $user['updated_at'] ?></td>
                <td>
                    <a href="/admin/users/update/<?= $user['id'] ?>">Modifier</a>
                    <a href="#" onclick="deleteUser(<?= $user['id'] ?>)">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<script>
    function deleteUser(userId) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur?" + userId)) {
            // Send a POST request to delete the user
            fetch('/admin/users/delete/' + userId, {
                method: 'POST'
            }).then(function (response) {
                // Redirect to the users list
                window.location.href = '/admin/users';
            });
        }
    }
</script>
