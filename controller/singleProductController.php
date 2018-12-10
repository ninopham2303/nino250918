<?php
require_once 'BaseController.php';
require_once 'model/singleProductModel.php';
class singleProductController extends BaseController
{
    public function getsingleProduct()
    {
        $url = $_GET['url'];
        $id = $_GET['id'];
        $model = new singleProductModel;
        $product = $model->selectProductByIdUrl($id,$url);
        if (!$product) {
            header('Location:404.php');
            return;
        }
        $title = $product->name;
        $IdType = $product->id_type;
        $relateProduct = $model->selectRelateProduct($IdType,$product->id);
        $data = [
            'product' => $product,
            'ralateProducts' => $relateProduct
        ];
        return $this->loadView('singleProduct',$title,$data);
    }
}








?>