<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Properties | StayNest</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
rel="stylesheet">

<link rel="stylesheet"
href="css/style.css">

</head>

<body>

<!-- ================= NAVBAR ================= -->

<?php include("navbar.php"); ?>

<!-- ================= PAGE HEADER ================= -->

<section class="bg-light py-5">

<div class="container">

<nav>

<ol class="breadcrumb">

<li class="breadcrumb-item">

<a href="index.php">

Home

</a>

</li>

<li class="breadcrumb-item active">

Properties

</li>

</ol>

</nav>

<h1 class="fw-bold">

Find Your Perfect Accommodation

</h1>

<p class="text-muted">

Browse verified PGs, Hostels and Co-Living spaces across India.

</p>

</div>

</section>

<!-- ================= PROPERTY SECTION ================= -->

<section class="py-5">

<div class="container">

<div class="row">

<!-- ================= FILTER SIDEBAR ================= -->

<div class="col-lg-3">

<div class="card shadow border-0 rounded-4 p-4">

<h4 class="fw-bold mb-4">

Filters

</h4>

<!-- Search -->

<div class="mb-4">

<label class="form-label">

Search

</label>

<input type="text"

class="form-control"

placeholder="Search Property">

</div>

<!-- City -->

<div class="mb-4">

<label class="form-label">

City

</label>

<select class="form-select">

<option>All Cities</option>

<option>Delhi</option>

<option>Noida</option>

<option>Lucknow</option>

<option>Bengaluru</option>

<option>Hyderabad</option>

</select>

</div>

<!-- Gender -->

<div class="mb-4">

<label class="form-label">

Accommodation Type

</label>

<div class="form-check">

<input class="form-check-input"
type="checkbox">

<label class="form-check-label">

Boys

</label>

</div>

<div class="form-check">

<input class="form-check-input"
type="checkbox">

<label class="form-check-label">

Girls

</label>

</div>

<div class="form-check">

<input class="form-check-input"
type="checkbox">

<label class="form-check-label">

Co-Living

</label>

</div>

</div>

<!-- Price -->

<div class="mb-4">

<label class="form-label">

Monthly Rent

</label>

<input type="range"

class="form-range"

min="5000"

max="15000">

<div class="d-flex justify-content-between">

<small>

₹5000

</small>

<small>

₹15000

</small>

</div>

</div>

<!-- Sidebar continues in Part 2 -->

</div>

</div>

<!-- ================= PROPERTY LIST START ================= -->

<div class="col-lg-9">

<div class="d-flex justify-content-between align-items-center mb-4">

<h3 class="fw-bold">

Available Properties

</h3>

<select class="form-select w-auto">

<option>

Sort By

</option>

<option>

Price: Low to High

</option>

<option>

Price: High to Low

</option>

<option>

Highest Rated

</option>

</select>

</div>

<!-- Property Cards Start Here -->
<div class="row" id="propertyContainer">

</div>


<!-- ================= PAGINATION ================= -->

<nav class="mt-4">

<ul class="pagination justify-content-center">

<li class="page-item disabled">

<a class="page-link" href="#">

Previous

</a>

</li>

<li class="page-item active">

<a class="page-link" href="#">

1

</a>

</li>

<li class="page-item">

<a class="page-link" href="#">

2

</a>

</li>

<li class="page-item">

<a class="page-link" href="#">

3

</a>

</li>

<li class="page-item">

<a class="page-link" href="#">

Next

</a>

</li>

</ul>

</nav>

</div>

</div>

</div>

</section>
<!-- ================= FOOTER ================= -->

<footer class="bg-dark text-white pt-5 pb-3">

<div class="container">

<div class="row">

<div class="col-lg-4 mb-4">

<h4 class="fw-bold">

StayNest

</h4>

<p>

StayNest helps students find safe, affordable and verified PGs, hostels and co-living spaces across India.

</p>

<div class="mt-3">

<a href="#" class="text-white me-3">

<i class="bi bi-facebook fs-4"></i>

</a>

<a href="#" class="text-white me-3">

<i class="bi bi-instagram fs-4"></i>

</a>

<a href="#" class="text-white me-3">

<i class="bi bi-twitter-x fs-4"></i>

</a>

<a href="#" class="text-white">

<i class="bi bi-linkedin fs-4"></i>

</a>

</div>

</div>

<div class="col-lg-2 mb-4">

<h5>

Quick Links

</h5>

<ul class="list-unstyled">

<li><a href="index.php" class="text-decoration-none text-white">Home</a></li>

<li><a href="property-list.php" class="text-decoration-none text-white">Properties</a></li>

<li><a href="index.php#about" class="text-decoration-none text-white">About</a></li>

<li><a href="index.php#contact" class="text-decoration-none text-white">Contact</a></li>

</ul>

</div>

<div class="col-lg-3 mb-4">

<h5>

Contact

</h5>

<p>

<i class="bi bi-geo-alt-fill"></i>

New Delhi, India

</p>

<p>

<i class="bi bi-envelope-fill"></i>

info@staynest.com

</p>

<p>

<i class="bi bi-telephone-fill"></i>

+91 98765 43210

</p>

</div>

<div class="col-lg-3 mb-4">

<h5>

Newsletter

</h5>

<p>

Subscribe for latest PG offers and updates.

</p>

<div class="input-group">

<input type="email"

class="form-control"

placeholder="Email Address">

<button class="btn btn-primary">

Subscribe

</button>

</div>

</div>

</div>

<hr>

<div class="text-center">

<p class="mb-0">

© 2026 StayNest. All Rights Reserved.

</p>

</div>

</div>

</footer>

<!-- ================= BOOTSTRAP JS ================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="js/fetch-properties.js"></script>

</body>
</html>