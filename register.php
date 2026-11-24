<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Apply | Blue & Beige</title><link rel="stylesheet" href="assets/css/style.css"><script src="https://code.jquery.com/jquery-3.7.1.min.js"></script><script defer src="assets/js/validation.js"></script></head>
<body>
<header class="site-header"><a class="brand" href="index.php"><span class="brand-mark">B</span><span>BLUE & BEIGE<small>APPLICATION PORTAL</small></span></a><nav><a href="index.php">Home</a><a class="active" href="register.php">Apply</a><a href="about.php">About</a></nav></header>
<main class="form-layout">
  <aside class="form-aside"><p class="eyebrow">APPLICATION / 2026</p><h1>Let's get to<br><em>know you.</em></h1><p>Fill out the form with accurate information. Fields marked with * are required.</p><div class="aside-note">Your information is stored in the application database after successful submission.</div></aside>
  <section class="form-card">
    <div class="form-heading"><div><p class="eyebrow">STEP 01 — YOUR DETAILS</p><h2>Registration form</h2></div><span class="required-note">* Required</span></div>
    <form id="applicationForm" action="submit.php" method="POST" novalidate>
      <h3>Personal information</h3>
      <div class="form-grid">
        <label>Full name *<input type="text" name="full_name" required maxlength="100" placeholder="Enter your full name"></label>
        <label>Date of birth *<input type="date" name="dob" required max="<?php echo date('Y-m-d'); ?>"></label>
        <label>Email address *<input type="email" name="email" required maxlength="150" placeholder="you@example.com"></label>
        <label>Phone number *<input type="tel" name="phone" required pattern="[0-9]{10}" maxlength="10" placeholder="10-digit mobile number"></label>
        <label class="full">Address *<textarea name="address" required rows="3" maxlength="500" placeholder="House number, street, city, state"></textarea></label>
      </div>
      <h3 class="section-gap">Education information</h3>
      <div class="form-grid">
        <label>Highest qualification *<select name="qualification" required><option value="">Select qualification</option><option>PUC / 12th</option><option>Diploma</option><option>Undergraduate</option><option>Postgraduate</option><option>Other</option></select></label>
        <label>Institution name *<input type="text" name="institution" required maxlength="150" placeholder="School / college name"></label>
        <label class="full">Course / area of interest<input type="text" name="course" maxlength="120" placeholder="e.g. Computer Science"></label>
      </div>
      <label class="consent"><input type="checkbox" name="consent" value="yes" required> I confirm that the information provided is accurate.</label>
      <p id="formMessage" class="form-message" role="alert"></p>
      <button class="button submit-button" type="submit">Submit application <span>→</span></button>
    </form>
  </section>
</main><footer>© <?php echo date('Y'); ?> Blue & Beige Application Portal</footer>
</body></html>