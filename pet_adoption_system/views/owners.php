<!-- views/owners.php -->

<?php
include '../config/config.php';
include '../partials/navbar.php';

// Fetch owners from the database
$query = "SELECT * FROM owners";
$statement = $pdo->prepare($query);
$statement->execute();
$owners = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Owner List</h2>
    <a href="add_owner.php" class="btn">Add New Owner</a>
    
    <form method="GET" action="owners.php" class="search-form">
        <input type="text" name="search" placeholder="Search by name or contact">
        <button type="submit">Search</button>
    </form>
    
    <table class="owner-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($owners as $owner): ?>
            <tr>
                <td><?= htmlspecialchars($owner['name']) ?></td>
                <td><?= htmlspecialchars($owner['contact']) ?></td>
                <td><?= htmlspecialchars($owner['email']) ?></td>
                <td>
                    <a href="edit_owner.php?id=<?= $owner['id'] ?>" class="btn btn-edit">Edit</a>
                    <a href="delete_owner.php?id=<?= $owner['id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this owner?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Add some basic CSS for styling the table -->
<style>
    .container {
        padding: 20px;
    }
    .btn {
        background-color: #ff6600;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        margin: 10px 0;
        display: inline-block;
    }
    .search-form {
        margin-bottom: 20px;
    }
    .search-form input {
        padding: 10px;
        font-size: 16px;
        width: 250px;
    }
    .search-form button {
        padding: 10px;
        background-color: #333;
        color: white;
        border: none;
        cursor: pointer;
    }
    .owner-table {
        width: 100%;
        border-collapse: collapse;
    }
    .owner-table th, .owner-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .owner-table th {
        background-color: #f2f2f2;
    }
    .btn-edit {
        background-color: #4CAF50;
        margin-right: 10px;
    }
    .btn-delete {
        background-color: #f44336;
    }
</style>

<?php include '../partials/footer.php'; ?>
