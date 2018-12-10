<?php
require_once 'DBConnect.php';

class typeProductModel extends DBConnect
{
    public function selectTypeProduct()
    {
        $sql = "SELECT c.*, url
                FROM categories c 
                INNER JOIN page_url u 
                ON c.id_url = u.id 
                ";
        return $this->loadMoreRow($sql);
    }

    public function selectNameType($urlType)
    {
        $sql = "SELECT name
                FROM categories c 
                INNER JOIN page_url u 
                ON c.id_url = u.id 
                WHERE u.url='$urlType'
                ";
        return $this->loadOneRow($sql);
    }

    public function selectProductByType($urlType, $position = 0, $qty = 6)
    {
        $sql = "SELECT p.*, u2.url, c.id as id_cate, c.name as name_cate, c.id_url as url_cate   
                FROM page_url u
                INNER JOIN categories c
                ON u.id = c.id_url
                INNER JOIN products p
                ON p.id_type = c.id
                INNER JOIN page_url u2
                ON u2.id=p.id_url
                WHERE u.url='$urlType'";
        if($position >= 0 && $qty > 0){
            $sql.= " LIMIT $position, $qty";
        }
        return $this->loadMoreRow($sql);
    }

    public function selectCategories()
    {
        $sql = "SELECT c.id, c.name, count(id_type) as count 
                FROM categories c 
                INNER JOIN products p 
                ON c.id = p.id_type 
                GROUP by id_type";
        return $this->loadMoreRow($sql);
    }

    public function selectPrice()   
    {
        $sql="SELECT price FROM products";
        $countPrice = $this->loadMoreRow($sql);
        $price1 = $price2 = $price3 = $price4 = $price5 = 0;
        foreach ($countPrice as $value) {
            if (0 < $value->price AND $value->price <= 1000000) {
                $price1 += 1;
            } elseif (1000000 < $value->price AND $value->price <= 10000000) {
                $price2 += 1;
            } elseif (10000000 < $value->price AND $value->price <= 30000000) {
                $price3 += 1;
            } elseif (30000000 < $value->price AND $value->price <= 100000000) {
                $price4 += 1;
            } elseif (100000000 < $value->price) {
                $price5 += 1;
            }
        }
        $count = [
            0 => ['0 - 1.000.000',$price1],
            1 => ['1.000.000 - 10.000.000',$price2],
            2 => ['30.000.000 - 100.000.000',$price3],
            3 => ['30.000.000 - 100.000.000',$price4],
            4 => ['100.000.000 - 210.000.000',$price5]
            ];
        return $count;
    }

    public function selectSpecialProduct()
    {
        $sql = "SELECT p.id, url,SUM(quantity) as sum, p.name, p.price, p.promotion_price, p.image 
                FROM products p 
                INNER JOIN bill_detail b 
                ON p.id = b.id_product 
                INNER JOIN page_url u 
                ON p.id_url = u.id 
                GROUP BY b.id_product 
                ORDER BY SUM(quantity) DESC 
                LIMIT 2";
        return $this->loadMoreRow($sql);
    }

    function pagination($urlType,int $start){
        $display = 3;
        if(isset($_GET['p']) && filter_var($_GET['p'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
            $page = $_GET['p'];
        } else {
            // Nếu biến p không có, sẽ truy vấn CSDL để tìm xem có bao nhiêu page để hiển thị
            $q = "SELECT COUNT(page_id) FROM pages";
            $r = mysqli_query($dbc, $q);
            confirm_query($r, $q);
            list($record) = mysqli_fetch_array($r, MYSQLI_NUM);
            
            // Tìm số trang bằng cách chia số dữ liệu cho số display
            if($record > $display) {
                $page = ceil($record/$display);
            } else {
                $page = 1;
            }
        }
        
        $output = "<ul class='pagination'>";
        if($page > 1) {
            $current_page = ($start/$display) + 1;
            
            // Nếu không phải ở trang đầu (hoặc 1) thì sẽ hiển thị Trang trước.
            if($current_page != 1) {
                $output .= "<li><a href='author.php?aid={$aid}&s=".($start - $display)."&p={$page}'>Previous</a></li>";
            }
            
            // Hiển thị những phần số còn lại của trang
            for($i = 1; $i <= $page; $i++) {
                if($i != $current_page) {
                    $output .= "<li><a href='author.php?aid={$aid}&s=".($display * ($i - 1))."&p={$page}'>{$i}</a></li>";
                } else {
                    $output .= "<li class='current'>{$i}</li>";
                }
            }// END FOR LOOP
            
            // Nếu không phải trang cuối, thì hiển thị trang kế.
            if($current_page != $page) {
                $output .= "<li><a href='author.php?aid={$aid}&s=".($start + $display)."&p={$page}'>Next</a></li>";
            }
        } // END pagination section
            $output .= "</ul>";
            
            return $output;
    } // END pagination  
}





?>