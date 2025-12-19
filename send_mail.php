<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Sanitize input
    $name    = htmlspecialchars(trim($_POST["name"] ?? ""));
    $email   = filter_var(trim($_POST["email"] ?? ""), FILTER_SANITIZE_EMAIL);
    $phone   = htmlspecialchars(trim($_POST["phone_number"] ?? ""));
    $service = htmlspecialchars(trim($_POST["service"] ?? ""));
    $message = htmlspecialchars(trim($_POST["message"] ?? ""));

    // Validation
    if (empty($name) || empty($email) || empty($phone) || empty($service) || empty($message)) {
        die("All fields are required.");
    }

    // Email configuration
    $to = "work.mousin@gmail.com";
    $subject = "New Contact Form Submission from $name";

    $body  = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Service: $service\n";
    $body .= "Message:\n$message";

    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Failed to send message. Try again later.";
    }
}
?>
