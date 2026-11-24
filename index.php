<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blue & Beige | Registration</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
  <a class="brand" href="index.php"><span class="brand-mark">B</span><span>BLUE & BEIGE<small>APPLICATION PORTAL</small></span></a>
  <nav><a class="active" href="index.php">Home</a><a href="register.php">Apply</a><a href="about.php">About</a></nav>
</header>
<main class="hero">
  <section class="hero-copy">
    <p class="eyebrow">A SIMPLE • SECURE • ONLINE PROCESS</p>
    <h1>Your next chapter<br><em>starts here.</em></h1>
    <p class="intro">Complete your application in a few easy steps. Submit your details online and receive a neatly formatted application summary.</p>
    <a class="button" href="register.php">Start application <span>→</span></a>
    <div class="trust-row"><span>✓ Easy registration</span><span>✓ Secure database storage</span></div>
  </section>
  <section class="hero-art" aria-label="Decorative application card">
    <div class="sun"></div><div class="paper">
      <div class="paper-top"><span>APPLICATION FORM</span><span class="dot"></span></div>
      <div class="paper-line wide"></div><div class="paper-line"></div>
      <div class="paper-label">PERSONAL DETAILS</div>
      <div class="paper-line wide"></div><div class="paper-line short"></div>
      <div class="paper-label">EDUCATION</div><div class="paper-line wide"></div>
      <div class="paper-stamp">READY<br>TO APPLY</div>
    </div>
    <div class="art-caption">Make your first move.</div>
  </section>
</main>
<footer>© <?php echo date('Y'); ?> Blue & Beige Application Portal</footer>
</body>
</html>