<!-- views/admin_action.php -->
<?php
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if ($id) {
        // Update existing admin
        $stmt = $pdo->prepare("UPDATE admins SET username = ?, email = ?, password = ? WHERE id = ?");
        $stmt->execute([$username, $email, $password, $id]);
    } else {
        // Insert new admin
        $stmt = $pdo->prepare("INSERT INTO admins (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $password]);
    }

    header('Location: admin_users.php');
    exit;
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $stmt = $pdo->prepare("DELETE FROM admins WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: admin_users.php');
    exit;
}
?>
