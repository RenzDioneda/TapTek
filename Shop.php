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
          <a class="nav-link text-white" href="Home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active" href="Shop.php">Shop</a>
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
</nav>

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
            <!-- First Name -->
            <div class="form-group">
              <i class="fas fa-user"></i>
              <input type="text" class="form-control" placeholder="First Name" required>
            </div>
            <!-- Last Name -->
            <div class="form-group">
              <i class="fas fa-user"></i>
              <input type="text" class="form-control" placeholder="Last Name" required>
            </div>
            <!-- Birthday -->
            <div class="form-group">
              <i class="fas fa-calendar"></i>
                <input type="text" class="form-control"placeholder="Birthday" onfocus="(this.type='date')" onblur="(this.type='text'); this.value ? '' : this.placeholder='Birthday'" required>
             </div>
            <!-- Age -->
            <div class="form-group">
              <i class="fas fa-sort-numeric-up"></i>
              <input type="number" class="form-control" placeholder="Age" required>
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
            <!-- Confirm Password -->
            <div class="form-group">
              <i class="fas fa-lock"></i>
              <input type="password" class="form-control" placeholder="Confirm Password" required>
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
      <div class="product-card">
        <img src="images/Hitboxnb.png" alt="Product 1">
        <div class="card-body">
          <a href="#" class="card-title">Hitbox (PC)</a>
          <p class="price">₱8,000.00</p>
        </div>
      </div>
    </div>
    <!-- Product 2 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <div class="product-card">
        <img src="images/Skullboxnb.png" alt="Product 2">
        <div class="card-body">
          <a href="#" class="card-title">Skullbox (Switch)</a>
          <p class="price">₱2,500.00</p>
        </div>
      </div>
    </div>
    <!-- Product 3 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <div class="product-card">
        <img src="images/Razer_Kitsunenb.png" alt="Product 3">
        <div class="card-body">
          <a href="RazerKitsune.php" class="card-title">Razer Kitsune (PS5)</a>
          <p class="price">₱17,000.00</p>
        </div>
      </div>
    </div>
    <!-- Product 4 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <div class="product-card">
        <img src="images/VictrixKO.webp" alt="Product 4">
        <div class="card-body">
          <a href="#" class="card-title">Victrix KO</a>
          <p class="price">₱12,000.00</p>
        </div>
      </div>
    </div>
    <!-- Product 5 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <div class="product-card">
        <img src="images/Overdrivenb.png" alt="Product 5">
        <div class="card-body">
          <a href="#" class="card-title">Overdrive (PC)</a>
          <p class="price">₱10,000.00</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row g-4 justify-content-center">
    <!-- Product 6 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <div class="product-card">
        <img src="images/VictrixLL.webp" alt="Product 1">
        <div class="card-body">
          <a href="#" class="card-title">Victrix LL (PS5)</a>
          <p class="price">₱12,000.00</p>
        </div>
      </div>
    </div>
    <!-- Product 7 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <div class="product-card">
        <img src="images/FTGT16nb.png" alt="Product 2">
        <div class="card-body">
          <a href="#" class="card-title">FTG16 (PC)</a>
          <p class="price">₱5,000.00</p>
        </div>
      </div>
    </div>
    <!-- Product 8 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <div class="product-card">
        <img src="images/HauteM16nb.png" alt="Product 3">
        <div class="card-body">
          <a href="#" class="card-title">Haute M16 (Switch)</a>
          <p class="price">₱2,500.00</p>
        </div>
      </div>
    </div>
    <!-- Product 9 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <div class="product-card">
        <img src="images/MicroLitenb.png" alt="Product 4">
        <div class="card-body">
          <a href="#" class="card-title">Micro Lite (Switch)</a>
          <p class="price">₱2,500.00</p>
        </div>
      </div>
    </div>
    <!-- Product 10 -->
    <div class="col-lg-2 col-md-4 col-sm-6">
      <div class="product-card">
        <img src="images/Cosmoxnb.png" alt="Product 5">
        <div class="card-body">
          <a href="#" class="card-title">Cosmox (PC)</a>
          <p class="price">₱5,000.00</p>
        </div>
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
