<?php
require_once 'BaseController.php';
class shoppingCartController extends BaseController
{
    public function getShoppingCart()
    {
        return $this->loadView('shoppingCart');
    }
}




?>