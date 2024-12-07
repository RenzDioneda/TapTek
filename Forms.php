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
        <a href="#" class="text-white me-3" data-bs-toggle="modal" data-bs-target="#searchModal">
          <i class="fas fa-search fa-lg"></i>
        </a>
        <div class="d-flex align-items-center">
          <a href="#" class="text-white me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
            <i class="fas fa-user fa-lg"></i>
          </a>
          <a href="Cart.php" class="text-white">
            <i class="fas fa-shopping-bag fa-lg"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="searchModalLabel">Search Products</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Search Field -->
        <div class="mb-3">
          <label for="searchInput" class="form-label">Search</label>
          <input type="text" class="form-control" id="searchInput" placeholder="Search for products...">
        </div>
        
        <!-- Filter By Section -->
        <div class="mb-3">
          <label for="filterSelect" class="form-label">Filter By:</label>
          <select class="form-select" id="filterSelect">
            <option selected>Choose filter</option>
            <option value="1">Price: Low to High</option>
            <option value="2">Price: High to Low</option>
            <option value="3">Compatibility</option>
            <option value="4">Rating: High to Low</option>
            <option value="5">Rating: Low to High</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Search</button>
      </div>
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