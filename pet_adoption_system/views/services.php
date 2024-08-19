<!-- views/services.php -->
<?php
include '../config/config.php';
include '../partials/navbar.php';

// Fetch all services from the database
$query = "SELECT * FROM services";
$statement = $pdo->prepare($query);
$statement->execute();
$services = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Veterinary Services</h2>
    <a href="add_service.php" class="btn btn-primary mb-3">Add New Service</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service): ?>
                <tr>
                    <td><?= htmlspecialchars($service['name']) ?></td>
                    <td><?= htmlspecialchars($service['description']) ?></td>
                    <td><?= htmlspecialchars($service['category']) ?></td>
                    <td>$<?= htmlspecialchars($service['price']) ?></td>
                    <td>
                        <a href="edit_service.php?id=<?= htmlspecialchars($service['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="service_action.php?delete_id=<?= htmlspecialchars($service['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../partials/footer.php'; ?>
