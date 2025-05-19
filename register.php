<?php
include 'db/connect.php';
include 'includes/navbar.php';

$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Email already registered!";
    } else {
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass')";
        if (mysqli_query($conn, $sql)) {
            $success = "Registered successfully. You can login now.";
        } else {
            $error = "Error during registration.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register - ROMI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #fdfbfb, #ebedee);
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border-radius: 2rem;
            box-shadow: 0 5px 30px rgba(0,0,0,0.1);
        }
        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 8px rgba(78, 115, 223, 0.4);
        }
        .btn-primary {
            background-color: #4e73df;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
        }
        .icon {
            font-size: 1.2rem;
            margin-right: 0.4rem;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 bg-white">
                <h3 class="text-center mb-4 text-primary"><i class="bi bi-person-plus icon"></i> Create Account</h3>

                <?php if ($error): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php elseif ($success): ?>
                    <div class="alert alert-success"><?= $success ?></div>
                <?php endif; ?>

                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label"><i class="bi bi-person-fill icon"></i>Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label"><i class="bi bi-envelope-fill icon"></i>Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label"><i class="bi bi-lock-fill icon"></i>Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-person-plus icon"></i> Register</button>
                    </div>

                    <p class="text-center mt-3">Already have an account? <a href="login.php" class="text-decoration-none">Login here</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>
