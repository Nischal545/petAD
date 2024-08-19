<!-- views/add_admin.php -->
<?php
include '../config/config.php';
include '../partials/navbar.php';
?>

<div class="container">
    <h2>Add New Admin</h2>
    <form method="POST" action="admin_action.php">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Admin</button>
    </form>
</div>

<?php include '../partials/footer.php'; ?>
