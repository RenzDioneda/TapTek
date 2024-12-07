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
  <link rel="stylesheet" href="RazerKitsune.css">
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
          <a class="nav-link text-white " href="Contact.php">Contact</a>
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
          <h1 class="product-title">MICRO with Artwork Case (Clear or Smoke)</h1>
          <div class="product-price">
            <span class="original-price text-muted text-decoration-line-through">$220.00</span>
            <span class="sale-price text-danger ms-2">$165.00</span>
            <span class="badge bg-warning text-dark ms-2">Sale</span>
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

          <p class="shipping-info text-muted">Shipping calculated at checkout.</p>
          <p class="installments-info text-muted">
            4 interest-free installments, or from <strong>$14.89/mo</strong> with Shop Pay.
          </p>
          <p class="product-description">
            The best out of the box PS5 leverless! NO extra steps to install or hacks. Ships within 2 business days.
          </p>
          <p class="note text-danger">
            Note: Some XBOX users may not be able to use 3rd party controllers without an additional adapter like the Brook Wingman XB3.
          </p>
          <p class="shipping-delay text-muted">
            Please give us a few extra days to ship these out during the sale.
          </p>

          <!-- Product Options -->
          <div class="product-options">
            <div class="color-option mb-3">
              <label for="color" class="form-label fw-bold">Color</label>
              <button class="btn btn-outline-dark" id="colorClear" onclick="selectColor(this)">Clear</button>
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
            This MICRO with Artwork Case is the ultimate accessory to protect and personalize your PS5 console. Available in Clear or Smoke colors, the case offers an elegant and sleek finish that complements your setup. It's crafted with precision to provide a perfect fit for your console, while allowing easy access to all ports. Installation is a breeze, requiring no additional tools or modifications. Protect your investment with this durable and stylish case, and enjoy peace of mind knowing your PS5 is safe from scratches, dust, and everyday wear and tear.
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
            <li><strong>System Requirement:</strong> PS5™ console or PC (Windows)</li>
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
        <div class="product-card">
          <img src="images/VictrixKO.webp" alt="Product 1" class="img-fluid">
          <h5 class="product-name">Product Name 1</h5>
          <p class="product-price">$129.99</p>
          <button class="btn btn-outline-warning w-100">View Product</button>
        </div>
      </div>

      <!-- Product 2 -->
      <div class="col-md-3">
        <div class="product-card">
          <img src="images/related-product2.jpg" alt="Product 2" class="img-fluid">
          <h5 class="product-name">Product Name 2</h5>
          <p class="product-price">$149.99</p>
          <button class="btn btn-outline-warning w-100">View Product</button>
        </div>
      </div>

      <!-- Product 3 -->
      <div class="col-md-3">
        <div class="product-card">
          <img src="images/related-product3.jpg" alt="Product 3" class="img-fluid">
          <h5 class="product-name">Product Name 3</h5>
          <p class="product-price">$199.99</p>
          <button class="btn btn-outline-warning w-100">View Product</button>
        </div>
      </div>

      <!-- Product 4 -->
      <div class="col-md-3">
        <div class="product-card">
          <img src="images/related-product4.jpg" alt="Product 4" class="img-fluid">
          <h5 class="product-name">Product Name 4</h5>
          <p class="product-price">$179.99</p>
          <button class="btn btn-outline-warning w-100">View Product</button>
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
</body>
</html>