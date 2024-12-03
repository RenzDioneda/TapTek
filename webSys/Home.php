<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TapTek</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="mainlayout.css">
  <link rel="stylesheet" href="Home.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand" href="Home.php">
        <img src="images/Logo.png" alt="Junk Food Logo" class="navbar-logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Centered Links -->
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link text-white active" href="Home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="Shop.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="Contact.php">Contact</a>
          </li>
        </ul>
        <!-- Right-aligned Icons -->
        <div class="d-flex align-items-center">
          <a href="#" class="text-white me-3">
            <i class="fas fa-search fa-lg"></i>
          </a>
          <a href="Login.php" class="text-white me-3">
            <i class="fas fa-user fa-lg"></i>
          </a>
          <a href="Cart.php" class="text-white">
            <i class="fas fa-shopping-bag fa-lg"></i>
          </a>
        </div>
      </div>
    </div>
  </nav>

<!-- Hero Section -->
<div class="hero d-flex align-items-center">
  <div class="container">
    <div class="row">
      <!-- Image on the Left -->
      <div class="col-md-6">
        <img src="images/cover.jpg" alt="Controller" class="img-fluid rounded">
      </div>
      <!-- Text Content on the Right -->
      <div class="col-md-6 text-white">
        <h1 class="display-4 fw-bold">TAPTEK</h1>
        <p>
          TapTek is the premier destination for fighting game enthusiasts seeking cutting-edge, leverless
          controller solutions. Our online shop offers a wide range of innovative controllers designed to
          provide ultimate precision, speed, and comfort for competitive gamers.
        </p>
        <a href="Shop.php" class="btn btn-light btn-lg">Shop now</a>
      </div>
    </div>
  </div>
</div>

 <!-- Popular Products Section -->
<div class="container my-5">
  <h2 class="text-center fw-bold">Popular Products</h2>
  <div class="row mt-4">
    <!-- Product Card 1 -->
    <div class="col-md-3">
      <div class="card product-card">
        <img src="images/MicroLite.jpeg" class="card-img-top product-img" alt="Product 1">
        <div class="card-body">
          <h5 class="card-title">Micro Lite</h5>
          <p class="text-muted"><del>₱3,000.00</del> <span class="fw-bold">₱2,000.00</span></p>
        </div>
      </div>
    </div>
    <!-- Product Card 2 -->
    <div class="col-md-3">
      <div class="card product-card">
        <img src="images/Cosmox.jpg" class="card-img-top product-img" alt="Product 2">
        <div class="card-body">
          <h5 class="card-title">Cosmox</h5>
          <p class="fw-bold">₱3,000.00</p>
        </div>
      </div>
    </div>
    <!-- Product Card 3 -->
    <div class="col-md-3">
      <div class="card product-card">
        <img src="images/Skullbox.jpeg" class="card-img-top product-img" alt="Product 3">
        <div class="card-body">
          <h5 class="card-title">Skullbox</h5>
          <p class="fw-bold">₱3,000.00</p>
        </div>
      </div>
    </div>
    <!-- Product Card 4 -->
    <div class="col-md-3">
      <div class="card product-card">
        <img src="images/Razer Kitsune.JPG" class="card-img-top product-img" alt="Product 4">
        <div class="card-body">
          <h5 class="card-title">Razer Kitsune</h5>
          <p class="text-muted"><del>₱25,000.00</del> <span class="fw-bold">₱18,999.00</span></p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Why Choose TapTek Section -->
<div class="why-taptek container my-5">
  <div class="row align-items-center">
    <!-- Text Content -->
    <div class="col-md-6">
      <h2 class="fw-bold">Why Choose TapTek</h2>
      <p>
        TapTek is your ultimate destination for cutting-edge gaming controllers. Our products are designed with precision, speed, and comfort in mind, ensuring you have the competitive edge in every match.
      </p>
      <p>
        With TapTek, you gain access to innovative leverless controllers that redefine gaming performance. Whether you're a casual gamer or a professional competitor, our controllers are built to help you achieve your best.
      </p>
      <p>
        Explore our <a href="Shop.php" class="text-orange">Shop</a> to find the perfect controller for your needs and take your gaming to the next level.
      </p>
    </div>
    <!-- Image Content -->
    <div class="col-md-6">
      <img src="images/Main.jpg" alt="TapTek Controller" class="img-fluid rounded">
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="footer bg-black text-white">
  <div class="container py-4">
    <!-- Section 1: Title -->
    <div class="text-center mb-3">
      <h5 class="fw-bold">Shop</h5>
    </div>

    <!-- Section 2: Navigation Links -->
    <div class="text-center mb-3">
      <a href="Home.php" class="footer-link">Home</a>
      <a href="Shop.php" class="footer-link">Shop</a>
      <a href="Forms.phpz" class="footer-link">Forms</a>
      <a href="Policy.php" class="footer-link">Purchasing Policy</a>
    </div>

    <!-- Section 3: Social Media Icons -->
    <div class="text-center mb-3">
      <a href="#" class="footer-icon"><i class="fab fa-facebook"></i></a>
      <a href="#" class="footer-icon"><i class="fab fa-facebook"></i></a>
    </div>

    <!-- Section 5: Copyright -->
    <div class="text-center">
      <p class="mb-0">
        &copy; 2024, TapTek is a School Project made by Mark Luis A. Bertillo and Renz Dioneda. This website does not promote buying any of these items and is only for school purposes. The images and products used are not for business purposes. If you have any complaints about the product or images, you can email us at <a href="mailto:tapteks@gmail.com" class="footer-link">tapteks@gmail.com</a>.
      </p>
    </div>
  </div>
</footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>