<!-- views/admin_dashboard.php -->
<?php
include '../config/config.php';
include '../partials/navbar.php';


$query = "SELECT services.service_name, COUNT(appointments.id) AS total_appointments, SUM(services.price) AS total_revenue
          FROM services
          LEFT JOIN appointments ON services.id = appointments.service_id
          GROUP BY services.service_name";
$statement = $pdo->prepare($query);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);


// Fetch the key metrics from the database
$queryPets = "SELECT COUNT(*) AS total_pets FROM pets";
$queryOwners = "SELECT COUNT(*) AS total_owners FROM owners";
$queryAppointments = "SELECT COUNT(*) AS total_appointments FROM appointments";
$queryRevenue = "SELECT SUM(price) AS total_revenue FROM appointments";

$statementPets = $pdo->prepare($queryPets);
$statementOwners = $pdo->prepare($queryOwners);
$statementAppointments = $pdo->prepare($queryAppointments);
$statementRevenue = $pdo->prepare($queryRevenue);

$statementPets->execute();
$statementOwners->execute();
$statementAppointments->execute();
$statementRevenue->execute();

$totalPets = $statementPets->fetch(PDO::FETCH_ASSOC)['total_pets'];
$totalOwners = $statementOwners->fetch(PDO::FETCH_ASSOC)['total_owners'];
$totalAppointments = $statementAppointments->fetch(PDO::FETCH_ASSOC)['total_appointments'];
$totalRevenue = $statementRevenue->fetch(PDO::FETCH_ASSOC)['total_revenue'];
?>

<div class="container">
    <h2>Admin Dashboard</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Pets</h5>
                    <p class="card-text"><?= htmlspecialchars($totalPets) ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Owners</h5>
                    <p class="card-text"><?= htmlspecialchars($totalOwners) ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Appointments</h5>
                    <p class="card-text"><?= htmlspecialchars($totalAppointments) ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Revenue</h5>
                    <p class="card-text">$<?= htmlspecialchars($totalRevenue) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
