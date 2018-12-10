<?php
require_once 'DBConnect.php';
class indexModel extends DBConnect
{
    public function selectSlide()
    {
        $sql = "SELECT * FROM slide WHERE status = 1";
        return $this->loadMoreRow($sql);
    }

    function SelectHotProducts(){
        $sql = "SELECT p.id, url, name, price, promotion_price, image, new 
                FROM products p 
                INNER JOIN page_url u 
                on p.id_url = u.id 
                WHERE status = 1 LIMIT 6";
        return $this->loadMoreRow($sql);
    }

    function SelectTopSeller(){
        $sql = "SELECT p.id, url, p.name, p.price, p.promotion_price, p.image, p.new 
        FROM products p 
        INNER JOIN bill_detail b 
        ON p.id = b.id_product 
        INNER JOIN page_url u 
        ON p.id_url = u.id 
        GROUP BY b.id_product 
        ORDER BY SUM(quantity) DESC 
        LIMIT 6";
        return $this->loadMoreRow($sql);
    }

    function RandomHotProducts(){
        $sql = "SELECT p.id, name,url, price, promotion_price, image 
                FROM products p 
                INNER JOIN page_url u 
                ON p.id_url = u.id 
                WHERE promotion_price > 1 
                ORDER BY RAND() LIMIT 3";
        return $this->loadMoreRow($sql);
    }

    function RandomTopSeller(){
        $sql = "SELECT p.id,url, p.name, p.price, p.promotion_price, p.image 
                FROM products p 
                INNER JOIN bill_detail b 
                ON p.id = b.id_product
                INNER JOIN page_url u 
                ON p.id_url = u.id 
                GROUP BY b.id_product 
                ORDER BY RAND() 
                LIMIT 3";
        return $this->loadMoreRow($sql);
    }


}
?>