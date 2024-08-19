<!-- views/edit_owner.php -->

<?php
include '../config/config.php';
include '../partials/navbar.php';

// Get the owner ID from the URL
$owner_id = $_GET['id'];

// Fetch owner details from the database
$query = "SELECT * FROM owners WHERE id = ?";
$statement = $pdo->prepare($query);
$statement->execute([$owner_id]);
$owner = $statement->fetch(PDO::FETCH_ASSOC);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    $query = "UPDATE owners SET name = ?, contact = ?, email = ? WHERE id = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$name, $contact, $email, $owner_id]);

    header("Location: owners.php");
    exit;
}
?>

<div class="container">
    <h2>Edit Owner</h2>
    
    <form method="POST" action="edit_owner.php?id=<?= $owner['id'] ?>">
        <div class="form-group">
            <label for="name">Owner Name:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($owner['name']) ?>" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" value="<?= htmlspecialchars($owner['contact']) ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($owner['email']) ?>" required>
        </div>
        <button type="submit" class="btn">Update Owner</button>
    </form>
</div>

<!-- Add some basic CSS for the form -->
<style>
    .container {
        padding: 20px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-group input {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        margin-bottom: 10px;
    }
    .btn {
        background-color: #ff6600;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        display: inline-block;
        cursor: pointer;
    }
</style>

<?php include '../partials/footer.php'; ?>
</div>
        <button type="submit" class="btn">Update Owner</button>
    </form>
</div>

<!-- Add some basic CSS for the form -->
<style>
    .container {
        padding: 20px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-group input {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        margin-bottom: 10px;
    }
    .btn {
        background-color: #ff6600;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        display: inline-block;
        cursor: pointer;
    }
</style>

<?php include '../partials/footer.php'; ?>

