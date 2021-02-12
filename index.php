<?php
    $email = "saimonpanov@gmail.com";
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $name = trim($name);
    $phone = trim($phone);
    $message = trim($message);
    $content .= "Имя: ".$name."\nНомер телефона: ".$phone."\nСообщение: ".$message;

    if (mail($email, "Заявка с сайта", $content)) {
        echo "сообщение успешно отправлено";
    } else {
        echo "при отправке сообщения возникли ошибки";
    }
?>