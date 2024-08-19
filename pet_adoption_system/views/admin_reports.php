<!-- views/admin_reports.php -->
<?php
include '../config/config.php';
include '../partials/navbar.php';

// Fetch report data from the database
// Example: Appointment statistics
$queryAppointmentsByDate = "SELECT date, COUNT(*) AS total_appointments FROM appointments GROUP BY date";
$statementAppointmentsByDate = $pdo->prepare($queryAppointmentsByDate);
$statementAppointmentsByDate->execute();
$appointmentsByDate = $statementAppointmentsByDate->fetchAll(PDO::FETCH_ASSOC);

// Example: Pet demographics (breed-wise distribution)
$queryPetBreeds = "SELECT breed, COUNT(*) AS total_pets FROM pets GROUP BY breed";
$statementPetBreeds = $pdo->prepare($queryPetBreeds);
$statementPetBreeds->execute();
$petBreeds = $statementPetBreeds->fetchAll(PDO::FETCH_ASSOC);

// Example: Financial summary (monthly revenue)
$queryMonthlyRevenue = "SELECT DATE_FORMAT(date, '%Y-%m') AS month, SUM(price) AS total_revenue FROM appointments GROUP BY month";
$statementMonthlyRevenue = $pdo->prepare($queryMonthlyRevenue);
$statementMonthlyRevenue->execute();
$monthlyRevenue = $statementMonthlyRevenue->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Reports</h2>

    <!-- Appointment Statistics -->
    <h4>Appointment Statistics</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Appointments</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointmentsByDate as $report): ?>
                <tr>
                    <td><?= htmlspecialchars($report['date']) ?></td>
                    <td><?= htmlspecialchars($report['total_appointments']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pet Demographics -->
    <h4>Pet Demographics (Breed-wise Distribution)</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Breed</th>
                <th>Total Pets</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($petBreeds as $breed): ?>
                <tr>
                    <td><?= htmlspecialchars($breed['breed']) ?></td>
                    <td><?= htmlspecialchars($breed['total_pets']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Financial Summary -->
    <h4>Financial Summary (Monthly Revenue)</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Month</th>
                <th>Total Revenue</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($monthlyRevenue as $revenue): ?>
                <tr>
                    <td><?= htmlspecialchars($revenue['month']) ?></td>
                    <td>$<?= htmlspecialchars($revenue['total_revenue']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../partials/footer.php'; ?>
