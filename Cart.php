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
  <link rel="stylesheet" href="Cart.css">
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
          <a class="nav-link text-white " href="Home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="Shop.php">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active" href="Contact.php">Contact</a>
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
  <div class="container">
  <div class="row g-4">
    <!-- Cart Section -->
    <div class="col-lg-8">
      <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="cart-header">Cart</h5>
        </div>

        <!-- Product 1 -->
        <div class="product-item" id="product-1">
          <div class="form-check">
            <input class="form-check-input product-checkbox" type="checkbox" data-product-id="1">
          </div>
          <div class="product-image">
            <img src="images/Razer_Kitsunenb.png" alt="Product 1">
          </div>
          <div class="product-details">
            <p class="mb-1"><strong>Razer Kitsune (PS5)</strong></p>
            <p class="Edition text-muted mb-1">Black</p>
          </div>
          <div class="quantity-control">
            <button class="decrease-btn">-</button>
            <span class="quantity">1</span>
            <button class="increase-btn">+</button>
          </div>
          <div class="product-price" data-price="2500.00">$2,500.00</div>
          <button class="remove-btn">Remove</button>
        </div>

        <!-- Product 2 -->
        <div class="product-item" id="product-2">
          <div class="form-check">
            <input class="form-check-input product-checkbox" type="checkbox" data-product-id="2">
          </div>
          <div class="product-image">
            <img src="https://via.placeholder.com/60" alt="Product 2">
          </div>
          <div class="product-details">
            <p class="mb-1"><strong>Cahier Leather Shoulder Bag</strong></p>
            <p class="text-muted mb-1">Grey | x1</p>
          </div>
          <div class="quantity-control">
            <button class="decrease-btn">-</button>
            <span class="quantity">1</span>
            <button class="increase-btn">+</button>
          </div>
          <div class="product-price" data-price="2500.00">$2,500.00</div>
          <button class="remove-btn">Remove</button>
        </div>

        <!-- Product 3 -->
        <div class="product-item" id="product-3">
          <div class="form-check">
            <input class="form-check-input product-checkbox" type="checkbox" data-product-id="3">
          </div>
          <div class="product-image">
            <img src="https://via.placeholder.com/60" alt="Product 3">
          </div>
          <div class="product-details">
            <p class="mb-1"><strong>Nordgreen Watches</strong></p>
            <p class="text-muted mb-1">Brown | M</p>
          </div>
          <div class="quantity-control">
            <button class="decrease-btn">-</button>
            <span class="quantity">1</span>
            <button class="increase-btn">+</button>
          </div>
          <div class="product-price" data-price="2500.00">$2,500.00</div>
          <button class="remove-btn">Remove</button>
        </div>
      </div>
    </div>

    <!-- Order Summary Section -->
    <div class="col-lg-4">
      <div class="order-summary">
        <h5>Your Order</h5>
        <div id="order-details"></div>
        <hr>
        <div class="d-flex justify-content-between">
          <p>Subtotal</p>
          <p id="subtotal-price">$0.00</p>
        </div>
        <div class="d-flex justify-content-between">
          <p>Shipment cost</p>
          <p>$22.50</p>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
          <p class="total-price">Grand total</p>
          <p id="grand-total-price">$22.50</p>
        </div>
        <button class="btn btn-primary w-100 mt-3">Continue to payment</button>
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
  <script src="https://localhost/webSys/Cart.js"></script>

</body>
</html>