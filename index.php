<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CloudBox - Home</title> <!-- Title changed -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/theme.css" /> <!-- style.css renamed to theme.css -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />
  <style>
    body {
      background: url('assets/bg_cloud.png') no-repeat center center fixed; /* renamed image folder */
      background-size: cover;
      font-family: 'Poppins', sans-serif; /* changed font */
    }
    .frost-panel {
      background: rgba(255,255,255,0.2);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      padding: 25px;
      color: #f0f0f0;
    }
    .banner-section {
      min-height: 80vh;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 60px;
      color: #fff;
    }
    .highlight-box {
      display: flex;
      align-items: center;
      margin-bottom: 18px;
    }
    .highlight-box i {
      font-size: 2rem;
      margin-right: 12px;
    }
    footer {
      background: rgba(0,0,0,0.85);
    }
  </style>
</head>
<body>
<script src="js/register.js"></script> <!-- signup.js renamed to register.js -->

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-opacity-75 fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold text-white" href="index.php">CloudBox</a> <!-- Brand name changed -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link text-white active" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#support">Support</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="signin.php">Access Drive</a></li> <!-- Sign in renamed -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="banner-section">
    <div class="hero-text">
      <h1 class="fw-bold">Your Files, Anytime, Anywhere</h1>
      <p class="lead">CloudBox offers secure, fast and flexible storage.</p>
      <a href="#register" class="btn btn-lg btn-info mt-3">Start Now</a>
    </div>
  </section>

  <!-- Features Section -->
  <section class="container my-5 text-white">
    <h2 class="text-center mb-4">Key Highlights</h2>
    <div class="frost-panel">
      <div class="highlight-box"><i class="fas fa-shield-alt text-info"></i><span>Encrypted & Safe Storage</span></div>
      <div class="highlight-box"><i class="fas fa-cloud-upload-alt text-success"></i><span>Quick Uploads</span></div>
      <div class="highlight-box"><i class="fas fa-wallet text-warning"></i><span>Affordable Plans</span></div>
      <div class="highlight-box"><i class="fas fa-user-cog text-danger"></i><span>Admin Monitoring</span></div>
    </div>
  </section>

  <!-- About -->
  <section class="container my-5" id="about">
    <div class="frost-panel text-center">
      <h2>About</h2>
      <p>We are building modern cloud storage — secure, fast, and examiner‑ready for academic projects.</p>
    </div>
  </section>

  <!-- Support -->
  <section class="container my-5" id="support">
    <div class="frost-panel">
      <h2 class="text-center mb-4">Support Center</h2>
      <div class="row">
        <div class="col-md-6">
          <form id="supportForm">
            <input type="text" name="name" class="form-control mb-3" placeholder="Your Name" required>
            <input type="email" name="email" class="form-control mb-3" placeholder="Your Email" required>
            <textarea name="message" class="form-control mb-3" rows="4" placeholder="Message" required></textarea>
            <button class="btn btn-light w-100">Submit</button>
            <div class="support_msg mt-3"></div>
          </form>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center">
          <div>
            <p><i class="fas fa-envelope"></i> help@cloudbox.com</p>
            <p><i class="fas fa-phone"></i> +91 98765 43210</p>
            <p><i class="fas fa-map-marker-alt"></i> Patna, Bihar, India</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Register Section -->
  <div class="container my-5" id="register">
    <div class="row align-items-center">
      <div class="col-md-6">
        <img src="assets/signup_banner.png" alt="Register Illustration" class="img-fluid rounded shadow" style="max-height:450px;">
      </div>
      <div class="col-md-6">
        <form class="bg-white rounded shadow-lg p-5 register-form">
          <h2 class="text-center mb-4">Create Account</h2>
          <div class="mb-3">
            <label for="username" class="form-label">Full Name</label>
            <input type="text" id="username" class="form-control" required />
          </div>
          <div class="mb-3 email_con">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" class="form-control" required />
            <i class="fa fa-circle-notch fa-spin email_loader d-none"></i>
          </div>
          <div class="mb-3 pass_con">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" class="form-control" required />
            <i class="fa fa-eye pass_icon" style="cursor:pointer;"></i>
          </div>
          <div class="d-flex justify-content-between mb-3">
            <small>Generate a strong password</small>
            <button class="btn btn-sm btn-danger pass-gen">Generate</button>
          </div>
          <button class="btn btn-success w-100 register_btn" disabled>Create Account</button>
          <div class="msg mt-3"></div>
        </form>

        <!-- Verification Form -->
        <form class="bg-white rounded shadow-lg p-5 verify-form d-none mt-4" autocomplete="off">
          <h2 class="text-center mb-4">Verify Account</h2>
          <div class="mb-3">
            <label for="activation_code" class="form-label">Verification Code</label>
            <input type="text" id="activation_code" class="form-control" required />
          </div>
          <button class="btn btn-primary w-100 activation_btn">Verify Now</button>
          <div class="activation_msg mt-3"></div>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-white text-center p-3 mt-5">
    <p>&copy; 2026 CloudBox | <a href="php/admin/admin_login.php" class="text-warning">Admin Access</a></p>
  </footer>

<script>
$(document).ready(function(){
    // Support form AJAX
    $("#supportForm").submit(function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url:"php/contact.php", // same backend file, no change
            data:$(this).serialize(),
            success:function(response){
                if(response.trim()=="success"){
                    $(".support_msg