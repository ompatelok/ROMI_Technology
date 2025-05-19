<?php
session_start();
include 'db/connect.php';

// Simple access control (optional)
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel - ROMI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'nav.php'; ?>

<div class="container mt-4">
    <h3>📥 Contact Messages</h3>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th><th>Name</th><th>Email</th><th>Message</th><th>Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$i}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['message']}</td>
                    <td>{$row['created_at']}</td>
                </tr>";
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<?php include 'includes/footer.php'; ?>

</body>
</html>
