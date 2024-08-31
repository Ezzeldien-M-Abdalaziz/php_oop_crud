<?php

namespace classes;
require_once 'Connection.php';
class Product extends Connection
{
    public function getAll(){
        $query = "SELECT * FROM products";
        $result = mysqli_query($this->conn, $query);
        $products = [];
        if(mysqli_num_rows($result) > 0){
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $products;
    }

    public function getOne($id){
        $query = "SELECT * FROM products WHERE `ID` = '$id' ";
        $result = mysqli_query($this->conn, $query);
        $product = [];
        if(!empty($result)){
            $product = mysqli_fetch_assoc($result);
        }
        return $product;
    }

    public function addProduct($name , $price ,$description , $image){
        $query = "INSERT INTO products (`name`, `price`, `description`, `image`) VALUES ('$name', '$price' , '$description', '$image')";
        $result = mysqli_query($this->conn, $query);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function updateProduct($id , $name , $price ,$description, $image){
        $query = "UPDATE products set `name` = '$name' , `price` = '$price' , `description` = '$description' , `image` = '$image' WHERE `ID` = '$id' ";
        $result = mysqli_query($this->conn, $query);
        if($result){
            return true;
        }
            return false;
    }

    public function deleteProduct($id){
        $query = "DELETE FROM products WHERE `ID` = '$id' ";
        $result = mysqli_query($this->conn, $query);
        if($result){
            return true;
        }
        return false;
    }
}