<?php
include_once 'controller/checkoutController.php';
$show = new checkoutController();
return $show->getCheckout();



?>