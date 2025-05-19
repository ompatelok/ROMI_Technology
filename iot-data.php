<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include 'db/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>IoT Data | ROMI PTLUV-C</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- IoT Data Table -->
<div class="container mt-5">
    <h2>Live IoT Health Data</h2>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Timestamp</th>
                <th>Heart Rate (bpm)</th>
                <th>SpO2 (%)</th>
                <th>Temperature (°C)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM iot_data ORDER BY timestamp DESC";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$row['timestamp']}</td>
                        <td>{$row['heart_rate']}</td>
                        <td>{$row['spo2']}</td>
                        <td>{$row['temperature']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>No data available</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<?php include 'includes/footer.php'; ?>

</body>
</html>
