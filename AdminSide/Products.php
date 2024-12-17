<?php

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Database connection
    require_once '../database.php';
    $conn = Database::getInstance();

    // Delete query
    $sql = "DELETE FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);

    if ($stmt->execute()) {
        // Redirect to product list page after successful deletion
        header("Location: Products.php");
        exit();
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    

    $stmt->close();
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
</head>

<body>
<div class="d-flex">
 <!-- Sidebar -->
 <aside class="sidebar p-3 d-flex flex-column" style="position: sticky; top: 0; height: 100vh; z-index: 1000;">
    <div class="logo">
        <a class="navbar-brand" href="../Home.php">
            <img src="../images/Logo.png" alt="Junk Food Logo" class="navbar-logo">
        </a>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a href="Dashboard.php" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item mb-2">
            <a href="#productMenu" class="nav-link d-flex align-items-center justify-content-between active" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="productMenu">
                <span>Products</span>
                <i class="bi bi-chevron-down toggle-icon"></i>
            </a>
            <div class="collapse" id="productMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="Products.php" class="nav-link active">Product List</a>
                    </li>
                    <li class="nav-item">
                        <a href="AddProduct.php" class="nav-link">Add Product</a>
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
        <a href="../index.php" class="btn btn-danger w-100 mb-2">Go to Main Store</a>
    </div>
</aside>


  <!-- Main Content -->
  <main class="flex-grow-1 p-4 bg-light">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h3 text-primary">Products</h1>
      <div class="d-flex align-items-center">
        <a href="AddProduct.php">
          <button class="btn btn-primary-custom me-2">+ Add Product</button>
        </a>
      </div>
    </div>

<!-- Search Bar -->
<div class="mb-4 d-flex justify-content-end">
  <div class="input-group w-25">
    <input type="text" id="productSearch" class="form-control" placeholder="Search products..." oninput="searchProducts()">
    <button class="btn btn-outline-secondary" type="button">Search</button>
  </div>
</div>

<!-- Table -->
<div class="table-responsive">
  <table class="table">
    <thead class="table-header">
      <tr>
        <th>Product Image</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Color</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="productList">
      <?php
      // Include database connection
      require_once '../database.php';
      $conn = Database::getInstance();

      // Fetch all products from the database
      $result = $conn->query("SELECT * FROM products");

      // Check if there are any products
      if ($result->num_rows > 0) {
          while ($product = $result->fetch_assoc()) {
              // Get product data
              $productId = $product['product_id'];
              $productName = $product['product_name'];
              $price = $product['price'];
              $stock = $product['stock'];
              $color = $product['color'];
              $imageUrl = $product['image_url'];

              // Display product row with action buttons
              echo "
              <tr>
                <td>
                  <div class='d-flex align-items-center'>
                    <img src='https://raw.githubusercontent.com/RenzDioneda/TapTek/main/productImages/$imageUrl' alt='$productName' class='rounded me-2' style='width: 50px; height: 50px; object-fit: contain;'>
                  </div>
                </td>
                <td>$productName</td>
                <td>₱$price</td>
                <td>$stock</td>
                <td>$color</td>
                <td>
                  <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editProductModal' 
                  data-id='$productId' 
                  data-name='$productName' 
                  data-price='$price' 
                  data-stock='$stock' 
                  data-color='$color' 
                  data-image='$imageUrl'>
                    Edit Product
                  </button>
                </td>
              </tr>";
          }
      } else {
          echo "<tr><td colspan='6'>No products found</td></tr>";
      }

      // Close database connection
      $conn->close();
      ?>
    </tbody>
  </table>
</div>


    <!-- Pagination -->
    <nav>
      <ul class="pagination justify-content-between">
        <li class="page-item">
          <button class="btn pagination-btn">Previous</button>
        </li>
        <li class="page-item">
          <button class="btn pagination-btn">Next</button>
        </li>
      </ul>
    </nav>
  </main>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form method="POST" action="updateProduct.php">
            <input type="hidden" id="productId" name="productId">

            <!-- General Information -->
            <div class="row mb-4">
              <div class="col-md-6">
                <h5 class="section-title">General Information</h5>
                <div class="mb-3">
                  <label for="productName" class="form-label">Name Product</label>
                  <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product name">
                </div>
                <div class="mb-3">
                  <label for="productDescription" class="form-label">Description Product</label>
                  <textarea class="form-control" id="productDescription" name="productDescription" rows="4" placeholder="Enter product description"></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label">Color</label>
                  <div class="button-group">
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="colorBlack">Black</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="colorWhite">White</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="colorViolet">Violet</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="colorBlue">Blue</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="colorPink">Pink</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="colorRed">Red</button>
                  </div>
                </div>
              </div>

              <!-- Upload Image -->
              <div class="col-md-6">
                <h5 class="section-title">Upload Image</h5>
                <div class="image-upload mb-3">
                  <img id="productImagePreview" src="https://via.placeholder.com/120" alt="Preview" class="img-fluid">
                  <div class="add-image">+</div>
                  <input type="file" id="productImageInput" name="productImage" accept="image/*">
                </div>
              </div>
            </div>

            <!-- Pricing and Stock -->
            <div class="row mb-4">
              <div class="col-md-6">
                <h5 class="section-title">Pricing and Stock</h5>
                <div class="mb-3">
                  <label for="basePrice" class="form-label">Base Pricing</label>
                  <input type="number" class="form-control" id="basePrice" name="basePrice" placeholder="₱">
                </div>
                <div class="mb-3">
                  <label for="stock" class="form-label">Stock</label>
                  <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter stock quantity">
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
                <button type="button" class="btn btn-info mt-2">Add Category</button>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between">
              <button type="submit" class="btn btn-primary">Save Changes</button>
              <button type="button" class="btn btn-danger" id="deleteProductButton">Delete Product</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Populate the modal fields with product details when the Edit button is clicked
  const editProductButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
  editProductButtons.forEach(button => {
    button.addEventListener('click', () => {
      const productId = button.getAttribute('data-id');
      const productName = button.getAttribute('data-name');
      const productDescription = button.getAttribute('data-description');
      const productPrice = button.getAttribute('data-price');
      const productStock = button.getAttribute('data-stock');
      const productColor = button.getAttribute('data-color');
      const productImage = button.getAttribute('data-image');
      
      document.getElementById('productId').value = productId;
      document.getElementById('productName').value = productName;
      document.getElementById('productDescription').value = productDescription;
      document.getElementById('basePrice').value = productPrice;
      document.getElementById('stock').value = productStock;
      document.getElementById('productImagePreview').src = `../productImages/${productImage}`;
      // Set the color button based on the selected color
      document.getElementById(`color${productColor}`).classList.add('btn-primary');
    });
  });

  // Delete product functionality
  document.getElementById('deleteProductButton').addEventListener('click', () => {
    const productId = document.getElementById('productId').value;
    if (confirm('Are you sure you want to delete this product?')) {
      window.location.href = `Products.php?id=${productId}`;
    }
  });
</script>
<script>
  // Function to search products via AJAX
function searchProducts() {
    var searchQuery = document.getElementById('productSearch').value; // Get search input value

    // Create a new XMLHttpRequest
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'searchProducts.php?q=' + encodeURIComponent(searchQuery), true); // Send query parameter
    xhr.onload = function() {
        if (xhr.status === 200) {
            // On success, update the product list with the response
            document.getElementById('productList').innerHTML = xhr.responseText;
        } else {
            console.error('Search failed:', xhr.statusText);
        }
    };
    xhr.send(); // Send the request
}
</script>
</body>
</html>
