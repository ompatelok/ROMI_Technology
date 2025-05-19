<style>
  footer {
    background: linear-gradient(135deg, #0d1b2a, #1b263b);
    color: #fff;
    padding: 40px 0;
    margin-top: 60px;
    font-family: 'Segoe UI', sans-serif;
  }

  footer .social-icons a {
    display: inline-block;
    margin: 0 10px;
    font-size: 1.5rem;
    color: #f8f9fa;
    transition: all 0.3s ease-in-out;
  }

  footer .social-icons a:hover {
    color: #ffd700;
    transform: rotate(5deg) scale(1.1);
    animation: wiggle 0.4s ease-in-out;
  }

  @keyframes wiggle {
    0% { transform: rotate(0deg); }
    25% { transform: rotate(3deg); }
    50% { transform: rotate(-3deg); }
    75% { transform: rotate(2deg); }
    100% { transform: rotate(0deg); }
  }

  footer p {
    margin-bottom: 10px;
    font-size: 15px;
    opacity: 0.9;
  }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<footer class="text-center">
  <div class="container">
    <p><strong>ROMI &copy; 2025</strong> | All Rights Reserved</p>
    <p>📍 Marwadi University, Rajkot, Gujarat | 📞 9xxxxxxxxx</p>

    <div class="social-icons mt-3">
      <a href="https://www.linkedin.com" target="_blank"><i class="bi bi-linkedin"></i></a>
      <a href="https://www.youtube.com" target="_blank"><i class="bi bi-youtube"></i></a>
      <a href="https://www.instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
      <a href="https://www.facebook.com" target="_blank"><i class="bi bi-facebook"></i></a>
      <a href="mailto:romi.support@example.com"><i class="bi bi-envelope-fill"></i></a>
    </div>
  </div>
</footer>
