<?php
require __DIR__ . '/data.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo json_encode(['ok' => false, 'message' => 'Invalid request.']);
  exit;
}

$name    = trim(strip_tags($_POST['name'] ?? ''));
$email   = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$subject = trim(strip_tags($_POST['subject'] ?? ''));
$message = trim(strip_tags($_POST['message'] ?? ''));

if (!$name || !$email || !$subject || !$message) {
  echo json_encode(['ok' => false, 'message' => 'Please fill all fields with valid details.']);
  exit;
}

$headers  = "From: Portfolio <no-reply@" . ($_SERVER['HTTP_HOST'] ?? 'localhost') . ">\r\n";
$headers .= "Reply-To: $email\r\n";
$body     = "Name: $name\nEmail: $email\n\n$message";

$sent = @mail($me['email'], "Portfolio: $subject", $body, $headers);

echo json_encode([
  'ok'      => (bool) $sent,
  'message' => $sent ? 'Thank you! Your message has been sent.' : 'Could not send mail. Please email me directly.',
]);
