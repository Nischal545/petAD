<!-- views/schedule_appointment.php -->

<?php
include '../config/config.php';
include '../partials/navbar.php';

// Fetch pets, owners, and vets from the database
$queryPets = "SELECT id, name FROM pets";
$statementPets = $pdo->prepare($queryPets);
$statementPets->execute();
$pets = $statementPets->fetchAll(PDO::FETCH_ASSOC);

$queryOwners = "SELECT id, name FROM owners";
$statementOwners = $pdo->prepare($queryOwners);
$statementOwners->execute();
$owners = $statementOwners->fetchAll(PDO::FETCH_ASSOC);

$queryVets = "SELECT id, name FROM vets";
$statementVets = $pdo->prepare($queryVets);
$statementVets->execute();
$vets = $statementVets->fetchAll(PDO::FETCH_ASSOC);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_id = $_POST['pet_id'];
    $owner_id = $_POST['owner_id'];
    $vet_id = $_POST['vet_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $query = "INSERT INTO appointments (pet_id, owner_id, vet_id, date, time) VALUES (?, ?, ?, ?, ?)";
    $statement = $pdo->prepare($query);
    $statement->execute([$pet_id, $owner_id, $vet_id, $date, $time]);

    header("Location: appointments.php");
    exit;
}
?>

<div class="container">
    <h2>Schedule New Appointment</h2>
    
    <form method="POST" action="schedule_appointment.php">
        <div class="form-group">
            <label for="pet_id">Pet:</label>
            <select id="pet_id" name="pet_id" required>
                <?php foreach ($pets as $pet): ?>
                    <option value="<?= htmlspecialchars($pet['id']) ?>"><?= htmlspecialchars($pet['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="owner_id">Owner:</label>
            <select id="owner_id" name="owner_id" required>
                <?php foreach ($owners as $owner): ?>
                    <option value="<?= htmlspecialchars($owner['id']) ?>"><?= htmlspecialchars($owner['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="vet_id">Vet:</label>
            <select id="vet_id" name="vet_id" required>
                <?php foreach ($vets as $vet): ?>
                    <option value="<?= htmlspecialchars($vet['id']) ?>"><?= htmlspecialchars($vet['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>
        </div>
        <button type="submit" class="btn">Schedule Appointment</button>
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
    .form-group input, .form-group select {
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
