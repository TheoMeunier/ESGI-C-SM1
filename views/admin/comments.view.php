<?php echo $this->includeComponent('sideBarAdmin', $config = []);
    <h1>Admin - Comments</h1>

    <?php if (!empty($comments) && is_array($comments)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Content</th>
                    <th>Reported</th>
                    <th>User</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th> <!-- Add a new column for actions -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td><?= $comment['id']; ?></td>
                        <td><?= $comment['content']; ?></td>
                        <td><?= $comment['isReported'] ? 'Yes' : 'No'; ?></td>
                        <td><?= $comment['user_id']; // Assuming there's a user_id field ?></td>
                        <td><?= $comment['created_at']; ?></td>
                        <td><?= $comment['updated_at']; ?></td>
                        <td>
                            <form method="post" action="/admin/comments/delete/<?= $comment['id'] ?>" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No comments found.</p>
    <?php endif; ?>

