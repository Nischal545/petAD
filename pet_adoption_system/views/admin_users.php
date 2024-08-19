<!-- views/admin_users.php -->
<?php
include '../config/config.php';
include '../partials/navbar.php';

// Fetch all admin users from the database
$query = "SELECT * FROM admins";
$statement = $pdo->prepare($query);
$statement->execute();
$admins = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Admin Users Management</h2>
    <a href="add_admin.php" class="btn btn-primary mb-3">Add New Admin</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admins as $admin): ?>
                <tr>
                    <td><?= htmlspecialchars($admin['username']) ?></td>
                    <td><?= htmlspecialchars($admin['email']) ?></td>
                    <td>
                        <a href="edit_admin.php?id=<?= htmlspecialchars($admin['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="admin_action.php?delete_id=<?= htmlspecialchars($admin['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../partials/footer.php'; ?>
