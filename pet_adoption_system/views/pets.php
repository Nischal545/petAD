<!-- views/pets.php -->

<?php
include '../config/config.php';
include '../partials/navbar.php';

// Fetch pets from the database
$query = "SELECT pets.id, pets.name, pets.breed, pets.age, owners.name AS owner_name FROM pets INNER JOIN owners ON pets.owner_id = owners.id";
$statement = $pdo->prepare($query);
$statement->execute();
$pets = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Pet List</h2>
    <a href="add_pet.php" class="btn">Add New Pet</a>
    
    <form method="GET" action="pets.php" class="search-form">
        <input type="text" name="search" placeholder="Search by name, breed, or owner">
        <button type="submit">Search</button>
    </form>
    
    <table class="pet-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Breed</th>
                <th>Age</th>
                <th>Owner</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pets as $pet): ?>
            <tr>
                <td><?= htmlspecialchars($pet['name']) ?></td>
                <td><?= htmlspecialchars($pet['breed']) ?></td>
                <td><?= htmlspecialchars($pet['age']) ?></td>
                <td><?= htmlspecialchars($pet['owner_name']) ?></td>
                <td>
                    <a href="edit_pet.php?id=<?= $pet['id'] ?>" class="btn btn-edit">Edit</a>
                    <a href="delete_pet.php?id=<?= $pet['id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this pet?')">Delete</a>
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
    .pet-table {
        width: 100%;
        border-collapse: collapse;
    }
    .pet-table th, .pet-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .pet-table th {
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
