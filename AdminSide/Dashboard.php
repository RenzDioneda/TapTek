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
</body>
<div class="d-flex">
  <!-- Sidebar -->
  <aside class="sidebar p-3 d-flex flex-column" style="height: 100vh;">
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
        <a href="Dashboard.php" class="nav-link active">Dashboard</a>
      </li>
      <li class="nav-item mb-2">
        <a 
          href="#productMenu" 
          class="nav-link d-flex align-items-center justify-content-between" 
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
      <a href="../Home.php" class="btn btn-danger w-100 mb-2">Go to Main Store</a>
    </div>
  </aside>  
 

    <!--Main Content-->
    <div class="container-fluid p-4 bg-white">
    <!-- Dashboard Header -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white" style="background-color: #FF6500;">
                <div class="card-body">
                    <h5>Total Income</h5>
                    <p class="fs-3">₱129,230</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white" style="background-color: #1E3E62;">
                <div class="card-body">
                    <h5>Total Sales</h5>
                    <p class="fs-3">2,456 products</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white" style="background-color: #0B192C;">
                <div class="card-body">
                    <h5>Active Users</h5>
                    <p class="fs-3">10</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sales Revenue Chart -->
    <div class="row mb-4">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Sales Revenue</h5>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <span class="badge rounded-pill text-bg-success">Recurring Revenue</span>
                            <span class="badge rounded-pill text-bg-secondary">One-time Revenue</span>
                        </div>
                        <div>
                            <button class="btn btn-outline-secondary btn-sm">Monthly</button>
                            <button class="btn btn-outline-secondary btn-sm">Quarterly</button>
                            <button class="btn btn-outline-secondary btn-sm">Yearly</button>
                        </div>
                    </div>
                    <div class="chart-placeholder" style="height: 300px; background-color: #f8f9fa;">
                        <!-- Add a chart library for the graph -->
                        <p class="text-muted text-center pt-5">Chart Placeholder</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction Table -->
    <div class="row">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Recent Transaction</h5>
                    <table class="table table-hover">
                        <thead style="background-color: #FF6500; color: #fff;">
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Razer Kitsune</td>
                                <td>PS5</td>
                                <td>12 Aug, 2024</td>
                                <td><span class="badge text-bg-success">Completed</span></td>
                                <td>₱5,234.33</td>
                            </tr>
                            <tr>
                                <td>Hitbox</td>
                                <td>PC (Windows)</td>
                                <td>12 Aug, 2024</td>
                                <td><span class="badge text-bg-warning">Pending</span></td>
                                <td>₱5,234.33</td>
                            </tr>
                            <tr>
                                <td>Victrix KO</td>
                                <td>PS5</td>
                                <td>12 Aug, 2024</td>
                                <td><span class="badge text-bg-info">Initiated</span></td>
                                <td>₱5,234.33</td>
                            </tr>
                            <tr>
                                <td>Overdrive</td>
                                <td>PS5</td>
                                <td>12 Aug, 2024</td>
                                <td><span class="badge text-bg-success">Completed</span></td>
                                <td>₱5,234.33</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


     <!-- Bootstrap JS -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>