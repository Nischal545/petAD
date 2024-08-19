<!-- views/appointments.php -->

<?php
include '../config/config.php';
include '../partials/navbar.php';

// Fetch appointments from the database
$query = "SELECT appointments.id, pets.name AS pet_name, owners.name AS owner_name, vets.name AS vet_name, appointments.appointment_date, appointments.time 
          FROM appointments
          INNER JOIN pets ON appointments.pet_id = pets.id
          INNER JOIN owners ON appointments.owner_id = owners.id
          INNER JOIN vets ON appointments.vet_id = vets.id";
$statement = $pdo->prepare($query);
$statement->execute();
$appointments = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Appointments</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pet Name</th>
                <th>Owner Name</th>
                <th>Vet Name</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $appointment): ?>
                <tr>
                    <td><?= htmlspecialchars($appointment['pet_name']) ?></td>
                    <td><?= htmlspecialchars($appointment['owner_name']) ?></td>
                    <td><?= htmlspecialchars($appointment['vet_name']) ?></td>
                    <td><?= htmlspecialchars($appointment['appointment_date']) ?></td>
                    <td><?= htmlspecialchars($appointment['time']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../partials/footer.php'; ?>

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
    .appointment-table {
        width: 100%;
        border-collapse: collapse;
    }
    .appointment-table th, .appointment-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .appointment-table th {
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
