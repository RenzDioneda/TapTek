<?php
// Include database connection
require_once '../database.php';
$conn = Database::getInstance();

// Function to fetch orders by shipping or payment status
function fetchOrdersByStatus($conn, $status) {
  $sql = "";
  if ($status == 'all') {
    $sql = "SELECT * FROM orders";
  } else {
    $sql = "SELECT * FROM orders WHERE shipping_status = ?";  
  }
  $stmt = $conn->prepare($sql);
  if ($status != 'all') {
    $stmt->bind_param("s", $status);
  }
  $stmt->execute();
  return $stmt->get_result();
}

// Fetch all possible statuses (distinct shipping statuses)
$statusQuery = "SELECT DISTINCT shipping_status FROM orders";
$statusResult = $conn->query($statusQuery);
$statuses = [];
while ($row = $statusResult->fetch_assoc()) {
  $statuses[] = $row['shipping_status'];
}

// Fetch orders for all statuses (assuming 'pending', 'shipped', 'canceled' are common statuses)
$allOrders = fetchOrdersByStatus($conn, 'all');
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
  <link rel="stylesheet" href="order.css">
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
            <a href="#productMenu" class="nav-link d-flex align-items-center justify-content-between" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="productMenu">
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
            <a href="Orders.php" class="nav-link active">Orders</a>
        </li>
        <li class="nav-item mb-2">
            <a href="Users.php" class="nav-link">Users</a>
        </li>
        <li class="nav-item mb-2">
            <a href="Sales.php" class="nav-link">Sales</a>
        </li>
    </ul>

    <div class="mt-auto">
        <a href="../index.php" class="btn btn-danger w-100 mb-2">Go to Main Store</a>
    </div>
</aside>

  <div class="container my-5">
    <h2 class="mb-4">Order Management</h2>

    <!-- Search Bar -->
    <div class="mb-4 d-flex justify-content-end">         
      <div class="input-group w-25"> 
        <input type="text" class="form-control" placeholder="Search products...">
        <button class="btn btn-outline-secondary" type="button">Search</button>
      </div>
    </div>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-4" id="orderTabs" role="tablist">
      <li class="nav-item">
        <button class="nav-link active" id="all-orders-tab" data-bs-toggle="tab" data-bs-target="#all-orders" type="button" role="tab" aria-controls="all-orders" aria-selected="true">All Orders</button>
      </li>
      
      <?php foreach ($statuses as $status): ?>
        <li class="nav-item">
          <button class="nav-link" id="<?= $status ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $status ?>" type="button" role="tab" aria-controls="<?= $status ?>" aria-selected="false"><?= ucfirst($status) ?></button>
        </li>
      <?php endforeach; ?>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="orderTabsContent">
      <!-- All Orders Tab -->
      <div class="tab-pane fade show active" id="all-orders" role="tabpanel" aria-labelledby="all-orders-tab">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="table-dark">
              <tr>
                <th>Order ID</th>
                <th>Created At</th>
                <th>User ID</th>
                <th>Total</th>
                <th>Order Status</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($order = $allOrders->fetch_assoc()): ?>
              <tr>
                <td><?php echo $order['order_id']; ?></td>
                <td><?php echo $order['order_date']; ?></td>
                <td><?php echo $order['user_id']; ?></td>
                <td><?php echo "₱" . $order['total_amount']; ?></td>
                <td><?php echo ucfirst($order['shipping_status']); ?></td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Dynamic Order Status Tabs -->
      <?php foreach ($statuses as $status): ?>
        <div class="tab-pane fade" id="<?= $status ?>" role="tabpanel" aria-labelledby="<?= $status ?>-tab">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="table-dark">
                <tr>
                  <th>Order ID</th>
                  <th>Created At</th>
                  <th>User ID</th>
                  <th>Total</th>
                  <th>Order Status</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $statusOrders = fetchOrdersByStatus($conn, $status);
                while ($order = $statusOrders->fetch_assoc()): ?>
                  <tr>
                    <td><?php echo $order['order_id']; ?></td>
                    <td><?php echo $order['order_date']; ?></td>
                    <td><?php echo $order['user_id']; ?></td>
                    <td><?php echo "₱" . $order['total_amount']; ?></td>
                    <td><?php echo ucfirst($order['shipping_status']); ?></td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
</body>
</html>
