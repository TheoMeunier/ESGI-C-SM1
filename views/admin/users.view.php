<div class="admin-container">
<?php echo $this->includeComponent('sideBarAdmin', $config = []);?>
<section>
<h2>Liste des Utilisateurs</h2>
<a class="button button-black" href="/admin/users/create">Ajouter un Utilisateur</a>

<?php if (!empty($users) && is_array($users)): ?>
    <table>
        <thead>
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
        </thead>
        <tbody>
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
                        <a class="button button-blue" href="/admin/users/update/<?= $user['id'] ?>">Modifier</a>
                        <form method="post" action="/admin/users/delete/<?= $user['id'] ?>" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            <button class="button button-red" type="submit">Supprimer</button>
                        </form>     
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun utilisateur trouvé.</p>
<?php endif; ?>

</div>

</section>

