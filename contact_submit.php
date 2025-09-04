<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $phone   = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Save in database
    $sql = "INSERT INTO contacts (name, email, phone, message) 
            VALUES ('$name', '$email', '$phone', '$message')";

    if (mysqli_query($conn, $sql)) {
        // -------------------------------
        // Email notification to admin
        // -------------------------------
        $to = "admin@arohya.com"; // 👉 change this to your real email
        $subject = "New Contact Message - Arohya";
        
        $body = "
        You have received a new contact message:

        Name: $name
        Email: $email
        Phone: $phone

        Message:
        $message
        ";

        $headers = "From: noreply@arohya.com\r\n";
        $headers .= "Reply-To: $email\r\n";
        
        // send email
        mail($to, $subject, $body, $headers);

        echo "<script>alert('Thank you for contacting us! We will get back to you soon.'); window.location.href='contact.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
