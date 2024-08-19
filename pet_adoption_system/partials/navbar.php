<!-- partials/navbar.php -->
<nav>
    <div class="container">
        <div class="logo">
            <a href="index.php">Pet Management</a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="pets.php">Pets</a></li>
            <li><a href="owners.php">Owners</a></li>
            <li><a href="appointments.php">Appointments</a></li>
            <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- Add some basic CSS for the navbar -->
<style>
    nav {
        background-color: #333;
        color: white;
        padding: 10px 0;
    }
    nav .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    nav .logo a {
        color: white;
        font-size: 24px;
        text-decoration: none;
    }
    nav .nav-links {
        list-style-type: none;
    }
    nav .nav-links li {
        display: inline;
        margin: 0 15px;
    }
    nav .nav-links a {
        color: white;
        text-decoration: none;
        font-size: 18px;
    }
    nav .nav-links a:hover {
        text-decoration: underline;
    }
</style>
