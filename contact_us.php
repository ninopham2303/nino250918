<?php
include_once 'controller/contactUsController.php';
$show = new contactUsController();
return $show->getContactUs();



?>