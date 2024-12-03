<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Layout</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styles */
    .navbar {
      background-color: black;
    }
    .navbar-brand {
      font-size: 1.5rem;
      font-weight: bold;
      color: orange;
    }
    .navbar-nav .nav-link {
      color: white;
    }
    .hero {
      position: relative;
      background-image: url('your-image-url.jpg'); /* Replace with your image URL */
      background-size: cover;
      background-position: center;
      height: 100vh;
    }
    .hero-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
    }
    .hero-content {
      position: relative;
      z-index: 2;
      color: white;
      text-align: center;
      padding: 20px;
    }
    .hero-content h1 {
      font-size: 2.5rem;
      font-weight: bold;
    }
    .hero-content .btn {
      background-color: orange;
      border: none;
      color: white;
      padding: 10px 20px;
      font-size: 1rem;
      border-radius: 5px;
    }
    .hero-content .btn:hover {
      background-color: darkorange;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">Junk Food</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Forms</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <h1>Artwork MICRO $165 / MICRO XL $185</h1>
      <button class="btn">Shop MICRO</button>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>