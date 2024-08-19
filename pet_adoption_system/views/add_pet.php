<!-- views/add_pet.php -->
<?php
include '../config/config.php';
include '../partials/navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $breed = htmlspecialchars($_POST['breed']);
    $age = intval($_POST['age']);
    $owner_id = intval($_POST['owner_id']);

    if (!empty($name) && !empty($breed) && $age > 0 && $owner_id > 0) {
        $query = "INSERT INTO pets (name, breed, age, owner_id) VALUES (?, ?, ?, ?)";
        $statement = $pdo->prepare($query);
        $statement->execute([$name, $breed, $age, $owner_id]);

        header('Location: pets.php');
        exit;
    } else {
        $error = "Please fill in all fields correctly.";
    }
}

// Fetch owners for the dropdown
$queryOwners = "SELECT id, name FROM owners";
$statementOwners = $pdo->prepare($queryOwners);
$statementOwners->execute();
$owners = $statementOwners->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Add New Pet</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="form-group">
            <label for="name">Pet Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="breed">Breed:</label>
            <input type="text" name="breed" id="breed" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" name="age" id="age" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="owner_id">Owner:</label>
            <select name="owner_id" id="owner_id" class="form-control" required>
                <?php foreach ($owners as $owner): ?>
                    <option value="<?= htmlspecialchars($owner['id']) ?>"><?= htmlspecialchars($owner['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Pet</button>
    </form>
</div>

<?php include '../partials/footer.php'; ?>
