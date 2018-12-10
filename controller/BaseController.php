<?php 
require_once 'model/typeProductModel.php';
class BaseController
{
    /**
     * Gọi view từ layout
     * @param string $view
     * @param array $data
     */
    public function loadView(string $view = 'index',string $title = 'NinoShop', array $data = [])
    {
        $model = new typeProductModel();
        $categories = $model->selectTypeProduct();
        include_once 'view/layout.view.php';
    }

    public function loadErrorPage()
    {
    	return $this->loadView('404');
    }
}


















?>