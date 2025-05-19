<?php
include 'db/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $temperature = $_POST['temperature'];
    $heart_rate = $_POST['heart_rate'];
    $spo2 = $_POST['spo2'];

    // Insert data into database
    $sql = "INSERT INTO iot_data (temperature, heart_rate, spo2) VALUES ('$temperature', '$heart_rate', '$spo2')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Data uploaded successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload IoT Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2>Upload IoT Data</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="temperature" class="form-label">Temperature (°C)</label>
            <input type="number" class="form-control" id="temperature" name="temperature" required>
        </div>
        <div class="mb-3">
            <label for="heart_rate" class="form-label">Heart Rate</label>
            <input type="number" class="form-control" id="heart_rate" name="heart_rate" required>
        </div>
        <div class="mb-3">
            <label for="spo2" class="form-label">SpO2</label>
            <input type="number" class="form-control" id="spo2" name="spo2" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload Data</button>
    </form>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<?php include 'includes/footer.php'; ?>

</body>
</html>
