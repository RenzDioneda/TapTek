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
  <link rel="stylesheet" href="Products.css">
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

  
<!-- Main Body -->
<section class="product-page">
  <div class="container">
    <div class="row">
      <!-- Left Section: Product Images -->
      <div class="col-lg-6">
        <div class="product-images">
          <!-- Main Image -->
          <div class="main-image mb-3">
            <img id="mainImage" src="images/Razer Kitsune.jpg" alt="Main Product Image" class="img-fluid rounded">
          </div>

          <!-- Thumbnail Images -->
          <div class="thumbnail-images">
            <img src="images/Razer Kitsune.jpg" alt="Thumbnail 1" onclick="changeMainImage(this)">
            <img src="images/Kitsune2.webp" alt="Thumbnail 2" onclick="changeMainImage(this)">
            <img src="images/Kitsune4.webp" alt="Thumbnail 3" onclick="changeMainImage(this)">
            <img src="images/Kitsune5.webp" alt="Thumbnail 4" onclick="changeMainImage(this)">
          </div>
        </div>
      </div>

      <!-- Right Section: Product Details -->
      <div class="col-lg-6">
        <div class="product-details">
          <h1 class="product-title">Razer Kitsune (PS5)</h1>
          <div class="product-price">
            <span class="sale-price text-danger ms-2">₱17,000.00</span>
          </div>

          <!-- Rating Section -->
          <div class="product-rating my-3">
            <span class="rating-stars">
              <i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
              <i class="fas fa-star-half-alt text-warning"></i>
            </span>
            <span class="rating-info text-muted ms-2">4.7 (250 ratings) | 1,200 sold</span>
          </div>

          <p class="product-description">
          SPECIFICATION CONNECTIVITY USB Type C to USB Type A cable Cable lock and lock switch SYSTEM REQUIREMENT PS5™  RAZER CHROMA LIGHTING Yes MECHANICAL ACTION BUTTONS Precise Quad Movement Button Layout Razer™
          </p>

          <!-- Product Options -->
          <div class="product-options">
            <div class="color-option mb-3">
              <label for="color" class="form-label fw-bold">Color</label>
              <button class="btn btn-outline-dark" id="colorClear" onclick="selectColor(this)">Black</button>
            </div>
            <div class="quantity-option mb-3">
              <label for="quantity" class="form-label fw-bold">Quantity</label>
              <div class="quantity-control d-flex align-items-center">
                <button class="btn btn-outline-secondary" id="decreaseQty" onclick="updateQuantity('decrease')">−</button>
                <span class="mx-3" id="quantityValue">1</span>
                <button class="btn btn-outline-secondary" id="increaseQty" onclick="updateQuantity('increase')">+</button>
              </div>
            </div>
          </div>

          <!-- Add to Cart Button -->
          <button class="btn btn-warning btn-lg w-100">Add to cart</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Product Full Description Section (Below the Product Details) -->
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-12">
        <div class="product-full-description">
          <h2 class="fw-bold">Product Description</h2>
          <p>
          Embrace a new fighting game meta with the Razer Kitsune—an all-button optical arcade controller that surpasses traditional fight sticks. With a precise quad movement button layout and lightning-fast optical switches, eliminate input errors from your game with the perfect competitive fighting companion for PS5™.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Product Specifications Section (Below Description) -->
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-12">
        <div class="product-specifications">
          <h2 class="fw-bold">Product Specifications</h2>
          <ul>
            <li><strong>Connectivity:</strong> USB Type C to USB Type A cable, Cable lock and lock switch</li>
            <li><strong>System Requirement:</strong> PS5™ console</li>
            <li><strong>Razer Chroma Lighting:</strong> Yes</li>
            <li><strong>Mechanical Action Buttons:</strong> Precise Quad Movement Button Layout, Razer™ Low-Profile Linear Optical Switches</li>
            <li><strong>Multi-Function Buttons:</strong> None</li>
            <li><strong>Quick Control Panel:</strong> None</li>
            <li><strong>Interchangeable D-Pad:</strong> None</li>
            <li><strong>Interchangeable Thumbsticks:</strong> None</li>
            <li><strong>Trigger Stops:</strong> None</li>
            <li><strong>Microphone Input:</strong> None</li>
            <li><strong>Audio Output:</strong> None</li>
            <li><strong>Battery Life:</strong> None</li>
            <li><strong>Configuration App:</strong> None</li>
            <li><strong>Artwork Customization:</strong> Removable aluminum top plate</li>
            <li><strong>Carry Case:</strong> None</li>
            <li><strong>Dimensions (Approximate):</strong> Length: 296 mm / 11.66” | Width: 210 mm / 8.27” | Height: 19.2 mm / 0.75”</li>
            <li><strong>Approximate Weight:</strong> 800 g</li>
            <li><strong>Box Contents:</strong> Razer Kitsune, 3.1 m / 10.1 ft wired USB Type C to USB Type A cable, Important Product Information Guide</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- You May Also Like Section -->
