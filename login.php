<?php
session_start();
include 'db/connect.php';
include 'includes/navbar.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($pass, $row['password'])) {
            $_SESSION['user'] = $email;
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid credentials!";
        }
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - ROMI</title>
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
                <h3 class="text-center mb-4 text-primary"><i class="bi bi-box-arrow-in-right icon"></i> Welcome Back</h3>

                <?php if ($error): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="email" class="form-label"><i class="bi bi-envelope-fill icon"></i>Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label"><i class="bi bi-lock-fill icon"></i>Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-box-arrow-in-right icon"></i> Login</button>
                    </div>

                    <p class="text-center mt-3">New user? <a href="register.php" class="text-decoration-none">Register here</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>
