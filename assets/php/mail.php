<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        # FIX: Replace this email with recipient email
        $mail_to = "regan00@gmail.com";
        
        # Sender Data
        $subject = trim($_POST["subject"]);
        $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["name"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);
        
        if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($subject) OR empty($message)) {
            # Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Please complete the form and try again.";
            echo "<a href=\"javascript:history.go(-1)\">CLICK HERE TO GO BACK</a>";
            exit;
        }
        
        # Mail Content
        $content = "Name: $name\n";
        $content .= "Email: $email\n\n";
        $content .= "Message:\n$message\n";

        # email headers.
        $headers = "From: $name <$email>";

        # Send the email.
        $success = mail($mail_to, $subject, $content, $headers);
        if ($success) {
            # Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
            echo "<a href=\"javascript:history.go(-1)\">CLICK HERE TO GO BACK</a>";
        } else {
            # Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong, we couldn't send your message.";
            echo "<a href=\"javascript:history.go(-1)\">CLICK HERE TO GO BACK</a>";
        }

    } else {
        # Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
        echo "<a href=\"javascript:history.go(-1)\">CLICK HERE TO GO BACK</a>";
    }

?>

<?php
//if(isset($_POST['submit'])){
//$to="regan00@gmail.com";// this is your Email address
//$from=$_POST['email'];// this is the sender's Email address
//$name=$_POST['name'];
//$email=$_POST['email'];
//$phone=$_POST['ph_number'];
//$age=$_POST['age'];
//$subject="Form submission";
//$subject2="Copy of your form submission";
//$ph_number="Name: ".$name."\nEMAIL is: ".$email."\Contact Number: ".$_POST['ph_number']."\nAge:".$_POST['age'];
//$ph_number2="Here is a copy of your Form ".$name."\n\n".$_POST['ph_number'];
//$headers="From:".$from;
//$headers2="From:".$to;
//mail($to,$subject,$ph_number,$headers);
//mail($from,$subject2,$ph_number2,$headers2);// sends a copy of the ph_number to the sender
//echo "Thanks".$name."We received your email.";
// You can also use header('Location: thank_you.php'); to redirect to another page.
//}
?>