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
                        <a class="nav-link text-white " href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="Shop.php">Shop</a>
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
                                    <li><a class="dropdown-item text-danger" href="Logout.php">Logout</a></li>
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
    // Include database connection
    require_once 'database.php';

    // Connect to the database
    $conn = Database::getInstance();

    // Check if 'product_id' is set in the URL
    if (isset($_GET['product_id'])) {
        $product_id = (int)$_GET['product_id'];

        // Fetch the product details
        $query = "SELECT * FROM products WHERE product_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if product exists
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        } else {
            die("Product not found.");
        }
    } else {
        die("Invalid product ID.");
    }
    ?>

    <!-- Main Body -->
    <section class="product-page">
        <div class="container">
            <div class="row">
                <!-- Left Section: Product Images -->
                <div class="col-lg-6">
                    <div class="product-images">
                        <!-- Main Image -->
                        <div class="main-image mb-3">
                            <img id="mainImage" src="productImages/<?php echo htmlspecialchars($product['image_url']); ?>" alt="Main Product Image" class="img-fluid rounded">
                        </div>

                        <!-- Thumbnail Images -->
                        <div class="thumbnail-images">
                            <img src="productImages/<?php echo htmlspecialchars($product['image_url']); ?>" alt="Thumbnail 1" onclick="changeMainImage(this)">
                            <!-- Add more thumbnails if available -->
                        </div>
                    </div>
                </div>

                <!-- Right Section: Product Details -->
                <div class="col-lg-6">
                    <div class="product-details">
                        <h1 class="product-title"><?php echo htmlspecialchars($product['product_name']); ?></h1>
                        <div class="product-price">
                            <span class="sale-price text-danger ms-2">₱<?php echo number_format($product['price'], 2); ?></span>
                        </div>

                        <!-- Rating Section (Static Example) -->
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
                            <?php echo htmlspecialchars($product['description']); ?>
                        </p>

                        <!-- Product Options -->
                        <div class="product-options">
                            <div class="color-option mb-3">
                                <label for="color" class="form-label fw-bold">Color</label>
                                <button class="btn btn-outline-dark"><?php echo htmlspecialchars($product['color']); ?></button>
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
                        <button class="btn btn-warning btn-lg w-100"
                            id="addToCartBtn"
                            data-product-id="<?php echo (int)$product['product_id']; ?>"
                            onclick="addToCart()">
                            Add to cart
                        </button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Product Full Description Section -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-full-description">
                        <h2 class="fw-bold">Product Description</h2>
                        <p>
                            <?php echo htmlspecialchars($product['description']); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Specifications Section -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-specifications">
                        <h2 class="fw-bold">Product Specifications</h2>
                        <ul>
                            <li><strong>Stock:</strong> <?php echo (int)$product['stock']; ?></li>
                            <li><strong>Color:</strong> <?php echo htmlspecialchars($product['color']); ?></li>
                            <!-- Add other specifications if applicable -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    // Close the database connection
    $conn->close();
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
    <script src="http://localhost/TapTek/RZ.js"></script>
    <script src="http://localhost/TapTek/Rating.js"></script>
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
    <script>
        // Function to add the product to the cart
        function addToCart() {
            // Get product ID and quantity
            var productId = document.getElementById('addToCartBtn').getAttribute('data-product-id');
            var quantity = document.getElementById('quantityValue').innerText;

            // Prepare data for the AJAX request
            var data = {
                product_id: productId,
                quantity: quantity
            };

            // Perform AJAX request to send data to the server
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'add_to_cart.php', true); // Assuming the server-side script is named add_to_cart.php
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert('Product added to cart successfully!');
                    } else {
                        alert('Failed to add product to cart: ' + response.message);
                    }
                }
            };

            // Encode data as URL-encoded string
            var urlEncodedData = 'product_id=' + encodeURIComponent(data.product_id) +
                '&quantity=' + encodeURIComponent(data.quantity);

            xhr.send(urlEncodedData);
        }
        // Function to update quantity
        function updateQuantity(action) {
            var quantityValue = document.getElementById('quantityValue');
            var currentQuantity = parseInt(quantityValue.innerText);

            if (action === 'increase') {
                quantityValue.innerText = currentQuantity + 1;
            } else if (action === 'decrease' && currentQuantity > 1) {
                quantityValue.innerText = currentQuantity - 1;
            }
        }
    </script>
</body>

</html>