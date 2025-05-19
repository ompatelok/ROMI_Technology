<?php
include 'db/connect.php';

// Fetch data from the iot_data table
$sql = "SELECT * FROM iot_data ORDER BY timestamp DESC LIMIT 10";
$result = mysqli_query($conn, $sql);

// Arrays to store data for the chart
$timestamps = [];
$temperatures = [];
$heart_rates = [];
$spo2_levels = [];

// Loop through the result and push the values into arrays
while ($row = mysqli_fetch_assoc($result)) {
    $timestamps[] = $row['timestamp'];
    $temperatures[] = $row['temperature'];
    $heart_rates[] = $row['heart_rate'];
    $spo2_levels[] = $row['spo2'];
}

// Convert arrays to JSON format to pass to JavaScript
$timestamps_json = json_encode($timestamps);
$temperatures_json = json_encode($temperatures);
$heart_rates_json = json_encode($heart_rates);
$spo2_levels_json = json_encode($spo2_levels);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ROMI Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php include 'includes/navbar.php';?>
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 40px;
        }
        h4 {
            color: #3c3c3c;
            font-weight: bold;
        }
        .table th, .table td {
            text-align: center;
        }
        .navbar {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>


<!-- Displaying IoT Data in Table Format -->
<div class="container mt-4">
    <h4>🩺 Live Health Data</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Device</th>
                <th>Temp (°C)</th>
                <th>Pulse</th>
                <th>SpO2</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['device_id']}</td>
                        <td>{$row['temperature']}</td>
                        <td>{$row['heart_rate']}</td>
                        <td>{$row['spo2']}</td>
                        <td>{$row['timestamp']}</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Bar Chart for Live Data -->
<div class="container mt-4">
    <h4>📊 IoT Data Overview</h4>
    <canvas id="iotChart" width="500" height="300"></canvas>
    <script>
        var ctx = document.getElementById('iotChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',  // Change to bar chart
            data: {
                labels: <?php echo $timestamps_json; ?>,  // Time data for x-axis
                datasets: [{
                    label: 'Temperature (°C)',
                    data: <?php echo $temperatures_json; ?>,  // Temperature data
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',  // Aesthetic light teal
                    borderColor: 'rgba(75, 192, 192, 1)',  // Same color for border
                    borderWidth: 1
                },
                {
                    label: 'Heart Rate (bpm)',
                    data: <?php echo $heart_rates_json; ?>,  // Heart rate data
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',  // Aesthetic pink
                    borderColor: 'rgba(255, 99, 132, 1)',  // Darker pink border
                    borderWidth: 1
                },
                {
                    label: 'SpO2 (%)',
                    data: <?php echo $spo2_levels_json; ?>,  // SpO2 data
                    backgroundColor: 'rgba(153, 102, 255, 0.6)',  // Aesthetic purple
                    borderColor: 'rgba(153, 102, 255, 1)',  // Darker purple border
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,  // Make the chart responsive
                scales: {
                    y: {
                        beginAtZero: true  // Start Y-axis at zero
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',  // Position the legend at the top
                    },
                    tooltip: {
                        backgroundColor: '#333',  // Darker background for tooltips
                        titleColor: '#fff',  // White title color
                        bodyColor: '#fff',  // White body color
                    }
                }
            }
        });
    </script>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<?php include 'includes/footer.php'; ?>

</body>
</html>
