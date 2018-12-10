<?php
require_once 'BaseController.php';
class checkoutController extends BaseController
{
    public function getCheckout()
    {
        return $this->loadView('checkout');
    }
}




?>