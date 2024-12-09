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
  <link rel="stylesheet" href="Shop.css">
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
    <a class="navbar-brand" href="Home.php">
      <img src="images/Logo.png" alt="Junk Food Logo" class="navbar-logo">
    </a>

    <!-- Main Menu (Desktop View) -->
    <div class="collapse navbar-collapse" id="navbarNav">
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
      <div class="d-flex align-items-center">
        <a href="#" class="text-white me-3">
          <i class="fas fa-search fa-lg"></i>
        </a>
        <a href="#" class="text-white me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
          <i class="fas fa-user fa-lg"></i>
        </a>
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
    <a class="navbar-brand" href="Home.php">
      <img src="images/Logo.png" alt="Junk Food Logo" class="navbar-logo">
    </a>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white active" href="Home.php">Home</a>
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
          <!-- Username Input -->
          <div class="form-group">
            <i class="fas fa-user"></i>
            <input 
              type="text" 
              class="form-control" 
              id="username" 
              placeholder="Username" 
              required 
            >
          </div>
          <!-- Password Input -->
          <div class="form-group">
            <i class="fas fa-lock"></i>
            <input 
              type="password" 
              class="form-control" 
              id="password" 
              placeholder="Password" 
              required 
            >
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
        <form>
          <!-- Username -->
          <div class="form-group">
            <i class="fas fa-user"></i>
            <input type="text" class="form-control" placeholder="Username" required>
          </div>

          <!-- Email -->
          <div class="form-group">
            <i class="fas fa-envelope"></i>
            <input type="email" class="form-control" placeholder="Email" required>
          </div>

          <!-- Password -->
          <div class="form-group">
            <i class="fas fa-lock"></i>
            <input type="password" class="form-control" placeholder="Password" required>
          </div>

          <button type="submit" class="btn btn-primary w-100">Sign Up</button>
          <button type="button" class="btn btn-secondary w-100 mt-2" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Back</button>
        </form>
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
   <!-- Independent Title -->
   <div class="title">
    <h1>Controllers</h1>
  </div>

<!-- Product Grid -->
<div class="container">
  <div class="row g-4 justify-content-center"> <!-- Center the products -->
    <!-- Product 1 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <a href="Hitbox.php" class="text-decoration-none">
        <div class="product-card">
          <img src="images/Hitboxnb.png" alt="Product 1">
          <div class="card-body">
            <h5 class="card-title">Hitbox (PC)</h5>
            <p class="price">₱8,000.00</p>
          </div>
        </div>
      </a>
    </div>
    <!-- Product 2 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <a href="Skullbox.php" class="text-decoration-none">
        <div class="product-card">
          <img src="images/Skullboxnb.png" alt="Product 2">
          <div class="card-body">
            <h5 class="card-title">Skullbox (Switch)</h5>
            <p class="price">₱2,500.00</p>
          </div>
        </div>
      </a>
    </div>
    <!-- Product 3 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <a href="RazerKitsune.php" class="text-decoration-none">
        <div class="product-card">
          <img src="images/Razer_Kitsunenb.png" alt="Product 3">
          <div class="card-body">
            <h5 class="card-title">Razer Kitsune (PS5)</h5>
            <p class="price">₱17,000.00</p>
          </div>
        </div>
      </a>
    </div>
    <!-- Product 4 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <a href="VictrixKO.php" class="text-decoration-none">
        <div class="product-card">
          <img src="images/VictrixKO.webp" alt="Product 4">
          <div class="card-body">
            <h5 class="card-title">Victrix KO (PS5)</h5>
            <p class="price">₱12,000.00</p>
          </div>
        </div>
      </a>
    </div>
    <!-- Product 5 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <a href="Overdrive.php" class="text-decoration-none">
        <div class="product-card">
          <img src="images/Overdrivenb.png" alt="Product 5">
          <div class="card-body">
            <h5 class="card-title">Overdrive (PC)</h5>
            <p class="price">₱10,000.00</p>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>

<div class="container">
  <div class="row g-4 justify-content-center">
    <!-- Product 6 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <a href="VictrixLL.php" class="text-decoration-none">
        <div class="product-card">
          <img src="images/VictrixLL.webp" alt="Product 6">
          <div class="card-body">
            <h5 class="card-title">Victrix LL (PS5)</h5>
            <p class="price">₱12,000.00</p>
          </div>
        </div>
      </a>
    </div>
    <!-- Product 7 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <a href="FTGT16.php" class="text-decoration-none">
        <div class="product-card">
          <img src="images/FTGT16nb.png" alt="Product 7">
          <div class="card-body">
            <h5 class="card-title">FTG16 (PC)</h5>
            <p class="price">₱5,000.00</p>
          </div>
        </div>
      </a>
    </div>
    <!-- Product 8 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <a href="HauteM16.php" class="text-decoration-none">
        <div class="product-card">
          <img src="images/HauteM16nb.png" alt="Product 8">
          <div class="card-body">
            <h5 class="card-title">Haute M16 (Switch)</h5>
            <p class="price">₱2,500.00</p>
          </div>
        </div>
      </a>
    </div>
    <!-- Product 9 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <a href="Microlite.php" class="text-decoration-none">
        <div class="product-card">
          <img src="images/MicroLitenb.png" alt="Product 9">
          <div class="card-body">
            <h5 class="card-title">Micro Lite (Switch)</h5>
            <p class="price">₱2,500.00</p>
          </div>
        </div>
      </a>
    </div>
    <!-- Product 10 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <a href="Cosmox.php" class="text-decoration-none">
        <div class="product-card">
          <img src="images/Cosmoxnb.png" alt="Product 10">
          <div class="card-body">
            <h5 class="card-title">Cosmox (PC)</h5>
            <p class="price">₱5,000.00</p>
          </div>
        </div>
      </a>
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
