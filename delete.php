<?php
use \classes\Product;
use \classes\Session;
require_once "classes/Product.php";
require_once "classes/Session.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $product=new Product();

    if($product->deleteProduct($id)){
        header("location:index.php");
    }else{
        $session = new Session();
        $session->setSession("error","Failed to delete product");
    }
}