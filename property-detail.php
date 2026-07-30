<?php
include("php/config.php");

if (!isset($_GET['id'])) {
    die("Property ID not found.");
}

$id = $_GET['id'];

$sql = "SELECT * FROM properties WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("Property not found.");
}

$property = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Property Details | StayNest</title>

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
<!-- ================= BREADCRUMB ================= -->

<section class="bg-light py-4">

<div class="container">

<nav>

<ol class="breadcrumb">

<li class="breadcrumb-item">

<a href="index.php">

Home

</a>

</li>

<li class="breadcrumb-item">

<a href="property-list.php">

Properties

</a>

</li>

<li class="breadcrumb-item active">

Sunrise Residency

</li>

</ol>

</nav>

</div>

</section>

<!-- ================= PROPERTY HEADER ================= -->

<section class="py-5">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-8">

<span class="badge bg-success mb-3">

⭐ <?php echo $property['rating']; ?> Rating

</span>

<h1 class="fw-bold mb-3">
    <?php echo $property['name']; ?>
</h1>
<p class="text-muted fs-5">

<i class="bi bi-geo-alt-fill text-danger"></i>

<?php echo $property['location']; ?>

</p>

<div class="d-flex flex-wrap gap-3 mt-4">

<span class="badge bg-primary p-3">

Boys PG

</span>

<span class="badge bg-warning text-dark p-3">

Fully Furnished

</span>

<span class="badge bg-success p-3">

Available Now

</span>

</div>

</div>

<div class="col-lg-4 text-lg-end mt-4 mt-lg-0">

<h2 class="text-primary fw-bold">

₹7,500

<span class="fs-5 text-dark">

/ Month

</span>

</h2>

<p class="text-muted">

No Brokerage • Verified Property

</p>

</div>

</div>

<hr class="my-5">

<div class="row">

<!-- Left & Right Section Starts Here -->

<!-- ================= LEFT SIDE ================= -->

<div class="col-lg-8">

<img src="images/<?php echo $property['image']; ?>"
class="img-fluid rounded-4 shadow mb-4 w-100"
alt="<?php echo $property['name']; ?>">

<div class="row g-3">

<div class="col-3">

<img src="images/property1.jpg"
class="img-fluid rounded-3 shadow-sm"
alt="Gallery Image 1">

</div>

<div class="col-3">

<img src="images/property2.jpg"
class="img-fluid rounded-3 shadow-sm"
alt="Gallery Image 2">

</div>

<div class="col-3">

<img src="images/property3.jpg"
class="img-fluid rounded-3 shadow-sm"
alt="Gallery Image 3">

</div>

<div class="col-3">

<img src="images/property4.jpg"
class="img-fluid rounded-3 shadow-sm"
alt="Gallery Image 4">

</div>

</div>

</div>

<!-- ================= RIGHT SIDE ================= -->

<div class="col-lg-4">

<div class="card border-0 shadow rounded-4 p-4 sticky-top"
style="top:100px;">

<h3 class="fw-bold text-primary">

₹<?php echo $property['price']; ?>

<span class="fs-6 text-dark">

/ Month

</span>

</h3>

<hr>

<div class="mb-3">

<p>

<i class="bi bi-building text-primary me-2"></i>

<strong>Property :</strong>

<?php echo $property['name']; ?>

</p>

<p>

<i class="bi bi-geo-alt-fill text-danger me-2"></i>

<strong>Location :</strong>

<?php echo $property['location']; ?>

</p>

<p>

<i class="bi bi-people-fill text-success me-2"></i>

<strong>Type :</strong>

<?php echo $property['gender']; ?>

</p>

<p>

<i class="bi bi-door-open-fill text-warning me-2"></i>

<strong>Rooms :</strong>

Single & Double Sharing

</p>

<p>

<i class="bi bi-check-circle-fill text-success me-2"></i>

<strong>Status :</strong>

Available

</p>

</div>

<hr>

<div class="d-grid gap-3">

<form action="php/interested.php" method="POST">

    <input type="hidden"
           name="property_id"
           value="<?php echo $property['id']; ?>">

    <button type="submit" class="btn btn-danger btn-lg w-100">

        <i class="bi bi-heart-fill"></i>

        Interested

    </button>

</form>

<button class="btn btn-primary btn-lg">

<i class="bi bi-calendar-check"></i>

Book a Visit

</button>

<button class="btn btn-success btn-lg">

<i class="bi bi-telephone-fill"></i>

Contact Owner

</button>

</div>

<div class="mt-4">

<div class="d-flex justify-content-between mb-2">

<span>

Security Deposit

</span>

<strong>

₹5,000

</strong>

</div>

<div class="d-flex justify-content-between mb-2">

