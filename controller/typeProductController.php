<?php
require_once 'BaseController.php';
require_once 'model/typeProductModel.php';
require_once 'support/Pager.php';
class typeProductController extends BaseController
{

    public function getProductByType()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        $start = (isset($_GET['s'])) ? $_GET['s'] : 0 ;
        $page = isset($_GET['page']) && $_GET['page']>0  ? $_GET['page'] : 1;
        $qty = 6;
        $pageShow = 3;
        $position = ($page -1)*$qty;

        
        if($url == ''){
            header('Location:404.html'); // apsx xem .htaccess
            return;
        }
        $model = new typeProductModel;
        $product = $model->selectProductByType($url,$position,$qty);
        $totalProduct = count($model->selectProductByType($url,-1,-1));
        $pager = new Pager($totalProduct,$page,$qty,$pageShow);
        $pagination = $pager->showPagination();


        $nameCate = $model->selectNameType($url);
        $title = $nameCate->name;
        $cate = $model->selectCategories();
        $count = $model->selectPrice();
        $spePro = $model->selectSpecialProduct();
        $data = [
            'product' => $product,
            'cate' => $cate,
            'count' => $count,
            'spePro' => $spePro,
            'pagination' => $pagination
        ];
        return $this->loadView('typeProduct',$title,$data);
        
    }
}





?>