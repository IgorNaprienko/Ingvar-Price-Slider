<?php
if($_POST){
	$server_message = "Cпасибо за заказ, в ближайшее время с вами свяжется наш менеджер"; 
	$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
	$phone = htmlspecialchars($_POST['phone'], ENT_QUOTES);

	$to        = $_POST['mail'];
	$subject   = 'Заказ расчета с сайта '.$_SERVER['HTTP_HOST'];
	$mail_from = $_POST['from'];
	// текст письма
	$message = '
	<html>
	<head>
	  <title>Заказ расчета</title>
	</head>
	<body>
	   <p>Заказ расчета с сайта '.$_SERVER['HTTP_HOST'].'</p>
	   <p>Имя: '.$name.'</p>
	   <p>Объем работ: '.$_POST["ips"].' M2</p>
	   <p>Телефон: '.$phone.'</p>
	   <p>Мин. срок: '.$_POST["minDate"].' дн.</p>
	   <p>Макс. срок: '.$_POST["maxDate"].' дн.</p>
	   <p>Мин. сумма:'.$_POST["min"].' руб.</p>
	   <p>Макс. сумма:'.$_POST["max"].' руб.</p>
	   </body>
	</html>';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Info <' .$mail_from.'>';

	header('Content-type: text/html; charset=utf-8');

	if (mail($to,$subject,$message,$headers)) {

		echo $server_message;
	} else {   
	  echo("<p>Отправка электронной почты не удалось ...</p>");  
	}
}?>