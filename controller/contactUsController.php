<?php
require_once 'BaseController.php';
class contactUsController extends BaseController
{
    public function getContactUs()
    {
        return $this->loadView('contactUs');
    }
}




?>