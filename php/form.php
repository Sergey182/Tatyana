<?php
$email = 'saimonpanov@gmail.com';
if (!empty($_POST['name']) && !empty($_POST['phone'])) {
    $name = trim($_POST['name']) . substr(0, 20);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);
    $name = mb_substr($name, 0, 30);
    $phone = mb_substr($phone, 0, 20);
    $message = mb_substr($message, 0, 1000);
    $content = "Имя: " . $name . "\nНомер телефона: " . $phone . "\nСообщение: " . $message;

    $mysqli = new mysqli("localhost", "saimonpa_admin", "9E4k1U2d", "saimonpa_tatyana");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $result = $mysqli->query("SELECT phone FROM customers WHERE phone='$phone'");
    if ($result->num_rows == 0) {
        if (mail($email, "Заявка с сайта", $content)) {
            $mysqli->query("INSERT INTO customers (name, phone) VALUES ('$name', '$phone')");
            echo json_encode(array('success' => true,
                'response' => 'Ваша заявка принята!'));
        } else echo json_encode(array('success' => false,
            'response' => 'При отправке формы возникла ошибка! Попробуйте еще раз и в случае неудачи свяжитесь по контактному номеру телефона'));
    } else {
        echo json_encode(array('success' => true,
            'response' => 'По указанному номеру уже есть активная заявка!'));
    }
    $mysqli->close();
} else {
    echo json_encode(array('success' => false,
        'response' => 'Ошибка! Пустой запрос!'));
}
