<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- ===================== NAVBAR ===================== -->

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">

<div class="container">

<a class="navbar-brand fw-bold d-flex align-items-center"
href="index.php">

<img src="images/logo.png"
height="45"
class="me-2">

<span class="fs-4">

StayNest

</span>

</a>

<button class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#navbar">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse"
id="navbar">

<ul class="navbar-nav ms-auto align-items-lg-center">

<li class="nav-item">

<a class="nav-link active"
href="index.php">

Home

</a>

</li>

<li class="nav-item">
    <a class="nav-link" href="property-list.php">
        Properties
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="interested-properties.php">
        <i class="bi bi-heart-fill"></i> Interested
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="#about">
        About
    </a>
</li>
<li class="nav-item">

<a class="nav-link"
href="#contact">

Contact

</a>

</li>

<?php if(isset($_SESSION['user_id'])) { ?>

<li class="nav-item dropdown ms-lg-3">

    <a class="nav-link dropdown-toggle fw-semibold"
       href="#"
       role="button"
       data-bs-toggle="dropdown">

        <i class="bi bi-person-circle"></i>
        Hi, <?php echo $_SESSION['name']; ?>

    </a>

    <ul class="dropdown-menu dropdown-menu-end">

        <li>
            <a class="dropdown-item"
               href="profile.php">

                <i class="bi bi-person"></i>
                My Profile

            </a>
        </li>

        <li>
            <a class="dropdown-item"
               href="interested-properties.php">

                <i class="bi bi-heart-fill text-danger"></i>
                Interested Properties

            </a>
        </li>

        <li><hr class="dropdown-divider"></li>

        <li>
            <a class="dropdown-item text-danger"
               href="logout.php">

                <i class="bi bi-box-arrow-right"></i>
                Logout

            </a>
        </li>

    </ul>

</li>

<?php } else { ?>

<li class="nav-item ms-lg-3">
    <a href="login.html" class="btn btn-outline-primary">
        <i class="bi bi-box-arrow-in-right"></i>
        Login
    </a>
</li>

<li class="nav-item ms-lg-2">
    <a href="signup.html" class="btn btn-primary">
        Signup
    </a>
</li>

<?php } ?>

</ul>

</div>

</div>

</nav>