<div class="container mt-5">
  <h2 class="fw-bold">You May Also Like</h2>
  <div class="row">
    <!-- Product 1 -->
    <div class="col-md-3">
      <div class="product-card product-card-1">
        <img src="images/VictrixKO.webp" alt="Vortex Strike" class="img-fluid product-image-1">
        <h5 class="product-name-1">Vortex Strike</h5>
        <p class="product-price-1">$129.99</p>
        <button class="btn btn-outline-warning w-100 product-btn-1">View Product</button>
      </div>
    </div>

    <!-- Product 2 -->
    <div class="col-md-3">
      <div class="product-card product-card-2">
        <img src="images/Overdrivenb.png" alt="Nebula Titan" class="img-fluid product-image-2">
        <h5 class="product-name-2">Nebula Titan</h5>
        <p class="product-price-2">$149.99</p>
        <button class="btn btn-outline-warning w-100 product-btn-2">View Product</button>
      </div>
    </div>

    <!-- Product 3 -->
    <div class="col-md-3">
      <div class="product-card product-card-3">
        <img src="images/Hitboxnb.png" alt="Phoenix Core" class="img-fluid product-image-3">
        <h5 class="product-name-3">Phoenix Core</h5>
        <p class="product-price-3">$199.99</p>
        <button class="btn btn-outline-warning w-100 product-btn-3">View Product</button>
      </div>
    </div>

    <!-- Product 4 -->
    <div class="col-md-3">
      <div class="product-card product-card-4">
        <img src="images/Cosmoxnb.png" alt="CosmoX Pro" class="img-fluid product-image-4">
        <h5 class="product-name-4">CosmoX Pro</h5>
        <p class="product-price-4">$179.99</p>
        <button class="btn btn-outline-warning w-100 product-btn-4">View Product</button>
      </div>
    </div>
  </div>
</div>
  </div>
  <!-- Comment Section -->
<div class="container mt-5">
  <h2 class="fw-bold">Customer Reviews</h2>

  <!-- Rating and Comment Form -->
  <div class="rating-comment-form">
    <div class="d-flex align-items-center mb-3">
      <!-- Star Rating -->
      <span class="star-rating">
        <i class="fas fa-star" onclick="rateProduct(1)"></i>
        <i class="fas fa-star" onclick="rateProduct(2)"></i>
        <i class="fas fa-star" onclick="rateProduct(3)"></i>
        <i class="fas fa-star" onclick="rateProduct(4)"></i>
        <i class="fas fa-star" onclick="rateProduct(5)"></i>
      </span>
      <span id="selected-rating" class="ms-3 text-muted">Rating: 0</span>
    </div>

    <!-- Comment Input -->
    <textarea class="form-control mb-3" id="userComment" rows="4" placeholder="Write your comment here..."></textarea>

    <!-- Submit Button -->
    <button class="btn btn-warning w-100" onclick="submitComment()">Submit Review</button>
  </div>

  <!-- Display Comments Section -->
  <div class="comments mt-5">
    <h3 class="fw-bold">Recent Comments</h3>
    <div id="commentList">
      <!-- Sample comment -->
      <div class="comment">
        <p><strong>John Doe</strong> - <span class="text-warning">★★★★☆</span></p>
        <p>This is a great product! The build quality is amazing, and it feels great to use on the PS5.</p>
      </div>
      <div class="comment">
        <p><strong>Jane Smith</strong> - <span class="text-warning">★★★☆☆</span></p>
        <p>It's good, but I expected better lighting customization. Still, the overall feel is solid.</p>
      </div>
    </div>
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
  <script src="https://localhost/webSys/RZ.js"></script>
  <script src="https://localhost/webSys/Rating.js"></script>
</body>
</html>