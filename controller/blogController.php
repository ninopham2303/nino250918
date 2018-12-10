<?php
require_once 'BaseController.php';
class blogController extends BaseController
{
    public function getBlog()
    {
        return $this->loadView('blog');
    }
}








?>