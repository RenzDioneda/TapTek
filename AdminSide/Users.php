<?php
// Include database connection
require_once '../database.php';
$conn = Database::getInstance();

// Function to fetch users from the database
function fetchUsers($conn) {
    $sql = "SELECT * FROM users";
    return $conn->query($sql);
}

// Fetch users
$users = fetchUsers($conn);
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
            <a href="Orders.php" class="nav-link">Orders</a>
        </li>
        <li class="nav-item mb-2">
            <a href="Users.php" class="nav-link active">Users</a>
        </li>
        <li class="nav-item mb-2">
            <a href="Sales.php" class="nav-link">Sales</a>
        </li>
    </ul>

    <div class="mt-auto">
        <a href="../index.php" class="btn btn-danger w-100 mb-2">Go to Main Store</a>
    </div>
</aside>

    <!--Main Body-->
    <div class="container">
        <h2>User Management</h2>
      
        <!-- Search Bar -->
        <div class="mb-4 d-flex justify-content-end"> 
            <div class="input-group w-25"> 
              <input type="text" class="form-control" placeholder="Search users...">
              <button class="btn btn-outline-secondary" type="button">Search</button>
            </div>
        </div>

        <!-- User Table Section -->
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $users->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo ucfirst($user['role']); ?></td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-user-id="<?php echo $user['user_id']; ?>" data-username="<?php echo $user['username']; ?>" data-email="<?php echo $user['email']; ?>" data-role="<?php echo $user['role']; ?>">Edit</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-user-id="<?php echo $user['user_id']; ?>">Delete User</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm">
                        <input type="hidden" id="editUserId">
                        <div class="mb-3">
                            <label for="editUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="editUsername">
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail">
                        </div>
                        <div class="mb-3">
                            <label for="editRole" class="form-label">Role</label>
                            <select class="form-select" id="editRole">
                                <option value="admin">Admin</option>
                                <option value="user">Customer</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveUserChanges()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete User Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="deleteUser()">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script>
        // Edit user modal handler
        document.querySelectorAll('.btn-warning').forEach(button => {
            button.addEventListener('click', function () {
                const userId = this.getAttribute('data-user-id');
                const username = this.getAttribute('data-username');
                const email = this.getAttribute('data-email');
                const role = this.getAttribute('data-role');

                document.getElementById('editUserId').value = userId;
                document.getElementById('editUsername').value = username;
                document.getElementById('editEmail').value = email;
                document.getElementById('editRole').value = role;
            });
        });

        // Delete user modal handler
        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', function () {
                const userId = this.getAttribute('data-user-id');
                document.querySelector('#deleteModal .btn-danger').setAttribute('data-user-id', userId);
            });
        });

        // Save user changes
        function saveUserChanges() {
            const userId = document.getElementById('editUserId').value;
            const username = document.getElementById('editUsername').value;
            const email = document.getElementById('editEmail').value;
            const role = document.getElementById('editRole').value;
            
            // Send this data to your backend (AJAX or form submission)
            console.log('User changes saved', userId, username, email, role);
        }

        // Delete user
        function deleteUser() {
            const userId = document.querySelector('#deleteModal .btn-danger').getAttribute('data-user-id');
            
            // Send a request to delete the user
            console.log('User deleted', userId);
        }
    </script>
</body>
</html>
