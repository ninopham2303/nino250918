<?php
require_once 'DBConnect.php';

class singleProductModel extends DBConnect
{
    public function selectProductByIdUrl($id,$url)
    {
        $data = [$id,$url];
        $sql = "SELECT p.* 
                FROM products p 
                INNER JOIN page_url u 
                ON p.id_url = u.id 
                WHERE p.id = ? 
                AND u.url = ?";
        return $this->loadOneRow($sql,$data);
    }  
    
    public function selectRelateProduct($idType, $idProduct)
    {
        $sql = "SELECT p.*, u.url 
                FROM products p 
                INNER JOIN page_url u 
                ON p.id_url = u.id 
                WHERE id_type = $idType 
                AND p.id <> $idProduct 
                LIMIT 6";
        return $this->loadMoreRow($sql);
    }
}





?>