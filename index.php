<?php
// Include session handler to start the session and manage session variables
include 'session_handler.php';

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user_id']); // Check if user is logged in
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

      <!-- Simple Login Indicator -->
      <div class="login-status">
        <?php if ($isLoggedIn): ?>
          <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! You are logged in.</span>
        <?php else: ?>
          <span>You are not logged in.</span>
        <?php endif; ?>
      </div>

      <!-- Main Menu (Desktop View) -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link text-white active" href="index.php">Home</a>
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

          <!-- User Icon or Login Button -->
          <div id="userSection">
            <?php if ($isLoggedIn): ?>
              <!-- Display User Icon and Dropdown -->
              <div class="dropdown">
                <button class="btn btn-transparent text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user fa-lg"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
                </ul>
              </div>
            <?php else: ?>
              <!-- Show Login Button when not logged in -->
              <a href="#" id="loginTrigger" class="text-white me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                <i class="fas fa-user fa-lg"></i>
              </a>
            <?php endif; ?>
          </div>

          <a href="Cart.php" class="text-white">
            <i class="fas fa-shopping-bag fa-lg"></i>
          </a>

          <!-- Hidden Button for Admin -->
          <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin'): ?>
            <button id="adminDashboardButton" class="btn btn-danger ms-3" style="display: none;" onclick="window.location.href='AdminSide/Dashboard.php'">
              Admin Dashboard
            </button>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>

  <!-- Script to show the hidden button -->
  <script>
    // Make the hidden button visible if the user is an Admin
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin'): ?>
      document.getElementById('adminDashboardButton').style.display = 'block';
    <?php endif; ?>
  </script>

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
          <?php if (!$isLoggedIn): ?>
            <a class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
          <?php endif; ?>
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
          <form id="loginForm" method="POST" action="login.php">
            <!-- Username Input -->
            <div class="form-group">
              <i class="fas fa-user"></i>
              <input type="text" class="form-control" id="username" placeholder="Username" required>
            </div>
            <!-- Password Input -->
            <div class="form-group">
              <i class="fas fa-lock"></i>
              <input type="password" class="form-control" id="password" placeholder="Password" required>
            </div>
            <!-- Buttons -->
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
          <form action="register.php" method="POST">
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

  <!--Main Body-->
  <!-- Hero Carousel -->
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="hero d-flex align-items-center">
          <div class="container">
            <div class="row">
              <!-- Image on the Left -->
              <div class="col-md-6">
                <img src="images/cover.jpg" alt="Controller" class="img-fluid rounded carousel-image">
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
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="hero d-flex align-items-center">
          <div class="container">
            <div class="row">
              <!-- Image on the Left -->
              <div class="col-md-6">
                <img src="images/slide2.jpg" alt="Controller 2" class="img-fluid rounded carousel-image">
              </div>
              <!-- Text Content on the Right -->
              <div class="col-md-6 text-white">
                <h1 class="display-4 fw-bold">Precision Gaming</h1>
                <p>
                  Experience the next level of gaming precision with TapTek's leverless controllers. Designed for
                  competitive gamers, our products ensure unmatched speed and accuracy.
                </p>
                <a href="#popular-products" class="btn btn-light btn-lg">Explore now</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="hero d-flex align-items-center">
          <div class="container">
            <div class="row">
              <!-- Image on the Left -->
              <div class="col-md-6">
                <img src="images/slide3.jpg" alt="Controller 3" class="img-fluid rounded carousel-image">
              </div>
              <!-- Text Content on the Right -->
              <div class="col-md-6 text-white">
                <h1 class="display-4 fw-bold">Built for Champions</h1>
                <p>
                  TapTek controllers are trusted by top players worldwide. Join the champions and elevate your
                  gaming experience with our cutting-edge technology.
                </p>
                <a href="#loginModal" class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-tartget="#loginModal" data-bs-dismiss="modal">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Carousel Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Popular Products Section -->
  <div id="popular-products" class="container my-5">
    <h2 class="text-center fw-bold">Popular Products</h2>
    <div class="row mt-4">
      <!-- Product Card 1 -->
      <div class="col-md-3">
        <div class="card product-card">
          <img src="images/MicroLite.jpeg" class="card-img-top product-img" alt="Product 1">
          <div class="card-body">
            <h5 class="card-title">Micro Lite</h5>
            <p class="text-muted"><span class="fw-bold">₱2,500.00</span></p>
          </div>
        </div>
      </div>
      <!-- Product Card 2 -->
      <div class="col-md-3">
        <div class="card product-card">
          <img src="images/Cosmox.jpg" class="card-img-top product-img" alt="Product 2">
          <div class="card-body">
            <h5 class="card-title">Cosmox</h5>
            <p class="fw-bold">₱5,000.00</p>
          </div>
        </div>
      </div>
      <!-- Product Card 3 -->
      <div class="col-md-3">
        <div class="card product-card">
          <img src="images/Skullbox.jpeg" class="card-img-top product-img" alt="Product 3">
          <div class="card-body">
            <h5 class="card-title">Skullbox</h5>
            <p class="fw-bold">₱2,500.00</p>
          </div>
        </div>
      </div>
      <!-- Product Card 4 -->
      <div class="col-md-3">
        <div class="card product-card">
          <img src="images/Razer_Kitsunenb.png" class="card-img-top product-img" alt="Product 4">
          <div class="card-body">
            <h5 class="card-title">Razer Kitsune</h5>
            <p class="text-muted"><span class="fw-bold">₱17,000.00</span></p>
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
        <a href="index.php" class="footer-link">Home</a>
        <a href="Shop.php" class="footer-link">Shop</a>
        <a href="Policy.php" class="footer-link">Purchasing Policy</a>
      </div>

      <!-- Section 3: Social Media Icons -->
      <div class="text-center mb-3">
        <a href="https://www.facebook.com/renz.dioneda.967806" class="footer-icon"><i class="fab fa-facebook"></i></a>
        <a href="https://www.facebook.com/lewytaro/" class="footer-icon"><i class="fab fa-facebook"></i></a>
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
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- JavaScript for login handling -->
  <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
      event.preventDefault();

      // Get user inputs
      const username = document.getElementById('username').value;
      const password = document.getElementById('password').value;

      // Create an object for sending to the backend
      const loginData = new FormData();
      loginData.append('username', username);
      loginData.append('password', password);

      // Make an AJAX request to verify login credentials
      fetch('login.php', {
          method: 'POST',
          body: loginData
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Login successful, redirect or perform necessary actions
            window.location.href = 'index.php'; // Example of redirect after successful login

          } else {
            // Show error message (optional)
            alert('Invalid credentials');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('An error occurred. Please try again later.');
        });
    });
  </script>
</body>

</html>