<?php
if (isset($_POST['submit'])) { 
    $fullname = $_POST['first_name'] . " " . $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];
    $inquiry_type = $_POST['inquiry_type'];
    $inquiry_msg = $_POST['inquiry_msg'];

    $body = "
    Inquiry <br><br>
    ==================================== <br>
    Name: <br>
    $fullname <br><br>
    Email address: <br>
    $email <br><br>
    Contact No: <br>
    $phone <br><br>
    Inquiry Type: <br>
    $inquiry_type <br><br>
    Inquiry Message: <br>
    $inquiry_msg <br><br>
    ==================================== <br>
    URL : https://4acepartssolution.000webhostapp.com/ <br>
    MAIL : 4acepartssolution@gmail.com <br>
    ====================================
    ";

    //   Send mail
    $send_to = "ayupaed@gmail.com";
    $subject = "4Ace Parts Solution | Inquiry";
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8";
    mb_send_mail($send_to, $subject, $body, $headers, "-F '4Ace Parts Solution'");
    sendUserCopy($email, $subject, $body, $headers,$fullname);

    header("Location: index.html");
}

function sendUserCopy($email, $subject, $body, $headers){
    //   Send mail
    $subject = "クラウドオリパ | お問い合わせ内容";
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8";
    mb_send_mail($email, $subject, $body, $headers, "-f ayupaed@gmail.com -F '4Ace Parts Solution'");
}
?>