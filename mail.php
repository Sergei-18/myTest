<?php
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';


$phone = trim($_POST["phone"]);


$message = "Телефон: $phone\r\n";

$to = "test@test.ru";
$title = "Новая заявка";

$res = '';
$error = false;



if ( empty($phone) ) {
	$res .= 'alert(Поле телефон - не заполено)';
	$error = true;
} else {
	$pattern = '/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/';
	if ( ! preg_match($pattern, $phone) ) {
		$res .= 'alert (Поле телефон - не соответствует формату)';
		$error = true;
	}
}

if ( !$error ) {
	if ( mail($to, $title, $message, "Content-type: text/plain; charset=\"utf-8\"") ) {
		$res = 'alert (Сообщение отправлено, спасибо за заявку!)';
	} else {
		$res = 'alert (Ошибка при отправке)';
	}
}

echo $res;