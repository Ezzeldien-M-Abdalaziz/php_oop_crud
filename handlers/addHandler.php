<?php

use classes\Image;
use classes\Product;
use classes\Validation;
use classes\Session;

require_once '../classes/Product.php';
require_once '../classes/Validation.php';
require_once '../classes/Image.php';
require_once '../classes/Session.php';

if(isset($_POST['submit'])) {
    $name = trim(htmlspecialchars($_POST['name']));
    $price = trim(htmlspecialchars($_POST['price']));
    $description = trim(htmlspecialchars($_POST['desc']));
    $img = $_FILES['img'];

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
        if ($product->addProduct( $name, $price, $description, $image->new_name)) {
            $session->setSession('pass', "Product updated successfully");
        } else {
            echo "Failed to update product.";
        }
    }


    header('location: ../add.php');
    exit();

}
else{
    header('Location: ../add.php');
    exit();
}