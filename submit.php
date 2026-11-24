<?php
require_once __DIR__ . '/config.php';

function clean(string $value): string {
    return trim($value);
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}
$fullName = clean($_POST['full_name'] ?? '');
$dob = clean($_POST['dob'] ?? '');
$email = clean($_POST['email'] ?? '');
$phone = clean($_POST['phone'] ?? '');
$address = clean($_POST['address'] ?? '');
$qualification = clean($_POST['qualification'] ?? '');
$institution = clean($_POST['institution'] ?? '');
$course = clean($_POST['course'] ?? '');
$errors = [];

if ($fullName === '' || strlen($fullName) > 100) $errors[] = 'Enter a valid full name.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Enter a valid email address.';
if (!preg_match('/^[0-9]{10}$/', $phone)) $errors[] = 'Phone number must contain exactly 10 digits.';
if ($dob === '' || strtotime($dob) === false || $dob > date('Y-m-d')) $errors[] = 'Enter a valid date of birth.';
if ($address === '' || $qualification === '' || $institution === '') $errors[] = 'Please complete all required fields.';
if (($_POST['consent'] ?? '') !== 'yes') $errors[] = 'Please confirm that your information is accurate.';

if ($errors) {
    http_response_code(400);
    $message = implode(' ', $errors);
} else {
    try {
        $stmt = $pdo->prepare('INSERT INTO applications (full_name, dob, email, phone, address, qualification, institution, course) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$fullName, $dob, $email, $phone, $address, $qualification, $institution, $course]);
        $applicationId = (int)$pdo->lastInsertId();
    } catch (PDOException $e) {
        error_log($e->getMessage());
        http_response_code(500);
        $message = 'We could not save your application. Please check the database setup and try again.';
    }
}
function h($value): string { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Application status | Blue & Beige</title><link rel="stylesheet" href="assets/css/style.css"></head>
<body>
<header class="site-header"><a class="brand" href="index.php"><span class="brand-mark">B</span><span>BLUE & BEIGE<small>APPLICATION PORTAL</small></span></a><nav><a href="index.php">Home</a><a href="register.php">Apply</a><a href="about.php">About</a></nav></header>
<main class="result-wrap">
<?php if (!empty($applicationId)): ?>
  <div class="success-mark">✓</div><p class="eyebrow">SUBMISSION COMPLETE</p><h1>Application<br><em>received.</em></h1>
  <p class="intro centered">Thank you, <?= h($fullName) ?>. Your information has been saved successfully.</p>
  <section class="summary-card"><div class="summary-top"><div><p class="eyebrow">APPLICATION SUMMARY</p><h2><?= h($fullName) ?></h2></div><span class="status">SUBMITTED</span></div>
    <div class="summary-grid">
      <div><small>Application ID</small><strong>#<?= h($applicationId) ?></strong></div>
      <div><small>Date of birth</small><strong><?= h(date('d M Y', strtotime($dob))) ?></strong></div>
      <div><small>Email</small><strong><?= h($email) ?></strong></div>
      <div><small>Phone</small><strong><?= h($phone) ?></strong></div>
      <div class="full"><small>Address</small><strong><?= h($address) ?></strong></div>
      <div><small>Qualification</small><strong><?= h($qualification) ?></strong></div>
      <div><small>Institution</small><strong><?= h($institution) ?></strong></div>
      <div class="full"><small>Course / interest</small><strong><?= h($course ?: 'Not provided') ?></strong></div>
    </div>
  </section>
  <div class="actions"><button class="button" onclick="window.print()">Print summary <span>↗</span></button><a class="text-link" href="register.php">Submit another application</a></div>
<?php else: ?>
  <div class="error-mark">!</div><p class="eyebrow">SUBMISSION NOT COMPLETED</p><h1>Please check<br><em>your details.</em></h1>
  <p class="intro centered"><?= h($message ?? 'Something went wrong.') ?></p><a class="button" href="register.php">Return to form <span>→</span></a>
<?php endif; ?>
</main><footer>© <?php echo date('Y'); ?> Blue & Beige Application Portal</footer>
</body></html>