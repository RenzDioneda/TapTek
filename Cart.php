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

  <?php
  require_once 'database.php';

  // Connect to the database
  $conn = Database::getInstance();

  // Check if user is logged in
  if (!isset($_SESSION['user_id'])) {
    $isLoggedIn = false;
  } else {
    $isLoggedIn = true;
    $user_id = $_SESSION['user_id'];

    // Fetch cart items for the user
    $query = "
        SELECT c.cart_id, p.product_name, p.price, p.image_url, p.color, c.quantity 
        FROM cart AS c
        JOIN products AS p ON c.product_id = p.product_id
        WHERE c.user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
  }
  ?>

  <!-- Cart Section -->
  <section class="cart-container">
    <div class="container">
      <h2 class="text-center mb-4">Your Cart</h2>
      <div class="row">
        <!-- Left Section: Cart Items -->
        <div class="col-lg-8">
          <?php
          $totalAmount = 0;
          if (!$isLoggedIn): ?>
            <div class="text-center text-danger">
              <p>Please log in to view your cart.</p>
            </div>
            <?php
          elseif ($result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
              $itemTotal = $row['price'] * $row['quantity'];
              $totalAmount += $itemTotal;
            ?>
              <div class="cart-item d-flex align-items-center justify-content-between mb-3 p-3 border rounded">
                <div class="d-flex align-items-center">
                  <input type="checkbox" class="form-check-input me-3">
                  <img src="productImages/<?php echo htmlspecialchars($row['image_url']); ?>" alt="Product Image" class="rounded me-3" width="80">
                  <div>
                    <p class="product-name fw-bold mb-1"><?php echo htmlspecialchars($row['product_name']); ?></p>
                    <p class="product-info text-muted mb-1"><?php echo htmlspecialchars($row['color']); ?></p>
                    <p class="product-price fw-bold">₱<?php echo number_format($row['price'], 2); ?></p>
                  </div>
                </div>
                <div class="quantity-control d-flex align-items-center">
                  <button class="btn btn-outline-secondary btn-sm" onclick="updateCartQuantity(<?php echo $row['cart_id']; ?>, 'decrease')">−</button>
                  <span class="mx-2"><?php echo (int)$row['quantity']; ?></span>
                  <button class="btn btn-outline-secondary btn-sm" onclick="updateCartQuantity(<?php echo $row['cart_id']; ?>, 'increase')">+</button>
                </div>
                <button class="btn btn-link text-danger text-decoration-none" onclick="removeFromCart(<?php echo $row['cart_id']; ?>)">×</button>
              </div>
            <?php
            endwhile;
          else: ?>
            <div class="text-center">
              <p>Your cart is empty.</p>
            </div>
          <?php endif; ?>
        </div>

        <!-- Right Section: Summary -->
        <div class="col-lg-4">
          <div class="summary-section p-4 border rounded">
            <h4 class="fw-bold mb-3">CART SUMMARY</h4>
            <p class="d-flex justify-content-between">
              <span>Subtotal</span>
              <span>₱<?php echo number_format($totalAmount, 2); ?></span>
            </p>
            <p class="d-flex justify-content-between">
              <span>Delivery Charges</span>
              <span>Free</span>
            </p>
            <hr>
            <p class="d-flex justify-content-between fw-bold">
              <span>Total Amount</span>
              <span>₱<?php echo number_format($totalAmount, 2); ?></span>
            </p>
            <?php if ($isLoggedIn && $result->num_rows > 0): ?>
              <form action="checkout.php" method="POST">
                <button type="submit" class="btn btn-primary w-100 mt-3">Checkout</button>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  // Close the database connection
  if ($isLoggedIn) {
    $conn->close();
  }
  ?>

  <script>
    function updateCartQuantity(cartId, action) {
      // Add AJAX request to update cart quantity
      console.log(`Update cart item ${cartId} to ${action}`);
    }

    function removeFromCart(cartId) {
      // Add AJAX request to remove cart item
      console.log(`Remove cart item ${cartId}`);
    }
  </script>

  <!--You Might Like Section Database Based-->
  <!-- You Might Like Section -->
  <div class="you-might-like-section mt-5 p-4 border rounded">
    <h3 class="text-center mb-4">You Might Like</h3>
    <div class="row">
      <!-- Item 1 -->
      <div class="col-md-3 mb-3">
        <div class="card">
          <img src="images/Skullboxnb.png" class="card-img-top" alt="Product Image">
          <div class="card-body">
            <p class="card-title fw-bold">Skullbox</p>
            <p class="card-text">₱2,500.00</p>
            <button class="btn btn-primary btn-sm">Add to Cart</button>
          </div>
        </div>
      </div>

      <!-- Item 2 -->
      <div class="col-md-3 mb-3">
        <div class="card">
          <img src="images/VictrixKO.webp" class="card-img-top" alt="Product Image">
          <div class="card-body">
            <p class="card-title fw-bold">Victrix KO</p>
            <p class="card-text">₱12,000.00</p>
            <button class="btn btn-primary btn-sm">Add to Cart</button>
          </div>
        </div>
      </div>

      <!-- Item 3 -->
      <div class="col-md-3 mb-3">
        <div class="card">
          <img src="images/VictrixLL.webp" class="card-img-top" alt="Product Image">
          <div class="card-body">
            <p class="card-title fw-bold">Victrix LL</p>
            <p class="card-text">₱12,000.00</p>
            <button class="btn btn-primary btn-sm">Add to Cart</button>
          </div>
        </div>
      </div>

      <!-- Item 4 -->
      <div class="col-md-3 mb-3">
        <div class="card">
          <img src="images/Hitboxnb.png" class="card-img-top" alt="Product Image">
          <div class="card-body">
            <p class="card-title fw-bold">Hitbox</p>
            <p class="card-text">₱8,000.00</p>
            <button class="btn btn-primary btn-sm">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </section>


  <!-- Checkout Modal -->
  <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="background-color: #0B192C;">
        <div class="modal-header" style="background-color: #0B192C;">
          <h5 class="modal-title" id="checkoutModalLabel" style="color: #fff;">Checkout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="background-color: #0B192C;">
          <div class="row">
            <!-- Left Section: Form -->
            <div class="col-lg-6 border-end">
              <form>
                <div class="mb-3">
                  <label for="fullName" class="form-label" style="color: #fff;">Full Name</label>
                  <input type="text" class="form-control" id="fullName" placeholder="Full Name">
                </div>
                <div class="mb-3">
                  <label for="phoneNumber" class="form-label" style="color: #fff;">Phone Number</label>
                  <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number">
                </div>
                <div class="mb-3">
                  <label for="region" class="form-label" style="color: #fff;">Region, Province, City, Barangay</label>
                  <input type="text" class="form-control" id="region" placeholder="Region, Province, City, Barangay">
                </div>
                <div class="mb-3">
                  <label for="postalCode" class="form-label" style="color: #fff;">Postal Code</label>
                  <input type="text" class="form-control" id="postalCode" placeholder="Postal code">
                </div>
                <div class="mb-3">
                  <label for="street" class="form-label" style="color: #fff;">Street Name, Building No., House No.</label>
                  <input type="text" class="form-control" id="postalCode" placeholder="Street Name, Building No., House No.">
                </div>
                <div class="mb-3">
                  <label class="form-label" style="color: #fff;">Mode of Payment</label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="paymentCOD">
                    <label class="form-check-label" for="paymentCOD" style="color: #fff;">Cash on Delivery</label>
                  </div>

                </div>
              </form>
            </div>

            <!-- Right Section: Order Summary -->
            <div class="col-lg-6">
              <h6 class="fw-bold" style="color: #fff;">Order Summary</h6>
              <ul class="list-group mb-3" style="background-color: #0B192C;">
                <li class="list-group-item" style="background-color: #0B192C;">
                  <div class="d-flex align-items-center">
                    <img src="images/Razer_Kitsunenb.png" alt="Product Image" class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">
                    <div>
                      <p class="mb-1 fw-bold" style="color: #fff;">Razer Kitsune (PS5)</p>
                      <p class="mb-1" style="color: #fff;">Color: Black</p>
                      <p class="mb-1" style="color: #fff;">Quantity: 1</p>
                    </div>
                  </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #0B192C; color: #fff;">
                  Price of Products:
                  <span>₱17,000.00</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #0B192C; color: #fff;">
                  Shipping Fee:
                  <span>₱50.00</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #0B192C; color: #fff;">
                  Delivery Days:
                  <span>3-5 Days</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center fw-bold" style="background-color: #0B192C; color: #fff;">
                  Total
                  <span>₱17,050.00</span>
                </li>
              </ul>
              <button class="btn btn-primary w-100">Confirm Checkout</button>
            </div>
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