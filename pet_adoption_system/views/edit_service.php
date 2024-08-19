<!-- views/edit_service.php -->
<?php
include '../config/config.php';
include '../partials/navbar.php';

$id = $_GET['id'];
$query = "SELECT * FROM services WHERE id = ?";
$statement = $pdo->prepare($query);
$statement->execute([$id]);
$service = $statement->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Edit Service</h2>
    <form method="POST" action="service_action.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($service['id']) ?>">

        <div class="form-group">
            <label for="name">Service Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($service['name']) ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required><?= htmlspecialchars($service['description']) ?></textarea>
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category" id="category" class="form-control" required>
                <option value="Checkups" <?= $service['category'] == 'Checkups' ? 'selected' : '' ?>>Checkups</option>
                <option value="Surgeries" <?= $service['category'] == 'Surgeries' ? 'selected' : '' ?>>Surgeries</option>
                <option value="Vaccinations" <?= $service['category'] == 'Vaccinations' ? 'selected' : '' ?>>Vaccinations</option>
                <!-- Add more categories as needed -->
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price ($):</label>
            <input type="number" name="price" id="price" class="form-control" value="<?= htmlspecialchars($service['price']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>

<?php include '../partials/footer.php'; ?>
