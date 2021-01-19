<?php

$msg = '';
$msgClass = '';


//Check for submit
if (filter_has_var(INPUT_POST, 'submit')) {
    // Get Form Data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Check Required Fields
    if (!empty($email) && !empty($name) && !empty($message)) {
        // Passed
        // Check email
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            // Failed
            $msg = 'Bitte gültige Email eintragen!';
            $msgClass = 'alert-danger';
        } else {
            // Passed
            $toEmail = 'smaxxims@gmail.com';
            $subject = 'Kontaktanfrage von:  ' . $name;
            $body = "
            <h2>Kontaktanfrage</h2>
            <h4>Name</h4>
            <p>$name</p>
            <h4>Email</h4>
            <p>$email</p>
            <h4>Nachricht</h4>
            <p>$message</p>";

            // Email Headers
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers = "Content-Type:text/html;charset=UTF-8" . "\r\n";
            // Additional Headers
            $headers .= "From: $name<$email>\r\n";

            if (mail($toEmail, $subject, $body, $headers)) {
                // Email sent
                $msg = 'Erfolgreich gesendet!';
                $msgClass = 'alert-success';
            } else {
                // Failed to sent
                $msg = 'Senden Fehlgeschlagen!';
                $msgClass = 'alert-danger';
            }
        }
    } else {
        // Failed
        $msg = 'Bitte alle Felder ausfüllen!';
        $msgClass = 'alert-danger';
    }
}

include "../layouts/_contact.php";

?>