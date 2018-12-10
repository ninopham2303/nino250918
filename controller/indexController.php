<?php
require_once 'BaseController.php';
require_once 'model/indexModel.php';

/**
 * Load dữ liệu trang Index
 */
class IndexController extends BaseController
{
    /**
     * load trang index
     */
    public function getHomepage()
    {
        $model = new indexModel();
        $slide = $model->selectSlide();
        $hotproducts = $model->SelectHotProducts();
        $topseller = $model->SelectTopSeller();
        $randomhotproducts = $model->RandomHotProducts();
        $randomtopseller = $model->RandomTopSeller();
        $data = [
            'slide' => $slide,
            'hotproducts' => $hotproducts,
            'topseller' => $topseller,
            'randomhotproducts' => $randomhotproducts,
            'randomtopseller' => $randomtopseller

        ];
        return $this->loadView('index','Trang chủ',$data);
    }
}




?>