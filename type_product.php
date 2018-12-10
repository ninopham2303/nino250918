<?php
require_once 'controller/typeProductController.php';
$show = new typeProductController;
return $show->getProductByType();



?>