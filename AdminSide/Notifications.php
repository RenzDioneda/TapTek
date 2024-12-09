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
  <link rel="stylesheet" href="notif.css">

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
        <a href="Dashboard.php" class="nav-link">Dashboard</a>
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
        <a href="Notifications.php" class="nav-link active">Notifications</a>
      </li>
    </ul>

    <div class="mt-auto">
      <a href="../Home.php" class="btn btn-danger w-100 mb-2">Go to Main Store</a>
    </div>
  </aside> 
  

    <!--Main Body--> 

  <div class="container">
    <h2>Notifications</h2>

      <!-- Search Bar -->
      <div class="mb-4 d-flex justify-content-end"> <!-- Added flex and justify-content-end -->
        <div class="input-group w-25"> 
          <input type="text" class="form-control" placeholder="Search products...">
          <button class="btn btn-outline-secondary" type="button">Search</button>
        </div>
      </div>

    <!-- Notifications Table -->
    <table class="table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="notificationTable">
        <tr>
          <td>New Order Placed</td>
          <td>An order has been placed on your store.</td>
          <td>2024-12-10</td>
          <td><span class="notification-status">New</span></td>
          <td>
            <button class="btn btn-info btn-sm">Mark as Read</button>
            <button class="btn btn-danger btn-sm">Delete</button>
          </td>
        </tr>
        <tr>
          <td>Order Shipped</td>
          <td>Your order has been shipped.</td>
          <td>2024-12-09</td>
          <td><span class="notification-status read">Read</span></td>
          <td>
            <button class="btn btn-info btn-sm">Mark as Read</button>
            <button class="btn btn-danger btn-sm">Delete</button>
          </td>
        </tr>
        <tr>
          <td>Product Stock Low</td>
          <td>One of your products is running low on stock.</td>
          <td>2024-12-08</td>
          <td><span class="notification-status">New</span></td>
          <td>
            <button class="btn btn-info btn-sm">Mark as Read</button>
            <button class="btn btn-danger btn-sm">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>

    <!-- Modal for Actions -->
    <div class="modal fade" id="deleteNotificationModal" tabindex="-1" aria-labelledby="deleteNotificationModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteNotificationModalLabel">Delete Notification</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete this notification?</p>
            <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Yes, Delete</button>
          </div>
        </div>
      </div>
    </div>
    
       <!-- Bootstrap JS -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>