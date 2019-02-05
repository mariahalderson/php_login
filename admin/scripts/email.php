<?php
function send_email($postname, $postemail, $postusername, $postpassword) {
    $name = $postname;
    $email = $postemail;
    $subject = 'subject: New Account Created.';
    $message = 'message: You have created a new account. Your username is'.$postusername.'Your password is:'.$postpassword;

    $to = $postemail;
    $headers = 'From: noreply@newsite.com' . '\r\n';

    mail($to, $subject, $message, $headers);
}
// send_email();
?>
