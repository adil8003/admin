<?php

$date = date('Y-m-d');
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$to = 'abhishekk@uniquepaf.com';
$subject = "Customer name : $name ";

$name = $name;
$phone = $phone;
$email = $email;
$htmlContent = '
    <html>
    <head>
        <title>Welcome to PURANIK ABITANTE</title>
    </head>
    <body>
        <h2> PURANIK ABITANTE Customer Details!</h2>
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 350px; height: 200px;">
            <tr style="background-color: #c5c5c5;">
                <th>Customer name:</th><td>' . $name . '</td>
            </tr>
            <tr style="background-color: #c5c5c5;">
                <th>Customer email:</th><td>' . $email . '</td>
            </tr>
            <tr style="background-color: #c5c5c5;">
                <th>Customer mobile no.:</th><td>' . $phone . '</td>
            </tr>
    
        </table>
    </body>
    </html>';

// Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'From: Customer <' . $email . '>' . "\r\n";
//$headers .= 'Cc: sadil8003@gmail.com' . "\r\n";
//$headers .= 'Bcc: sadil8003@gmail.com' . "\r\n";
// Send email
if (mail($to, $subject, $htmlContent, $headers)):
    $successMsg = 'Email has sent successfully.';
else:
    $errorMsg = 'Email sending fail.';
endif;
?>

