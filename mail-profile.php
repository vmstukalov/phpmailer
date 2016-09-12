<?php
function send_mail()
{$name = htmlspecialchars($_REQUEST['name']);}
{$email = htmlspecialchars($_REQUEST['email']);}
{$phone = htmlspecialchars($_REQUEST['phone']);}
{$city = htmlspecialchars($_REQUEST['city']);}
{$age = htmlspecialchars($_REQUEST['age']);}
{$height = htmlspecialchars($_REQUEST['height']);}
{$weight = htmlspecialchars($_REQUEST['weight']);}
{$education = htmlspecialchars($_REQUEST['education']);}
{$lifestyle = htmlspecialchars($_REQUEST['lifestyle']);}
{$category = htmlspecialchars($_REQUEST['category']);}
{$about = htmlspecialchars($_REQUEST['about']);}
{$photo1 = htmlspecialchars($_REQUEST['photo1']);}

$message = '<b>Имя пославшего: </b>'.$_REQUEST['name'].'<br> 
            <b>Почта: </b>'.$_REQUEST['email'].'<br>
            <b>Телефон: </b>'.$_REQUEST['phone'].'<br>
            <b>Город: </b>'.$_REQUEST['city'].'<br>
            <b>Возраст: </b>'.$_REQUEST['age'].'<br>
            <b>Рост: </b>'.$_REQUEST['height'].'<br>
            <b>Вес: </b>'.$_REQUEST['weight'].'<br>
            <b>Образование: </b>'.$_REQUEST['education'].'<br>
            <b>Род занятий: </b>'.$_REQUEST['lifestyle'].'<br>
            <b>Категория: </b>'.$_REQUEST['category'].'<br>
            <b>О себе: </b>'.$_REQUEST['about'];

include "class.phpmailer.php";// подключаем класс

$mail = new PHPMailer();
$mail->From = $_REQUEST['email'];
$mail->FromName = $_REQUEST['name'];
$mail->AddAddress('mail@mail.ru');//изменить
$mail->IsHTML(true);
$mail->Subject = "Анкета с сайта";
$mail->AddAttachment($_FILES['photo1']['tmp_name'],$_FILES['photo1']['name']);
$mail->AddAttachment($_FILES['photo2']['tmp_name'],$_FILES['photo2']['name']);
$mail->AddAttachment($_FILES['photo3']['tmp_name'],$_FILES['photo3']['name']);
$mail->AddAttachment($_FILES['photo4']['tmp_name'],$_FILES['photo4']['name']);
$mail->AddAttachment($_FILES['photo5']['tmp_name'],$_FILES['photo5']['name']);


$mail->Body = $message;
if (!$mail->Send()) die ('Mailer Error: '.$mail->ErrorInfo);
{
//echo '<center><b>Спасибо за отправку вашего сообщения<br><a href=index.html>Нажмите</a>, чтобы вернуться на главную страницу';
header ("Location: http://yandex.ru");// Указать адрес для переадресации при успешной отправке
}
if (!empty($_POST['submit'])) send_mail();
?>