<span>

Electricity

</span>

<strong>

Extra

</strong>

</div>

<div class="d-flex justify-content-between">

<span>

Food Included

</span>

<strong class="text-success">

Yes

</strong>

</div>

</div>

</div>

</div>

</div>

</div>

</section>

<!-- ================= ABOUT PROPERTY ================= -->

<section class="py-5 bg-light">

<div class="container">

<h2 class="fw-bold mb-4">

About Property

</h2>

<p class="lead text-muted">
    <?php echo $property['description']; ?>
</p>

</div>

</section>

<!-- ================= AMENITIES ================= -->

<section class="py-5">

<div class="container">

<h2 class="fw-bold text-center mb-5">

Amenities

</h2>

<div class="row g-4">

<div class="col-md-3 col-6">

<div class="card border-0 shadow-sm text-center p-4 h-100">

<i class="bi bi-wifi fs-1 text-primary mb-3"></i>

<h5>High-Speed WiFi</h5>

</div>

</div>

<div class="col-md-3 col-6">

<div class="card border-0 shadow-sm text-center p-4 h-100">

<i class="bi bi-snow fs-1 text-info mb-3"></i>

<h5>Air Conditioning</h5>

</div>

</div>

<div class="col-md-3 col-6">

<div class="card border-0 shadow-sm text-center p-4 h-100">

<i class="bi bi-cup-hot fs-1 text-danger mb-3"></i>

<h5>Healthy Food</h5>

</div>

</div>

<div class="col-md-3 col-6">

<div class="card border-0 shadow-sm text-center p-4 h-100">

<i class="bi bi-camera-video fs-1 text-success mb-3"></i>

<h5>24×7 CCTV</h5>

</div>

</div>

<div class="col-md-3 col-6">

<div class="card border-0 shadow-sm text-center p-4 h-100">

<i class="bi bi-basket fs-1 text-warning mb-3"></i>

<h5>Laundry</h5>

</div>

</div>

<div class="col-md-3 col-6">

<div class="card border-0 shadow-sm text-center p-4 h-100">

<i class="bi bi-car-front fs-1 text-primary mb-3"></i>

<h5>Parking</h5>

</div>

</div>

<div class="col-md-3 col-6">

<div class="card border-0 shadow-sm text-center p-4 h-100">

<i class="bi bi-lightning-charge fs-1 text-warning mb-3"></i>

<h5>Power Backup</h5>

</div>

</div>

<div class="col-md-3 col-6">

<div class="card border-0 shadow-sm text-center p-4 h-100">

<i class="bi bi-house-heart fs-1 text-success mb-3"></i>

<h5>Housekeeping</h5>

</div>

</div>

</div>

</div>

</section>

<!-- ================= PROPERTY RULES ================= -->

<section class="py-5 bg-light">

<div class="container">

<h2 class="fw-bold mb-4">

Property Rules

</h2>

<div class="card border-0 shadow rounded-4 p-4">

<ul class="mb-0">

<li class="mb-3">

Visitors are allowed only during visiting hours.

</li>

<li class="mb-3">

Maintain cleanliness in common areas.

</li>

<li class="mb-3">

Smoking and alcohol consumption are strictly prohibited.

</li>

<li class="mb-3">

Keep noise levels low after 10:00 PM.

</li>

<li class="mb-3">

Government ID is mandatory during admission.

</li>

<li>

Monthly rent should be paid before the 5th of every month.

</li>

</ul>

</div>

</div>

</section>

<!-- ================= LOCATION ================= -->

<section class="py-5">

<div class="container">

<h2 class="fw-bold mb-4">

Location

</h2>

<div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow">

<iframe

src="https://www.google.com/maps?q=Sector+62+Noida&output=embed"

loading="lazy"

allowfullscreen>

</iframe>

</div>

<div class="row text-center mt-5">

<div class="col-md-3 mb-4">

<i class="bi bi-mortarboard-fill fs-1 text-primary"></i>

<h5 class="mt-3">

College

</h5>

<p class="text-muted">

0.8 km Away

</p>

</div>

<div class="col-md-3 mb-4">

<i class="bi bi-train-front-fill fs-1 text-success"></i>

<h5 class="mt-3">

Metro Station

</h5>

<p class="text-muted">

1.2 km Away

</p>

</div>

<div class="col-md-3 mb-4">

<i class="bi bi-hospital-fill fs-1 text-danger"></i>

<h5 class="mt-3">

Hospital

</h5>

<p class="text-muted">

2 km Away

</p>

</div>

<div class="col-md-3 mb-4">

<i class="bi bi-cart-fill fs-1 text-warning"></i>

<h5 class="mt-3">

Market

</h5>

