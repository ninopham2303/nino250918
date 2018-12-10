<?php
require_once 'BaseController.php';

class accountPageController extends BaseController
{
    public function getAccountPage()
    {   
        return $this->loadView('accountPage');
    }
}










?>