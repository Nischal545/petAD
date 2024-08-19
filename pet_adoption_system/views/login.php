<!-- views/login.php -->
<?php
include '../config/config.php';

session_start();

// Redirect to the dashboard if the user is already logged in
if (isset($_SESSION['admin_id'])) {
    header('Location: admin_dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (!empty($username) && !empty($password)) {
        // Prepare and execute the query to find the admin
        $query = "SELECT * FROM admins WHERE username = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$username]);
        $admin = $statement->fetch(PDO::FETCH_ASSOC);

        // Check if the user exists and the password is correct
        if ($admin && password_verify($password, $admin['password'])) {
            // Set session variables and redirect to the dashboard
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];
            header('Location: admin_dashboard.php');
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Please enter both username and password.";
    }
}
?>

<div class="container">
    <h2>Admin Login</h2>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<?php include '../partials/footer.php'; ?>
