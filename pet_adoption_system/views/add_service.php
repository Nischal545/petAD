<!-- views/add_service.php -->
<?php
include '../config/config.php';
include '../partials/navbar.php';
?>

<div class="container">
    <h2>Add New Service</h2>
    <form method="POST" action="service_action.php">
        <div class="form-group">
            <label for="name">Service Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category" id="category" class="form-control" required>
                <option value="Checkups">Checkups</option>
                <option value="Surgeries">Surgeries</option>
                <option value="Vaccinations">Vaccinations</option>
                <!-- Add more categories as needed -->
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price ($):</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Service</button>
    </form>
</div>

<?php include '../partials/footer.php'; ?>
