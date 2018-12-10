<?php
require_once 'BaseController.php';
/**
 * summary
 */
class aboutUsController extends BaseController
{
    /**
     * summary
     */
    public function getAboutUs()
{
	return $this->loadView('aboutUs');
}
}














?>