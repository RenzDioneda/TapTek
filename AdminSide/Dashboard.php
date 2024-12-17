<?php
// Include database connection
require_once '../database.php';
$conn = Database::getInstance();

// Fetch total orders (count of orders)
$totalOrdersQuery = $conn->query("SELECT COUNT(*) AS total_orders FROM orders");
$totalOrdersResult = $totalOrdersQuery->fetch_assoc();
$totalOrders = $totalOrdersResult['total_orders'];

// Fetch total reviews (count of reviews)
$totalReviewsQuery = $conn->query("SELECT COUNT(*) AS total_reviews FROM reviews");
$totalReviewsResult = $totalReviewsQuery->fetch_assoc();
$totalReviews = $totalReviewsResult['total_reviews'];

// Fetch total users (count of users)
$totalUsersQuery = $conn->query("SELECT COUNT(*) AS total_users FROM users");
$totalUsersResult = $totalUsersQuery->fetch_assoc();
$totalUsers = $totalUsersResult['total_users'];

// Fetch recent orders (latest 5 orders)
$recentOrdersQuery = $conn->query("SELECT * FROM orders ORDER BY order_date DESC LIMIT 5");
$recentOrders = [];
while ($order = $recentOrdersQuery->fetch_assoc()) {
    $recentOrders[] = $order;
}

// Get the selected time period
$period = isset($_GET['period']) ? $_GET['period'] : 'daily';  // Default to daily

// Prepare the SQL query based on the selected period
if ($period == 'daily') {
    $query = "SELECT DATE(order_date) AS date, COUNT(*) AS orders_count FROM orders GROUP BY DATE(order_date) ORDER BY order_date DESC LIMIT 30";
} elseif ($period == 'monthly') {
    $query = "SELECT MONTH(order_date) AS month, COUNT(*) AS orders_count FROM orders GROUP BY MONTH(order_date) ORDER BY order_date DESC LIMIT 12";
} elseif ($period == 'yearly') {
    $query = "SELECT YEAR(order_date) AS year, COUNT(*) AS orders_count FROM orders GROUP BY YEAR(order_date) ORDER BY order_date DESC LIMIT 5";
} else {
    // Default to daily
    $query = "SELECT DATE(order_date) AS date, COUNT(*) AS orders_count FROM orders GROUP BY DATE(order_date) ORDER BY order_date DESC LIMIT 30";
}

// Fetch data from the database
$result = $conn->query($query);
$data = [];
$labels = [];

while ($row = $result->fetch_assoc()) {
    $labels[] = $period == 'daily' ? $row['date'] : ($period == 'monthly' ? "Month " . $row['month'] : $row['year']);
    $data[] = $row['orders_count'];
}

// Close database connection
$conn->close();
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
            <a href="Dashboard.php" class="nav-link active">Dashboard</a>
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
            <a href="Orders.php" class="nav-link">Orders</a>
        </li>
        <li class="nav-item mb-2">
            <a href="Users.php" class="nav-link">Users</a>
        </li>
        <li class="nav-item mb-2">
            <a href="Sales.php" class="nav-link">Sales</a>
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
                    <h5>Total Orders</h5>
                    <p class="fs-3"><?php echo $totalOrders; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white" style="background-color: #1E3E62;">
                <div class="card-body">
                    <h5>Reviews</h5>
                    <p class="fs-3"><?php echo $totalReviews; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white" style="background-color: #0B192C;">
                <div class="card-body">
                    <h5>Users Count</h5>
                    <p class="fs-3"><?php echo $totalUsers; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid p-4 bg-white">
    <!-- Order Revenue Chart -->
    <div class="row mb-4">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Order Revenue</h5>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <a href="?period=daily" class="btn btn-outline-secondary btn-sm">Daily</a>
                            <a href="?period=monthly" class="btn btn-outline-secondary btn-sm">Monthly</a>
                            <a href="?period=yearly" class="btn btn-outline-secondary btn-sm">Yearly</a>
                        </div>
                    </div>
                    <div>
                        <canvas id="orderRevenueChart" style="height: 100px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Recent Orders Table -->
<div class="row">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Recent Orders</h5>
                <table class="table table-hover">
                    <thead style="background-color: #FF6500; color: #fff;">
                        <tr>
                            <th>Order ID</th>
                            <th>User ID</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Shipping Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Loop through recent orders and display the data in the table
                        foreach ($recentOrders as $order) {
                            echo "<tr>
                                <td>{$order['order_id']}</td>
                                <td>{$order['user_id']}</td>
                                <td>{$order['order_date']}</td>
                                <td>₱{$order['total_amount']}</td>
                                <td>{$order['shipping_status']}</td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap JS -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Get the selected period from the query string (default to daily)
    const urlParams = new URLSearchParams(window.location.search);
    const period = urlParams.get('period') || 'daily';

    // Data structure for the chart (you should replace this with your data from the server)
    let orderData = {
        daily: [120, 150, 130, 170, 160, 180, 210],
        monthly: [3000, 3200, 3500, 3400, 3000, 3100, 3300],
        yearly: [35000, 36000, 38000, 34000, 32000]
    };

    // Labels for the chart (you can replace these based on your actual time period data)
    let labels = {
        daily: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        monthly: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        yearly: ['2020', '2021', '2022', '2023', '2024']
    };

    // Get the chart data based on the selected period
    let data = orderData[period];
    let chartLabels = labels[period];

    // Create the chart
    const ctx = document.getElementById('orderRevenueChart').getContext('2d');
    const orderRevenueChart = new Chart(ctx, {
        type: 'line',  // You can also use 'bar' or 'pie' depending on your requirement
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Order Revenue (₱)',
                data: data,
                borderColor: '#FF6500',
                backgroundColor: 'rgba(255, 101, 0, 0.2)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1000
                    }
                }
            }
        }
    });
</script>
</body>

</html>