<p class="text-muted">

500 m Away

</p>

</div>

</div>

</div>

</section>

<!-- ================= STUDENT REVIEWS ================= -->

<section class="py-5 bg-light">

<div class="container">

<h2 class="fw-bold text-center mb-5">

Student Reviews

</h2>

<div class="row g-4">

<div class="col-lg-4">

<div class="card border-0 shadow h-100 p-4 text-center">

<img src="images/student1.jpg"
class="rounded-circle mx-auto mb-3"
width="90"
height="90"
alt="Student">

<h5 class="fw-bold">

Rahul Sharma

</h5>

<p class="text-warning">

★★★★★

</p>

<p class="text-muted">

The rooms are clean, food quality is good and the staff is very supportive. Metro station is also nearby.

</p>

</div>

</div>

<div class="col-lg-4">

<div class="card border-0 shadow h-100 p-4 text-center">

<img src="images/student2.jpg"
class="rounded-circle mx-auto mb-3"
width="90"
height="90"
alt="Student">

<h5 class="fw-bold">

Priya Verma

</h5>

<p class="text-warning">

★★★★★

</p>

<p class="text-muted">

Affordable rent with all essential facilities. I have been staying here for more than one year.

</p>

</div>

</div>

<div class="col-lg-4">

<div class="card border-0 shadow h-100 p-4 text-center">

<img src="images/student3.jpg"
class="rounded-circle mx-auto mb-3"
width="90"
height="90"
alt="Student">

<h5 class="fw-bold">

Aman Gupta

</h5>

<p class="text-warning">

★★★★☆

</p>

<p class="text-muted">

Great location and peaceful environment. WiFi speed and housekeeping are excellent.

</p>

</div>

</div>

</div>

</div>

</section>

<!-- ================= SIMILAR PROPERTIES ================= -->

<section class="py-5">

<div class="container">

<div class="d-flex justify-content-between align-items-center mb-5">

<h2 class="fw-bold">

Similar Properties

</h2>

<a href="property-list.php"
class="btn btn-outline-primary">

View All

</a>

</div>

<div class="row g-4">

<!-- Property 1 -->

<div class="col-lg-4">

<div class="card property-card border-0 shadow h-100">

<img src="images/property2.jpg"
class="card-img-top"
alt="Green Valley PG">

<div class="card-body">

<h5 class="fw-bold">

Green Valley PG

</h5>

<p class="text-muted">

<i class="bi bi-geo-alt-fill text-danger"></i>

Delhi

</p>

<h4 class="text-primary">

₹8,500
<span class="fs-6 text-dark">/month</span>

</h4>

<a href="property-detail.html"
class="btn btn-primary w-100 mt-3">

View Details

</a>

</div>

</div>

</div>

<!-- Property 2 -->

<div class="col-lg-4">

<div class="card property-card border-0 shadow h-100">

<img src="images/property3.jpg"
class="card-img-top"
alt="Royal Residency">

<div class="card-body">

<h5 class="fw-bold">

Royal Residency

</h5>

<p class="text-muted">

<i class="bi bi-geo-alt-fill text-danger"></i>

Lucknow

</p>

<h4 class="text-primary">

₹6,800
<span class="fs-6 text-dark">/month</span>

</h4>

<a href="property-detail.html"
class="btn btn-primary w-100 mt-3">

View Details

</a>

</div>

</div>

</div>

<!-- Property 3 -->

<div class="col-lg-4">

<div class="card property-card border-0 shadow h-100">

<img src="images/property4.jpg"
class="card-img-top"
alt="Elite Student House">

<div class="card-body">

<h5 class="fw-bold">

Elite Student House

</h5>

<p class="text-muted">

<i class="bi bi-geo-alt-fill text-danger"></i>

Bengaluru

</p>

<h4 class="text-primary">

₹9,000
<span class="fs-6 text-dark">/month</span>

</h4>

<a href="property-detail.html"
class="btn btn-primary w-100 mt-3">

View Details

</a>

</div>

</div>

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

StayNest helps students and working professionals find safe, verified and affordable PGs, hostels and co-living spaces across India.

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

<li><a href="index.php" class="text-white text-decoration-none">Home</a></li>

<li><a href="property-list.php" class="text-white text-decoration-none">Properties</a></li>

<li><a href="login.html" class="text-white text-decoration-none">Login</a></li>

<li><a href="signup.html" class="text-white text-decoration-none">Signup</a></li>

</ul>

</div>

<div class="col-lg-3 mb-4">

<h5>

Contact Us

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

Subscribe to receive new property updates.

</p>

<div class="input-group">

<input
type="email"
class="form-control"
placeholder="Enter Email">

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

</body>

</html>