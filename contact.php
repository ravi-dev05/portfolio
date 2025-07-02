<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = strip_tags(trim($_POST["fullname"]));
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $message = trim($_POST["message"]);

  // Email address where you want to receive the message
  $to = "ravijoshi1023@gmail.com";

  // Email subject
  $subject = "New Contact Form Message from $fullname";

  // Email content
  $email_content = "Name: $fullname\n";
  $email_content .= "Email: $email\n\n";
  $email_content .= "Message:\n$message\n";

  // Email headers
  $headers = "From: $fullname <$email>";

  // Send email
  if (mail($to, $subject, $email_content, $headers)) {
    echo "<h2>Thank you! Your message has been sent.</h2>";
  } else {
    echo "<h2>Oops! Something went wrong. Please try again later.</h2>";
  }
} else {
  echo "<h2>There was a problem with your submission, please try again.</h2>";
}
?>
