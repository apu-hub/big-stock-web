<?php
require_once(__DIR__ . "/../vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require "{$_SERVER['DOCUMENT_ROOT']}/bigstock/libs/PHPMailer/src/Exception.php";
/* The main PHPMailer class. */
// require "{$_SERVER['DOCUMENT_ROOT']}/bigstock/libs/PHPMailer/src/PHPMailer.php";
/* SMTP class, needed if you want to use SMTP. */
// require "{$_SERVER['DOCUMENT_ROOT']}/bigstock/libs/PHPMailer/src/SMTP.php";

function sendMailTo(
    string $receiverMail = null,
    string $receiverName = null,
    string $subject = null,
    $body = null,
    string $templateName = null
) {
    // Production
    $PHPmailerSMTPSecure = 'ssl';
    $PHPmailerPort = 465;
    $PHPmailerSMTPAuth = true;
    $PHPmailerHost = 'mail.thebigstock.com';
    $PHPmailerID = "noreply@thebigstock.com";
    $PHPmailerPassword = "KZXRd7xJYOE3";

    $senderName = "The Big Stock";

    if (
        $receiverMail == null &&
        $receiverName == null &&
        $subject == null
    ) return false;

    $mail = new PHPMailer();
    $mail->isSMTP();

    $mail->Host = $PHPmailerHost;
    $mail->Port = $PHPmailerPort;
    $mail->SMTPAuth = $PHPmailerSMTPAuth;
    $mail->SMTPSecure = $PHPmailerSMTPSecure;
    $mail->Username = $PHPmailerID;
    $mail->Password = $PHPmailerPassword;


    $mail->AddReplyTo($PHPmailerID, $senderName);
    $mail->SetFrom($PHPmailerID, $senderName);
    $mail->AddAddress($receiverMail, $receiverName);
    $mail->Subject = $subject;

    if ($body == null && $templateName == null) {
        $mail->Body = "Sample Mail";
    }

    if ($body != null && $templateName == null) {
        $mail->Body = $body;
    }

    if ($templateName != null) {
        $mail->IsHTML(true);
        $mail->Body  = generateMailFromTemplate($templateName, $body);
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
    }

    if (!$mail->send()) {
        // echo "error";
        return false;
    } else {
        // echo "sent";
        return true;
    }
}


function generateMailFromTemplate($templateName, $body)
{
    $Host_Name = "https://" . $_SERVER['HTTP_HOST'];
    $imagePath = $Host_Name . '/images/mail/' . $templateName . '/';
    $data = array(
        "Server_URL" => $Host_Name,
        "imagePath" => $imagePath,
        "Server_Main_URL" => $Host_Name,
        "Support_Mail" => "support@" . $Host_Name,
        "facebook" => "https://www.facebook.com/drwfix/",
        "linkedin" => "https://www.linkedin.com/company/drwfix/",
        "instagram" => "https://instagram.com/drwfix?utm_medium=copy_link"
    );

    $template_file_path = join(DIRECTORY_SEPARATOR, array($_SERVER['DOCUMENT_ROOT'], "bigstock/action/mailTemplate/$templateName.html"));

    if (!file_exists($template_file_path)) return "Cant Find Template";

    $template = file_get_contents($template_file_path);

    if (gettype($body) != "array") return $template;

    $body = array_merge($body, $data);

    foreach ($body as $key => $value) {
        $template = str_replace('{{ ' . $key . ' }}', $value, $template);
    }
    return $template;
}
