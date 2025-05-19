<?php
include 'db/connect.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");  // Redirect to login page if not logged in
    exit();
}

// Get user data
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// Handle form submission for updating user details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_name = mysqli_real_escape_string($conn, $_POST['name']);
    $new_email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);  // Hash the password

    // Update user details in the database
    $update_sql = "UPDATE users SET name = '$new_name', email = '$new_email', password = '$hashed_password' WHERE id = $user_id";
    if (mysqli_query($conn, $update_sql)) {
        $_SESSION['message'] = "Profile updated successfully!";
        header("Location: user.php");  // Redirect to the same page after success
    } else {
        $_SESSION['message'] = "Error updating profile.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php include 'includes/navbar.php';?>
</head>
<body>


<!-- User Profile Section -->
<div class="container mt-4">
    <h4>👤 User Profile</h4>
    <?php
    if (isset($_SESSION['message'])) {
        echo "<div class='alert alert-info'>{$_SESSION['message']}</div>";
        unset($_SESSION['message']);
    }
    ?>
    <form method="POST" action="user.php">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <small class="form-text text-muted">Leave empty to keep your current password.</small>
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
