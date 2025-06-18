<?php

use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer/PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$captcha;

if ( isset( $_POST['token'] ) ) {
	$captcha = $_POST['token'];
};

$secretKey = '6LfVzZsjAAAAAO-QWLsguj7DMYQdzVGG7NKbdCay';

// Делаем запрос по адресу:
$url =  'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey .  '&response=' . $captcha;

// Получаем ответ и преобразуем его:
$response = file_get_contents( $url );
$response_keys = json_decode( $response, true );

// Заголовки для отправки запроса:
header( 'Content-type: application/json' );

// Проверка, бот или человек:
if ( $response_keys['success'] && $response_keys['score'] >= 0.5 ) {

	# Основной email, куда приходят заявки:
	$to = 'maapinfo@yandex.ru';

	# Получаем данные о количестве отправленных заявок и увеличиваем значение:
	$file_txt = './order-maap.txt';
	$order_number = file_get_contents( $file_txt );
	$order_number++;
	$message;

	# Формирование сообщения:
	if ( !empty( $_POST['maap-name'] ) && !empty( $_POST['maap-phone'] ) ) {

		$message .= '<b>Имя: </b>'. $_POST['maap-name'] .'<br>';
		if ( !empty( $_POST['maap-email'] ) ) $message .= '<b>Почта: </b>'. $_POST['maap-email'] .'<br>';
		$message .= '<b>Телефон: </b>'. $_POST['maap-phone'] .'<br>';
		if ( !empty( $_POST['maap-text'] ) ) $message .= '<b>Сообщение: </b>'. $_POST['maap-text'] .'<br>';

	} else {
		echo json_encode( array( 'answer' => 'error', 'result' => 'Не заполнены обязательные поля!' ) );
	};

	# Настройки отправки:
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPAuth 	= true;
	$mail->Host				= 'mail.hosting.reg.ru'; // SMTP server.
	$mail->Username		= 'help@maap.info'; // SMTP server username.
	$mail->Password		= 'fG5bF9vU7w'; // Ваш пароль.
	$mail->SMTPSecure	= 'ssl';
	$mail->Port				= 465;
	$mail->CharSet		= 'utf-8';
	$mail->setFrom('help@maap.info', 'maap.info'); // Адрес самой почты и имя отправителя.

	$mail->addAddress($to);
	$mail->isHTML(true);

	# Заголовок и текст письма:
	$mail->Subject = 'Заявка — №'. $order_number;
	file_put_contents( $file_txt, $order_number );
	$mail->Body = $message;

	// Результат:
	if (!$mail->send()) {
		// echo 'Mailer Error: ' . $mail->ErrorInfo;
		echo json_encode( array( 'answer' => 'error', 'result' => 'Письмо не отправилось!' ) );

	} else {
		echo json_encode( array( 'answer' => 'ok' ) );
	};

} else {
	echo json_encode( array( 'answer' => 'error', 'result' => 'Нет души человеческой..' ) );
};