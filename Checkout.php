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
  <link rel="stylesheet" href="Cart.css">
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

  <!-- Main Body -->
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="mb-4 text-primary">Checkout</h3>

        <!-- Checkout Form -->
        <form action="checkout_process.php" method="POST">
          <!-- Personal Information -->
          <div class="mb-4">
            <h5 class="text-dark">Personal Information</h5>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="firstName" class="text-dark">First Name</label>
                  <input type="text" class="form-control" id="firstName" name="first_name" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="lastName" class="text-dark">Last Name</label>
                  <input type="text" class="form-control" id="lastName" name="last_name" required>
                </div>
              </div>
            </div>
          </div>

          <!-- Shipping Address -->
          <div class="mb-4">
            <h5 class="text-dark">Shipping Address</h5>
            <div class="form-group">
              <label for="address" class="text-dark">Address</label>
              <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
              <label for="city" class="text-dark">City</label>
              <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <div class="form-group">
              <label for="zipcode" class="text-dark">Zip Code</label>
              <input type="text" class="form-control" id="zipcode" name="zipcode" required>
            </div>
          </div>

        <!-- Payment Method --> 
        <div class="mb-4">
          <h5 class="text-dark">Payment Method</h5>
          <div class="form-group">
            <label for="creditCard" class="text-dark">Credit Card Number</label>
            <input type="text" class="form-control" id="creditCard" name="credit_card" required>
          </div>
          <div class="form-group">
            <label for="expDate" class="text-dark">Expiration Date</label>
            <input type="text" class="form-control" id="expDate" name="expiration_date" required>
          </div>
          <div class="form-group">
            <label for="cvv" class="text-dark">CVV</label>
            <input type="text" class="form-control" id="cvv" name="cvv" required>
          </div>
        </div>

        <!-- Terms and Conditions -->
        <div class="form-group mb-4">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="termsCheck" name="terms" required>
            <label class="form-check-label text-dark" for="termsCheck">I agree to the Terms and Conditions</label>
          </div>
        </div>

          <button type="submit" class="btn btn-primary w-100" style="background-color: #FF6500;">Complete Checkout</button>
        </form>
      </div>

      <?php
      require_once 'database.php';

      // Check if user is logged in
      if (!isset($_SESSION['user_id'])) {
        $isLoggedIn = false;
      } else {
        $isLoggedIn = true;
        $user_id = $_SESSION['user_id'];

        $conn = Database::getInstance();

        // Fetch cart items for the user
        $query = "
        SELECT c.cart_id, p.product_name, p.price, c.quantity
        FROM cart AS c
        JOIN products AS p ON c.product_id = p.product_id
        WHERE c.user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
      }
      ?>

      <div class="col-lg-4">
        <h3 class="mb-4 text-primary">Order Summary</h3>
        <!-- Order Summary -->
        <div class="card" style="border: 1px solid #1E3E62;">
          <div class="card-body">
            <ul class="list-unstyled">
              <?php
              $totalAmount = 0;
              if ($isLoggedIn && $result->num_rows > 0) :
                while ($row = $result->fetch_assoc()) :
                  $itemTotal = $row['price'] * $row['quantity'];
                  $totalAmount += $itemTotal;
              ?>
                  <li class="d-flex justify-content-between">
                    <span><?php echo htmlspecialchars($row['product_name']); ?></span>
                    <span>$<?php echo number_format($row['price'], 2); ?> x <?php echo (int)$row['quantity']; ?></span>
                  </li>
                <?php
                endwhile;
              else :
                ?>
                <li class="d-flex justify-content-between">
                  <span>Your cart is empty.</span>
                  <span>-</span>
                </li>
              <?php endif; ?>
            </ul>
            <hr>
            <div class="d-flex justify-content-between">
              <h5 class="text-dark">Total</h5>
              <h5 class="text-dark">$<?php echo number_format($totalAmount, 2); ?></h5>
            </div>
          </div>
        </div>
      </div>

      <?php
      // Close the database connection
      if ($isLoggedIn) {
        $conn->close();
      }
      ?>

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