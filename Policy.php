<?php
include 'session_handler.php'; // Adjust the path if necessary
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TapTek</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="mainlayout.css">
  <link rel="stylesheet" href="Login.css">
  <link rel="stylesheet" href="Home.css">
</head>

<body>

 <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-black">
  <div class="container">
    <!-- Burger Menu (Left-Aligned) -->
    <button class="navbar-toggler me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Logo -->
    <a class="navbar-brand" href="index.php">
      <img src="images/Logo.png" alt="Junk Food Logo" class="navbar-logo">
    </a>

    <!-- Main Menu (Desktop View) -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link text-white " href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="Shop.php">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="Contact.php">Contact</a>
        </li>
      </ul>
      <div class="d-flex align-items-center">
      <a href="#searchModal" class="text-white me-3" data-bs-toggle="modal">
        <i class="fas fa-search fa-lg"></i>
      </a>
        <!-- User Icon -->
        <div id="userSection">
          <!-- This part toggles dynamically -->
          <a href="#" id="loginTrigger" class="text-white me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
            <i class="fas fa-user fa-lg"></i>
          </a>
          <div class="dropdown d-none" id="userDropdown">
            <button class="btn btn-transparent text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user fa-lg"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
              <li><a class="dropdown-item" href="AccountSettings.php">Account Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="Logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
        <a href="Cart.php" class="text-white">
          <i class="fas fa-shopping-bag fa-lg"></i>
        </a>
      </div>
    </div>
  </div>
</nav>

<!-- Offcanvas Menu (Mobile View) -->
<div class="offcanvas offcanvas-start bg-black" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
  <div class="offcanvas-header">
    <!-- Logo in Offcanvas -->
    <a class="navbar-brand" href="index.php">
      <img src="images/Logo.png" alt="Junk Food Logo" class="navbar-logo">
    </a>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white active" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Shop.php">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Contact.php">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Cart.php">Cart</a>
      </li>
    </ul>
  </div>
</div>

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
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
            <option value="price-low-high">Price: Low to High</option>
            <option value="price-high-low">Price: High to Low</option>
            <option value="compatibility">Compatibility</option>
            <option value="rating-high-low">Rating: High to Low</option>
            <option value="rating-low-high">Rating: Low to High</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="searchButton">Search</button>
      </div>
    </div>
  </div>
</div>


<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <i class="fas fa-user"></i>
            <input
              type="text"
              class="form-control"
              id="username"
              placeholder="Username"
              required>
          </div>
          <div class="form-group">
            <i class="fas fa-lock"></i>
            <input
              type="password"
              class="form-control"
              id="password"
              placeholder="Password"
              required>
          </div>
          <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Login</button>
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#signupModal" data-bs-dismiss="modal">Sign Up</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="forgot-password w-100">
          <a href="#" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal" data-bs-dismiss="modal">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
</div>


  <!-- Sign-Up Modal -->
  <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="signupForm" action="register.php" method="POST">
            <!-- Username -->
            <div class="form-group">
              <i class="fas fa-user"></i>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>

            <!-- Email -->
            <div class="form-group">
              <i class="fas fa-envelope"></i>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>

            <!-- Password -->
            <div class="form-group">
              <i class="fas fa-lock"></i>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
            <button type="button" class="btn btn-secondary w-100 mt-2" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Back</button>
          </form>
          <div id="signupFeedback" class="mt-2 text-center"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Forgot Password Modal -->
  <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <!-- Email Input -->
            <div class="form-group">
              <i class="fas fa-envelope"></i>
              <input type="email" class="form-control" placeholder="Enter Email Address" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
            <button type="button" class="btn btn-secondary w-100 mt-2" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Back</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Body: Purchasing Policy -->
  <section id="purchasing-policy" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Purchasing Policy</h2>
      <p>Thank you for visiting and shopping at TapTek! We are committed to providing a seamless and secure shopping experience. Please review our purchasing policy below:</p>

      <!-- Policy Details -->
      <div class="row">
        <div class="col-md-6">
          <h4 class="fw-bold">1. Order Processing</h4>
          <p>Orders are processed within 1-2 business days. Orders placed on weekends or holidays will be processed on the next business day.</p>
        </div>

        <div class="col-md-6">
          <h4 class="fw-bold">2. Payment Methods</h4>
          <p>We accept the following payment methods: Visa, MasterCard, PayPal, and other secure payment gateways. All payments are processed securely.</p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <h4 class="fw-bold">3. Shipping</h4>
          <p>We offer standard shipping on all orders. Shipping fees will be calculated at checkout. Estimated delivery times depend on your location and will be displayed before you confirm your order.</p>
        </div>

        <div class="col-md-6">
          <h4 class="fw-bold">4. Returns & Exchanges</h4>
          <p>We accept returns and exchanges within 30 days of purchase. Items must be unused, in original packaging, and in resellable condition. Please contact our customer service team for return instructions.</p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <h4 class="fw-bold">5. Privacy & Security</h4>
          <p>Your privacy is important to us. We use secure encryption methods to process all personal and payment information. For more details, please review our Privacy Policy.</p>
        </div>

        <div class="col-md-6">
          <h4 class="fw-bold">6. Customer Support</h4>
          <p>If you have any questions regarding your purchase or need assistance, please contact us at <a href="mailto:tapteks@gmail.com">tapteks@gmail.com</a>. Our support team is available Monday to Friday from 9:00 AM to 5:00 PM (GMT).</p>
        </div>
      </div>

      <!-- Additional Information -->
      <div class="mt-5">
        <p>If you have any additional questions or concerns regarding our purchasing policy, feel free to reach out to us via our <a href="Contact.php">Contact Us</a> page. Thank you for shopping with TapTek!</p>
      </div>
    </div>
  </section>

<!-- Footer -->
<footer class="footer bg-black text-white">
  <div class="container py-4">
    <!-- Section 1: Title -->
    <div class="text-center mb-3">
      <h5 class="fw-bold">Shop</h5>
    </div>

    <!-- Section 2: Navigation Links -->
    <div class="text-center mb-3">
      <a href="index.php" class="footer-link">Home</a>
      <a href="Shop.php" class="footer-link">Shop</a>
      <a href="Policy.php" class="footer-link active">Purchasing Policy</a>
    </div>

    <!-- Section 3: Social Media Icons -->
    <div class="text-center mb-3">
      <a href="https://www.facebook.com/renz.dioneda.967806" class="footer-icon"><i class="fab fa-facebook"></i></a>
      <a href="https://www.facebook.com/lewytaro/" class="footer-icon"><i class="fab fa-facebook"></i></a>
    </div>

    <!-- Section 5: Copyright -->
    <div class="text-center">
      <p class="mb-0">
        &copy; 2024, TapTek Arcade Shop
      </p>
    </div>

    <!-- Disclaimer -->
    <div class="text-center mt-3">
      <p class="text-light">
        Disclaimer: This website and all its contents are part of a school project and are for educational purposes only. The products and images used on this site are not for commercial use, and the site does not promote any business activities.
      </p>
    </div>
  </div>
</footer>

  <!-- Bootstrap JS -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>