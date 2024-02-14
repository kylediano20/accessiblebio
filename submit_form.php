<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Specify your email address
    $to = "kyle.diano@tamu.edu";
    // Create the email subject line
    $subject = "New contact from $name";
    // Construct the email body
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Redirect to a thank-you page or display a success message
        echo "Thank You! Your message has been sent.";
    } else {
        // Email failed to send, handle the error
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // Not a POST request, handle the error
    echo "There was a problem with your submission, please try again.";
}
?>
