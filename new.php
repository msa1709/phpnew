<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$user_type = $_SESSION['user_type'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['email']; ?>!</h1>

    <?php if ($user_type == 'admin'): ?>
        <h2>Admin Menu</h2>
        <ul>
            <li><a href="manage_users.php">Manage Users</a></li>
            <li><a href="view_reports.php">View Reports</a></li>
        </ul>
      
      
    <?php else: ?>
        <h2>User Menu</h2>
        <ul>
            <li><a href="view_profile.php">View Profile</a></li>
            <li><a href="view_orders.php">View Orders</a></li>
        </ul>
    <?php endif; ?>

    <a href="logout.php">Logout</a>
</body>
</html>