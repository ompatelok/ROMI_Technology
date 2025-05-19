<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include 'includes/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us | ROMI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>


<div class="container mt-5">
    <h2 class="text-center">About ROMI</h2>
    <p class="lead text-center">Innovating Health. Empowering the Future.</p>

    <div class="row mt-4">
        <div class="col-md-6">
            <h4>Our Startup: ROMI</h4>
            <p><strong>ROMI</strong> is a health-tech startup with a vision to blend innovation and safety into everyday medical care. We aim to create intelligent medical devices that monitor, protect, and improve well-being using IoT, automation, and cloud technologies.</p>
        </div>
        <div class="col-md-6">
            <h4>Our Flagship Product: PTLUV-C</h4>
            <p><strong>PTLUV-C</strong> is a multi-functional sanitization and health monitoring device. It uses Pulse detection, Temperature sensing, and UV-C light for disinfecting surfaces while also collecting vital health data and sending it to the cloud. It's the perfect intersection of safety and smart technology.</p>
        </div>
    </div>

    <hr class="my-5">

    <div class="row text-center">
        <h4>Leadership Team</h4>
        <div class="col-md-6 mt-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <img src="images/om.jpg" alt="Om Kasvala" class="profile-img">
                    <h5>Om Kasvala</h5>
                    <p class="text-muted">CEO & Founder</p>
                    <p>Om is the brain behind ROMI and the PTLUV-C innovation. He handles the technical architecture, IoT system integration, and leads the company's product vision.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <img src="images/kalpesh.jpg" alt="Kalpesh Parmar" class="profile-img">
                    <h5>Kalpesh Parmar</h5>
                    <p class="text-muted">Co-Founder</p>
                    <p>Kalpesh supports core business development, funding, and strategic operations of ROMI. His role is key in scaling the startup and maintaining partnerships.</p>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5">
    <div class="text-center">
        <p class="text-muted">© 2025 ROMI Innovations | Powered by Technology & Vision</p>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<?php include 'includes/footer.php'; ?>

</body>
</html>
