<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = strip_tags(trim($_POST['Name']));
    $telefon = strip_tags(trim($_POST['Telefonnumer']));
    $email = filter_var(trim($_POST['Email']), FILTER_SANITIZE_EMAIL);
    $nachricht = trim($_POST['Nachricht']);

    $to = "info@ewert-service.de";
    $subject = "Neue Nachricht über das Kontaktformular";


    $message = "Name: $name\n";
    $message .= "Telefonnummer: $telefon\n";
    $message .= "Email: $email\n\n";
    $message .= "Nachricht:\n$nachricht\n";

    
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";


    if (mail($to, $subject, $message, $headers)) {
        echo "Nachricht wurde gesendet!";
    } else {
        echo "Fehler beim Senden der Nachricht.";
    }
} else {

    echo "Ungültiger Aufruf.";
}
?>
