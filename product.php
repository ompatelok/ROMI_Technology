<?php
// Optional: session check or includes can be added here
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product - ROMI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .feature-icon {
      font-size: 1.2rem;
      margin-right: 8px;
      color: #0d6efd;
    }
  </style>
      <?php include 'includes/navbar.php';?>

</head>
<body>


<!-- Product Information -->
<div class="container mt-5">
  <div class="row align-items-center">
    <div class="col-md-6">
    <img src="images/ptluv-c.jpg" alt="PTLUV-C Device" class="img-fluid rounded shadow" style="max-width: 300px;">
    </div>
    <div class="col-md-6">
      <h2>PTLUV-C Device</h2>
      <p><strong>CEO & Founder:</strong> Om Kasvala<br>
         
      <p>The PTLUV-C is a smart, IoT-integrated health & sanitization device developed by ROMI. It combines real-time health tracking with UV-C based sanitization — ideal for modern safety and hygiene.</p>
      <ul class="list-unstyled">
        <li><span class="feature-icon">✅</span> Pulse & Temperature Monitoring (MAX30102, Temp Sensor)</li>
        <li><span class="feature-icon">✅</span> UV-C Sanitization Chamber</li>
        <li><span class="feature-icon">✅</span> Bluetooth Connectivity to Mobile App</li>
        <li><span class="feature-icon">✅</span> Real-Time Data Sync to Cloud</li>
        <li><span class="feature-icon">✅</span> Compact & Jacket-Friendly Form</li>
      </ul>
      <a href="contact.php" class="btn btn-primary mt-3">Enquire Now</a>
    </div>
  </div>
</div>

<!-- Optional Section: Add more features or specs -->
<div class="container mt-5">
  <h4>Technical Highlights</h4>
  <ul>
    <li>Microcontroller: ESP32</li>
    <li>Sensors: MAX30102, Temperature Sensor, Strain Sensor</li>
    <li>Connectivity: Bluetooth, Cloud</li>
    <li>Use Case: Healthcare, Smart Jacket, Sanitization</li>
  </ul>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<?php include 'includes/footer.php'; ?>

</body>
</html>
