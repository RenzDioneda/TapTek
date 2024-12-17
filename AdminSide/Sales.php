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
            <a href="Orders.php" class="nav-link">Orders</a>
        </li>
        <li class="nav-item mb-2">
            <a href="Users.php" class="nav-link">Users</a>
        </li>
        <li class="nav-item mb-2">
            <a href="Sales.php" class="nav-link active">Sales</a>
        </li>
    </ul>

    <div class="mt-auto">
        <a href="../index.php" class="btn btn-danger w-100 mb-2">Go to Main Store</a>
    </div>
</aside>


    <!--Main Body-->

    <div class="container mt-5">

<!-- Add Order Header -->
<div class="row mb-4">
  <div class="col">
    <h2>Order Today</h2>
    <div class="row">
      <div class="col-md-3"><strong>Total Orders:</strong> 120</div>
      <div class="col-md-3"><strong>Ordered Items:</strong> 250</div>
      <div class="col-md-3"><strong>Returns:</strong> 5</div>
      <div class="col-md-3"><strong>Completed:</strong> 115</div>
    </div>
  </div>
</div>

<!-- Tab Navigation -->
<ul class="nav nav-tabs" id="salesTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="need-to-ship-tab" data-bs-toggle="tab" href="#need-to-ship" role="tab" aria-controls="need-to-ship" aria-selected="false">Need to Ship</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="sent-tab" data-bs-toggle="tab" href="#sent" role="tab" aria-controls="sent" aria-selected="false">Sent</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="completed-tab" data-bs-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="cancellation-tab" data-bs-toggle="tab" href="#cancellation" role="tab" aria-controls="cancellation" aria-selected="false">Cancellation</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="returns-tab" data-bs-toggle="tab" href="#returns" role="tab" aria-controls="returns" aria-selected="false">Returns</a>
  </li>
</ul>

    <!-- Tab Content -->
    <div class="tab-content" id="salesTabContent">
      <!-- All Orders Tab -->
      <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
        <table class="table">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Customer</th>
              <th>Total</th>
              <th>Payment Status</th>
              <th>Items</th>
              <th>Delivery Method</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Product 1</td>
              <td>John Doe</td>
              <td>₱1000</td>
              <td>Paid</td>
              <td>2</td>
              <td>Courier</td>
              <td><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editOrderModal">Edit</button></td>
            </tr>
            <tr>
              <td>Product 2</td>
              <td>Jane Smith</td>
              <td>₱1200</td>
              <td>Unpaid</td>
              <td>3</td>
              <td>Pickup</td>
              <td><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editOrderModal">Edit</button></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Need to Ship Tab -->
      <div class="tab-pane fade" id="need-to-ship" role="tabpanel" aria-labelledby="need-to-ship-tab">
        <table class="table">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Customer</th>
              <th>Total</th>
              <th>Payment Status</th>
              <th>Items</th>
              <th>Delivery Method</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Product 3</td>
              <td>Samuel Green</td>
              <td>₱1500</td>
              <td>Paid</td>
              <td>1</td>
              <td>Courier</td>
              <td><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editOrderModal">Edit</button></td>
            </tr>
            <tr>
              <td>Product 4</td>
              <td>Michael Brown</td>
              <td>₱800</td>
              <td>Unpaid</td>
              <td>2</td>
              <td>Pickup</td>
              <td><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editOrderModal">Edit</button></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Sent Tab -->
      <div class="tab-pane fade" id="sent" role="tabpanel" aria-labelledby="sent-tab">
        <table class="table">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Customer</th>
              <th>Total</th>
              <th>Payment Status</th>
              <th>Items</th>
              <th>Delivery Method</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Product 5</td>
              <td>Emily Clark</td>
              <td>₱2000</td>
              <td>Paid</td>
              <td>4</td>
              <td>Courier</td>
              <td><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editOrderModal">Edit</button></td>
            </tr>
            <tr>
              <td>Product 6</td>
              <td>Chris Adams</td>
              <td>₱1800</td>
              <td>Unpaid</td>
              <td>5</td>
              <td>Pickup</td>
              <td><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editOrderModal">Edit</button></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Completed Tab -->
      <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
        <table class="table">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Customer</th>
              <th>Total</th>
              <th>Payment Status</th>
              <th>Items</th>
              <th>Delivery Method</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Product 7</td>
              <td>Alice Johnson</td>
              <td>₱2200</td>
              <td>Paid</td>
              <td>6</td>
              <td>Courier</td>
              <td><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editOrderModal">Edit</button></td>
            </tr>
            <tr>
              <td>Product 8</td>
              <td>David Lee</td>
              <td>₱1300</td>
              <td>Paid</td>
              <td>3</td>
              <td>Pickup</td>
              <td><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editOrderModal">Edit</button></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Cancellation Tab -->
      <div class="tab-pane fade" id="cancellation" role="tabpanel" aria-labelledby="cancellation-tab">
        <table class="table">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Customer</th>
              <th>Total</th>
              <th>Payment Status</th>
              <th>Items</th>
              <th>Delivery Method</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Product 9</td>
              <td>George Harris</td>
              <td>₱900</td>
              <td>Unpaid</td>
              <td>1</td>
              <td>Courier</td>
              <td><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editOrderModal">Edit</button></td>
            </tr>
            <tr>
              <td>Product 10</td>
              <td>Lisa Walker</td>
              <td>₱1300</td>
              <td>Paid</td>
              <td>2</td>
              <td>Pickup</td>
              <td><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editOrderModal">Edit</button></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Returns Tab -->
      <div class="tab-pane fade" id="returns" role="tabpanel" aria-labelledby="returns-tab">
        <table class="table">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Customer</th>
              <th>Total</th>
              <th>Payment Status</th>
              <th>Items</th>
              <th>Delivery Method</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Product 11</td>
              <td>Thomas King</td>
              <td>₱700</td>
              <td>Paid</td>
              <td>1</td>
              <td>Courier</td>
              <td><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editOrderModal">Edit</button></td>
            </tr>
            <tr>
              <td>Product 12</td>
              <td>Susan Scott</td>
              <td>₱950</td>
              <td>Unpaid</td>
              <td>2</td>
              <td>Pickup</td>
              <td><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editOrderModal">Edit</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Pagination -->
    <div class="pagination">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </div>
  </div>

  <!-- Edit Order Modal -->
<div class="modal fade" id="editOrderModal" tabindex="-1" aria-labelledby="editOrderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editOrderModalLabel">Edit Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Select an action for this order:</p>
        <button type="button" class="btn btn-danger w-100" id="deleteOrderBtn">Delete Order</button>
        <button type="button" class="btn btn-warning w-100 mt-3" id="cancelOrderBtn">Cancel Order</button>
      </div>
    </div>
  </div>
</div>


  
       <!-- Bootstrap JS -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
