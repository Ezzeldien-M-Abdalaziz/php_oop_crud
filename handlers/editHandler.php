<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


use classes\Image;
use classes\Product;
use classes\Validation;
use classes\Session;

require_once '../classes/Product.php';
require_once '../classes/Validation.php';
require_once '../classes/Image.php';
require_once '../classes/Session.php';

if(isset($_POST['submit'])){
    $name = trim(htmlspecialchars($_POST['name']));
    $price = trim(htmlspecialchars($_POST['price']));
    $description = trim(htmlspecialchars($_POST['desc']));
    $img = $_FILES['image'];

    //objects
    $session = new Session();
    $product = new Product();
    $validation = new Validation();
    $image = new Image($img);


    //validations
    $validation->validateName($name);
    $validation->validatePrice($price);
    $validation->validateDesc($description);
    $validation->validateImage($img);



    if(!empty($validation->errors)) {
        $session->setSession('errors', $validation->errors);
    }
    else {
        $image->upload();
        if ($product->updateProduct($_GET['id'], $name, $price, $description, $image->new_name)) {
            $session->setSession('pass', "Product updated successfully");
        } else {
            echo "Failed to update product.";
        }
    }


    header('location: ../edit.php');
    exit();

}
else{
    header('Location: ../edit.php');
    exit();
}