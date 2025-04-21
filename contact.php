<?php
// Create a file named send_email.php in the same directory as your HTML file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = isset($_POST['subject']) ? $_POST['subject'] : "New Contact Form Submission";
    $message = $_POST['message'];
    
    // Recipient email
    $to = "adhilaaza@gmail.com";
    
    // Create email headers
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    
    // Compose email body
    $email_body = "
    <html>
    <head>
        <title>$subject</title>
    </head>
    <body>
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong></p>
        <p>" . nl2br($message) . "</p>
    </body>
    </html>
    ";
    
    // Send email
    $mail_sent = mail($to, $subject, $email_body, $headers);
    
    // Redirect based on success or failure
    if ($mail_sent) {
        header("Location: thankyou.html"); // Create a thank you page
        exit;
    } else {
        header("Location: error.html"); // Create an error page
        exit;
    }
}
?>