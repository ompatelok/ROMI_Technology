<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - ROMI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  
  <?php include 'includes/navbar.php';?>

</head>
<body>

<!-- Contact Form -->
<div class="container mt-5">
  <h3 class="mb-4">Contact ROMI</h3>
  <form action="send_message.php" method="post">
    <div class="mb-3">
      <label for="name" class="form-label">Your Name</label>
      <input type="text" name="name" id="name" required class="form-control">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Your Email</label>
      <input type="email" name="email" id="email" required class="form-control">
    </div>
    <div class="mb-3">
      <label for="message" class="form-label">Message</label>
      <textarea name="message" id="message" rows="4" required class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
  </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'includes/footer.php'; ?>

</body>
</html>
