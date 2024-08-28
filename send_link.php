<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's email from the form
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate the email address
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Link to the create page
        $link = "https://resapu.github.io/my-website1/create.html";  // Adjust the URL to match your domain

        // Prepare the email content
        $subject = "Create Your Own 360° Experience on Amuz 360";
        $message = "Hello,\n\nThank you for subscribing to Amuz 360! Here is the link to create your own 360° content:\n\n" . $link . "\n\nWe look forward to seeing your creativity!\n\nBest regards,\nAmuz 360 Team";
        $headers = "From: no-reply@amuz360.com" . "\r\n" .
                   "Reply-To: support@amuz360.com" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        // Send the email
        if (mail($email, $subject, $message, $headers)) {
            echo "The link to the create page has been sent to your Gmail.";
        } else {
            echo "There was a problem sending the email. Please try again later.";
        }
    } else {
        echo "Invalid email address. Please enter a valid Gmail.";
    }
} else {
    echo "Invalid request method.";
}
?>
