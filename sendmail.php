
<!-- osji yomj izlv cslo -->
<?php
// xxrz yclq pdzu lhbe
// slimsassi5004@gmail.com
$to = 'nouhahbhbn@gmail.com';
$subject = 'hello puta';
$message = 'spicy and tasty';

$headers = "From : nouhahbhbn@gmail.com";

if (mail($to, $subject, $message, $headers)) {
    echo 'L\'e-mail a été envoyé avec succès.';
} else {
    echo 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail.';
}
?>