<!-- views/contact.php -->
<?php include '../partials/header.php'; ?>

<div class="container">
    <h2>Contact Us</h2>
    <p>Please fill in the form below to contact us.</p>
    <form method="POST" action="send_contact.php">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea name="message" id="message" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div>

<?php include '../partials/footer.php'; ?>
