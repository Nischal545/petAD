<!-- views/add_appointment.php -->
<?php
include '../config/config.php';
include '../partials/navbar.php';

// Fetch pets, owners, and vets from the database
$pets = $pdo->query("SELECT id, name FROM pets")->fetchAll(PDO::FETCH_ASSOC);
$owners = $pdo->query("SELECT id, name FROM owners")->fetchAll(PDO::FETCH_ASSOC);
$vets = $pdo->query("SELECT id, name FROM vets")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Add Appointment</h2>
    <form method="POST" action="appointment_action.php">
        <div class="form-group">
            <label for="pet">Pet:</label>
            <select name="pet_id" id="pet" class="form-control" required>
                <?php foreach ($pets as $pet): ?>
                    <option value="<?= htmlspecialchars($pet['id']) ?>"><?= htmlspecialchars($pet['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="owner">Owner:</label>
            <select name="owner_id" id="owner" class="form-control" required>
                <?php foreach ($owners as $owner): ?>
                    <option value="<?= htmlspecialchars($owner['id']) ?>"><?= htmlspecialchars($owner['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="vet">Vet:</label>
            <select name="vet_id" id="vet" class="form-control" required>
                <?php foreach ($vets as $vet): ?>
                    <option value="<?= htmlspecialchars($vet['id']) ?>"><?= htmlspecialchars($vet['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" name="time" id="time" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Appointment</button>
    </form>
</div>

<?php include '../partials/footer.php'; ?>
