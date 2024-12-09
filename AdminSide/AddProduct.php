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
    <aside class="sidebar p-3">
  <div class="logo">
    <a class="navbar-brand" href="../Home.php">
      <img src="../images/Logo.png" alt="Junk Food Logo" class="navbar-logo">
    </a>
  </div>
      <div class="admin-logo mb-3">
        Admin Logo
      </div>
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
                <a href="#" class="nav-link">Categories</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item mb-2">
          <a href="#" class="nav-link">Orders</a>
        </li>
        <li class="nav-item mb-2">
          <a href="#" class="nav-link">Users</a>
        </li>
        <li class="nav-item mb-2">
          <a href="#" class="nav-link">Notifications</a>
        </li>
        <li class="nav-item mb-2">
          <a href="#" class="nav-link">Web Settings</a>
        </li>
      </ul>
    </aside>    

    <!--Main Content-->
    <div class="container">
    <h2 class="mb-4">Add New Product</h2>
    <form>
      <div class="row mb-4">
        <!-- General Information -->
        <div class="col-md-6">
          <h5 class="section-title">General Information</h5>
          <div class="mb-3">
            <label for="productName" class="form-label">Name Product</label>
            <input type="text" class="form-control" id="productName" placeholder="Enter product name">
          </div>
          <div class="mb-3">
            <label for="productDescription" class="form-label">Description Product</label>
            <textarea class="form-control" id="productDescription" rows="4" placeholder="Enter product description"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Color</label>
            <div class="button-group">
              <button type="button" class="btn btn-outline-secondary btn-sm">Black</button>
              <button type="button" class="btn btn-outline-secondary btn-sm">White</button>
              <button type="button" class="btn btn-outline-secondary btn-sm">Violet</button>
              <button type="button" class="btn btn-outline-secondary btn-sm">Blue</button>
              <button type="button" class="btn btn-outline-secondary btn-sm">Pink</button>
              <button type="button" class="btn btn-outline-secondary btn-sm">Red</button>
            </div>
          </div>
          <div class="mb-3">
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
            <input type="file">
          </div>
        </div>
      </div>

      <!-- Pricing and Stock -->
      <div class="row mb-4">
        <div class="col-md-6">
          <h5 class="section-title">Pricing and Stock</h5>
          <div class="mb-3">
            <label for="basePrice" class="form-label">Base Pricing</label>
            <input type="number" class="form-control" id="basePrice" placeholder="₱">
          </div>
          <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" placeholder="Enter stock quantity">
          </div>
          <div class="mb-3">
            <div class="input-group">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <h5 class="section-title">Category</h5>
          <div class="mb-3">
            <label for="category" class="form-label">Product Category</label>
            <select class="form-select" id="category">
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
        <button type="button" class="btn btn-secondary">Save Draft</button>
        <button type="submit" class="btn btn-primary">Add Product</button>
      </div>
    </form>
  </div>

     <!-- Bootstrap JS -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
