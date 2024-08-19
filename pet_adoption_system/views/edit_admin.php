<!-- views/edit_admin.php -->
<?php
include '../config/config.php';
include '../partials/navbar.php';

$id = $_GET['id'];
$query = "SELECT * FROM admins WHERE id = ?";
$statement = $pdo->prepare($query);
$statement->execute([$id]);
$admin = $statement->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Edit Admin</h2>
    <form method="POST" action="admin_action.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($admin['id']) ?>">

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= htmlspecialchars($admin['username']) ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($admin['email']) ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>

<?php include '../partials/footer.php'; ?>
