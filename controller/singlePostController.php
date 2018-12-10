<?php
require_once 'BaseController.php';
class singlePostController extends BaseController
{
    public function getsinglePost()
    {
        return $this->loadView('singlePost');
    }
}








?>