<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
function send($email) {
    
    // Now you can use CustomException directly
    include '../settings/connection.php';
    require '../utils/src/Exception.php';
    require '../utils/src/PHPMailer.php';
    require '../utils/src/SMTP.php';


    if (true){
        echo "Working on sending email";
        $subject = "Verification Code From ASBED";

        // Generate a random 6-digit pin
        $pin = mt_rand(100000, 999999);

        // Prepare the SQL query to insert the pin into the database
        $query = "INSERT INTO VerifiablePins (pin, email) VALUES ('$pin', '$email')";

        // Execute the SQL query
        if ($con->query($query) === TRUE) {
            echo "Pin generated and saved successfully.";
        } else {
            echo "Error: " . $con->error;
            return false;
        }

        $message = "Your verification pin is:  $pin";

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp@gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'kwakukumi14@gamil.com';                     // SMTP username
            $mail->Password   = 'nhnfuxsvctxicjqc';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
            $mail->Port       = 587;                                    // TCP port to connect to
            $mail->setFrom('kwakukumi14@gamil.com'); // Your email
            $mail->addAddress($email);     // Client email
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->send();
            // echo
            //  "<script>
            //     alert('Check your email for your verification pin.');
            //     window.location.href = '../login/verify_pin_view.php';
            // </script>";
            return true;
        }
    
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
    echo "Message has not been sent";
    return false;
}
echo "Message couldn't be sent";
}

?>