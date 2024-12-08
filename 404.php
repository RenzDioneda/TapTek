<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Error - TapTek</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="mainlayout.css">
<style>
    /* General Styles */
body {
  background-color: black;
  color: white;
  font-family: Arial, sans-serif;
}

/* 404 Error Section */
.text-orange {
  color: orange;
}

.container h1 {
  font-size: 6rem;
}

.container p {
  font-size: 1.2rem;
}

.container .btn {
  background-color: white;
  color: black;
  border: none;
  padding: 10px 20px;
  font-size: 1rem;
  border-radius: 5px;
  text-transform: uppercase;
  font-weight: bold;
}

.container .btn:hover {
  background-color: #f2f2f2;
}

</style>
</head>
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
            <a class="nav-link text-white active" href="Home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="Shop.php">Shop</a>
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
          <a href="#" class="text-white me-3">
            <i class="fas fa-user fa-lg"></i>
          </a>
          <a href="#" class="text-white">
            <i class="fas fa-shopping-bag fa-lg"></i>
          </a>
        </div>
      </div>
    </div>
  </nav>
  
<body class="bg-black text-white">

  <!-- 404 Error Section -->
  <div class="container text-center py-5">
    <h1 class="display-1 fw-bold text-orange">404</h1>
    <p class="lead">Oops! The page you're looking for doesn't exist.</p>
    <a href="Home.php" class="btn btn-light btn-lg mt-3">Go Back Home</a>
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
        <a href="Forms.php" class="footer-link">Forms</a>
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