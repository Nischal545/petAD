<!-- views/add_owner.php -->

<?php
include '../config/config.php';
include '../partials/navbar.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    $query = "INSERT INTO owners (name, email, phone, address) VALUES (?, ?, ?)";
    $statement = $pdo->prepare($query);
    $statement->execute([$name, $contact, $email]);

    header("Location: owners.php");
    exit;
}
?>

<div class="container">
    <h2>Add New Owner</h2>
    
    <form method="POST" action="add_owner.php">
        <div class="form-group">
            <label for="name">Owner Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit" class="btn">Add Owner</button>
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
