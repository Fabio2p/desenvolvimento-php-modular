<?php 
defined("_EXEC") or die("Restricted Access!");

class Articles extends Dbo{

    public function showArticles(){

        return $this->select('title_product,published,created','my_system_products');

        $this->close();
    }
}
?>