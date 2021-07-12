<?php
$name = $_POST['name_user'];
$msg = $_POST['message'];
$to = "casimoy@yandex.ru";
$subject = "Заявка с сайта Test";
mail($to, $subject, $msg);
?>
