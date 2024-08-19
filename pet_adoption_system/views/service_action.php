<!-- views/service_action.php -->
<?php
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $query = "INSERT INTO services (service_name, description, price) VALUES (?, ?, ?)";
    $statement = $pdo->prepare($query);
    $statement->execute([$service_name, $description, $price]);

    header("Location: services.php");
    exit();

    if ($id) {
        // Update existing service
        $stmt = $pdo->prepare("UPDATE services SET name = ?, description = ?, category = ?, price = ? WHERE id = ?");
        $stmt->execute([$name, $description, $category, $price, $id]);
    } else {
        // Insert new service
        $stmt = $pdo->prepare("INSERT INTO services (name, description, category, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $description, $category, $price]);
    }

    header('Location: services.php');
    exit;
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $stmt = $pdo->prepare("DELETE FROM services WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: services.php');
    exit;
}
?>
