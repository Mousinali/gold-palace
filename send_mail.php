<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    /* ===============================
       1. GET & VALIDATE FORM DATA
    =============================== */

    $name    = trim($_POST["name"] ?? '');
    $email = strtolower(trim($_POST["email"]));
    $phone   = trim($_POST["phone_number"] ?? '');
    $message = trim($_POST["message"] ?? '');

    if ($name === '' || $email === '' || $phone === '' || $service === '' || $message === '') {
        exit("All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("Invalid email address.");
    }

    /* ===============================
       2. MAIL SETTINGS
    =============================== */

    // 🔹 RECEIVER EMAIL (YOU)
    $to = "chandrashekharshaw1@gmail.com";
    $subject = "Enquiry From Website – " . $name;

    /* ===============================
       3. EMAIL UI (UNCHANGED)
    =============================== */

    $body = '
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>New Website Enquiry</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f4f4;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f4f4;padding:20px;">
<tr>
<td align="center">

    <table width="600" cellpadding="0" cellspacing="0"
        style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);">

        <tr>
            <td style="background:#111827;color:#ffffff;padding:22px 26px;">
                <h2 style="margin:0;font-size:18px;font-weight:600;">New Website Enquiry</h2>
                <p style="margin:6px 0 0;font-size:13px;color:#d1d5db;">Contact form submission</p>
            </td>
        </tr>

        <tr>
            <td style="padding:26px;">
                <table width="100%" style="font-size:14px;color:#111827;">
                    <tr><td width="80"><strong>Name</strong></td><td>'.$name.'</td></tr>
                    <tr><td><strong>Email</strong></td><td>'.$email.'</td></tr>
                    <tr><td><strong>Phone</strong></td><td>'.$phone.'</td></tr>
                </table>

                <hr style="border:none;border-top:1px solid #e5e7eb;margin:22px 0;">

                <p style="font-weight:600;">Message</p>
                <p style="line-height:1.6;color:#374151;">
                    '.nl2br(htmlspecialchars($message)).'
                </p>
            </td>
        </tr>

        <tr>
            <td style="background:#f9fafb;padding:16px 26px;font-size:12px;color:#6b7280;">
                This email was sent from your website contact form.
            </td>
        </tr>

    </table>

</td>
</tr>
</table>

</body>
</html>';

    /* ===============================
       4. HEADERS (ANTI-SPAM SAFE)
    =============================== */

    $headers  = "From: Website Enquiry <contact@yourdomain.com>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    /* ===============================
       5. SEND MAIL + REDIRECT
    =============================== */

    if (mail($to, $subject, $body, $headers)) {
        header("Location: thank-you.html");
        exit;
    } else {
        exit("Mail delivery failed.");
    }
}
?>
