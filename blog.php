<?php
require_once 'controller/blogController.php';
$show = new blogController();
return $show->getBlog();



?>