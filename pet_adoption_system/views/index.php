<!-- views/index.php -->
<?php include '../partials/navbar.php'; ?>

<div class="banner">
    <div class="container">
        <h1>Welcome to Pet Management System</h1>
        <p>Your one-stop solution for managing all your pet's needs!</p>
        <a href="services.php" class="btn">Explore Our Services</a>
    </div>
</div>

<!-- Add the overview section -->
<div class="overview">
    <div class="container">
        <h2>Why Choose Us?</h2>
        <div class="features">
            <div class="feature">
                <h3>Comprehensive Services</h3>
                <p>We offer a wide range of services from regular checkups to specialized surgeries.</p>
            </div>
            <div class="feature">
                <h3>Expert Vets</h3>
                <p>Our veterinarians are experienced and dedicated to providing the best care.</p>
            </div>
            <div class="feature">
                <h3>Easy Management</h3>
                <p>Manage all your pet's needs in one place with our user-friendly platform.</p>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include '../partials/footer.php'; ?>



<!-- Add some basic CSS for the banner -->
<style>
    .banner {
        background-image: url('../assets/images/banner.jpg');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 100px 0;
        text-align: center;
    }
    .banner h1 {
        font-size: 48px;
        margin-bottom: 20px;
    }
    .banner p {
        font-size: 24px;
        margin-bottom: 30px;
    }
    .banner .btn {
        background-color: #ff6600;
        color: white;
        padding: 15px 30px;
        text-decoration: none;
        font-size: 20px;
        border-radius: 5px;
    }
    .banner .btn:hover {
        background-color: #e65c00;
    }

    .overview{
        padding: 50px 0;
        background-color: #f9f9f9;
        text-align: center;
    }

    .overview h2 {
        font-size: 36px;
        margin-bottom: 30px;
    }
    .overview .features {
        display: flex;
        justify-content: space-around;
    }
    .overview .feature {
        width: 30%;
    }
    .overview .feature h3 {
        font-size: 24px;
        margin-bottom: 15px;
    }
    .overview .feature p {
        font-size: 18px;
        line-height: 1.5;
    }
</style>
