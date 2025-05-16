<ul class="navbar-nav ml-auto">
    <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
    <?php
    if (isset($_SESSION['barber'])) {
        echo '<li class="nav-item"><a class="nav-link" href="barberdashboard.php">Dashboard</a></li>';
        echo '<li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>';
    }

    if (isset($_SESSION['customer'])) {
        echo '<li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>';
    }
    ?>
    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
    <li class="nav-item"><a class="nav-link" href="barbers.php">Stylists</a></li>
    <!-- <li class="nav-item"><a class="nav-link" href="booking.php">Appointment</a></li> -->
    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
    <?php
    // Check if the 'barber' session is set
    if (isset($_SESSION['barber'])) {
        echo '<li class="nav-item"><a class="nav-link" href="functions.php?action=logout">Logout Barber</a></li>';
    } elseif (isset($_SESSION['customer'])) {
        echo '<li class="nav-item"><a class="nav-link" href="functions.php?action=logout">Logout Customer</a></li>';
    } else {
        echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
    }
    ?>
</ul>
