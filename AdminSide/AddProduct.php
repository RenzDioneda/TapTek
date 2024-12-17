<?php
// Initialize variables for error handling and form values
$error = null;
$success = null;
$productName = $description = $price = $color = $stock = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../database.php';
    $conn = Database::getInstance();

    // Retrieve and sanitize form inputs
    $productName = trim($_POST['productName'] ?? "");
    $description = trim($_POST['productDescription'] ?? "");
    $price = trim($_POST['price'] ?? "");
    $color = trim($_POST['color'] ?? "");
    $stock = trim($_POST['stock'] ?? "");
    $imageUrl = null;

    // Validate required fields
    if (empty($productName) || empty($description) || empty($price) || empty($color) || empty($stock)) {
        $error = "All fields are required!";
    }

    // Handle file upload if no other errors
    if (!$error && isset($_FILES['productImage']) && $_FILES['productImage']['error'] === UPLOAD_ERR_OK) {
        // Absolute path for upload directory
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/TapTek/productImages/"; 

        // Sanitize the image name to avoid issues with special characters
        $imageName = basename($_FILES['productImage']['name']);
        $uploadFile = $uploadDir . $imageName;

        // Ensure the upload directory exists and has proper permissions
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create directory if it doesn't exist
        }

        // Attempt to move the uploaded file
        if (move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadFile)) {
            $imageUrl = $uploadFile; // Set $imageUrl for database
        } else {
            $error = "Failed to upload the file.";
        }
    } elseif (!$error) {
        $error = "No file uploaded or an error occurred.";
    }

    // Proceed if no errors
    if (!$error) {
        $stmt = $conn->prepare("INSERT INTO products (product_name, description, price, color, stock, image_url) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdsss", $productName, $description, $price, $color, $stock, $imageUrl);

        if ($stmt->execute()) {
            $success = "Product added successfully!";
        } else {
            $error = "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="mainlayout.css">
  <link rel="stylesheet" href="products.css">
  <link rel="stylesheet" href="addproduct.css">

</head>
</body>
<div class="d-flex">
  <!-- Sidebar -->
  <aside class="sidebar p-3 d-flex flex-column" style="height: 100vh;">
    <div class="logo">
      <a class="navbar-brand" href="../Home.php">
        <img src="../images/Logo.png" alt="Junk Food Logo" class="navbar-logo">
      </a>
    </div>
    <div class="admin-logo mb-3">Admin Logo</div>
    <ul class="nav flex-column">
      <li class="nav-item mb-2">
        <a href="Dashboard.php" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item mb-2">
        <a
          href="#productMenu"
          class="nav-link d-flex align-items-center justify-content-between active"
          data-bs-toggle="collapse"
          role="button"
          aria-expanded="false"
          aria-controls="productMenu">
          <span>Products</span>
          <i class="bi bi-chevron-down toggle-icon"></i>
        </a>
        <div class="collapse" id="productMenu">
          <ul class="nav flex-column ms-3">
            <li class="nav-item">
              <a href="Products.php" class="nav-link">Product List</a>
            </li>
            <li class="nav-item">
              <a href="AddProduct.php" class="nav-link active">Add Product</a>
            </li>
            <li class="nav-item">
              <a href="Categories.php" class="nav-link">Categories</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item mb-2">
        <a href="Orders.php" class="nav-link">Orders</a>
      </li>
      <li class="nav-item mb-2">
        <a href="Users.php" class="nav-link">Users</a>
      </li>
      <li class="nav-item mb-2">
        <a href="Sales.php" class="nav-link">Sales</a>
      </li>
      <li class="nav-item mb-2">
        <a href="Notifications.php" class="nav-link">Notifications</a>
      </li>
    </ul>


    <div class="mt-auto">
      <a href="../Home.php" class="btn btn-danger w-100 mb-2">Go to Main Store</a>
    </div>
  </aside>


  <!--Main Content-->
  <div class="container">
    <h2 class="mb-4">Add New Product</h2>
    <form method="POST" action="AddProduct.php" enctype="multipart/form-data">
    <div class="row mb-4">
        <!-- General Information -->
        <div class="col-md-6">
            <h5 class="section-title">General Information</h5>
            <div class="mb-3">
                <label for="productName" class="form-label">Name Product</label>
                <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product name" required>
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Description Product</label>
                <textarea class="form-control" id="productDescription" name="productDescription" rows="4" placeholder="Enter product description" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Color</label>
                <select class="form-select" name="color" required>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    <option value="Violet">Violet</option>
                    <option value="Blue">Blue</option>
                    <option value="Pink">Pink</option>
                    <option value="Red">Red</option>
                </select>
            </div>
        </div>

        <!-- Upload Image -->
        <div class="col-md-6">
            <h5 class="section-title">Upload Image</h5>
            <div class="image-upload mb-3">
                <img src="https://via.placeholder.com/120" alt="Preview">
                <img src="https://via.placeholder.com/120" alt="Preview">
                <img src="https://via.placeholder.com/120" alt="Preview">
                <div class="add-image">+</div>
                <input type="file" name="productImage" required>
            </div>
        </div>
    </div>

    <!-- Pricing and Stock -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h5 class="section-title">Pricing and Stock</h5>
            <div class="mb-3">
                <label for="basePrice" class="form-label">Base Pricing</label>
                <input type="number" class="form-control" id="basePrice" name="price" placeholder="₱" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter stock quantity" required>
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="section-title">Category</h5>
            <div class="mb-3">
                <label for="category" class="form-label">Product Category</label>
                <select class="form-select" id="category" name="category">
                    <option value="1">PC (Windows)</option>
                    <option value="2">PS5</option>
                    <option value="3">Switch</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-secondary">Save Draft</button>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </div>
</form>

  <!-- Bootstrap JS -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
        // Display success or error message as a JavaScript alert
        window.onload = function() {
            <?php if ($success): ?>
                alert("<?php echo $success; ?>");
            <?php elseif ($error): ?>
                alert("<?php echo $error; ?>");
            <?php endif; ?>
        };
    </script>
  </body>

</html>