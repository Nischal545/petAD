<!-- views/appointment_action.php -->
<?php
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $pet_id = $_POST['pet_id'];
    $owner_id = $_POST['owner_id'];
    $vet_id = $_POST['vet_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    if ($id) {
        // Update existing appointment
        $stmt = $pdo->prepare("UPDATE appointments SET pet_id = ?, owner_id = ?, vet_id = ?, date = ?, time = ? WHERE id = ?");
        $stmt->execute([$pet_id, $owner_id, $vet_id, $date, $time, $id]);
    } else {
        // Insert new appointment
        $stmt = $pdo->prepare("INSERT INTO appointments (pet_id, owner_id, vet_id, date, time) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$pet_id, $owner_id, $vet_id, $date, $time]);
    }

    header('Location: appointments.php');
    exit;
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $stmt = $pdo->prepare("DELETE FROM appointments WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: appointments.php');
    exit;
}
?>
