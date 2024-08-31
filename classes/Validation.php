<?php

namespace classes;

class Validation
{
    public $errors = [];
    public function validateName($name)
    {
        if(empty($name)){
            $this->errors['name'] = "Name cannot be empty";
            return false;
        }
        elseif (!filter_var($name, FILTER_VALIDATE_REGEXP , ["options" => ["regexp" => "/^[a-zA-Z\s]+$/"]])) {
            $this->errors['name'] = "Invalid name format";
            return false;
        }
        return true;
    }

    public function validateDesc($decription)
    {
        if(empty($decription)){
            $this->errors['description'] = "Description cannot be empty";
            return false;
        }
        return true;
    }

    public function validatePrice($price){
        if(empty($price)){
            $this->errors['price'] = "Price cannot be empty";
            return false;
        }elseif (!is_numeric($price)){
            $this->errors['price'] = "Price must be a number";
            return false;
        }
        return true;
    }

    public function validateImage($image){
        if(empty($image['name'])){
            $this->errors['image'] = "Image cannot be empty";
            return false;
        } elseif ($image['size'] > 1000000) {
            $this->errors['image'] = "Image is too big";
            return false;
        }
        return true;
    }

}