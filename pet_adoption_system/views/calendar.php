<!-- views/calendar.php -->

<?php
include '../config/config.php';
include '../partials/navbar.php';

// Fetch appointments from the database
$query = "SELECT appointments.id, pets.name AS pet_name, owners.name AS owner_name, vets.name AS vet_name, appointments.date, appointments.time 
          FROM appointments
          INNER JOIN pets ON appointments.pet_id = pets.id
          INNER JOIN owners ON appointments.owner_id = owners.id
          INNER JOIN vets ON appointments.vet_id = vets.id";
$statement = $pdo->prepare($query);
$statement->execute();
$appointments = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Appointment Calendar</h2>
    <div id="calendar"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/main.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            editable: true,
            events: [
                <?php foreach ($appointments as $appointment): ?>
                    {
                        id: '<?= htmlspecialchars($appointment['id']) ?>',
                        title: '<?= htmlspecialchars($appointment['pet_name']) ?> (<?= htmlspecialchars($appointment['owner_name']) ?>)',
                        start: '<?= htmlspecialchars($appointment['date']) . 'T' . htmlspecialchars($appointment['time']) ?>'
                    },
                <?php endforeach; ?>
            ],

            // Add new event (redirect to the add_appointment.php page)
            select: function(info) {
                var date = info.startStr.split('T')[0];
                var time = info.startStr.split('T')[1];
                window.location.href = `add_appointment.php?date=${date}&time=${time}`;
            },

            // Edit an existing event
            eventClick: function(info) {
                var id = info.event.id;
                window.location.href = `edit_appointment.php?id=${id}`;
            },

            // Deleting an event (You might want to add a confirmation dialog here)
            eventRender: function(info) {
                var deleteBtn = document.createElement('button');
                deleteBtn.innerText = 'Delete';
                deleteBtn.addEventListener('click', function() {
                    if (confirm('Are you sure you want to delete this appointment?')) {
                        window.location.href = `appointment_action.php?delete_id=${info.event.id}`;
                    }
                });
                info.el.appendChild(deleteBtn);
            }
        });
        calendar.render();
    });
</script>

<style>
    .container {
        padding: 20px;
    }
    #calendar {
        max-width: 100%;
        margin: 0 auto;
    }
</style>

<?php include '../partials/footer.php'; ?>
