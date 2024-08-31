<?php

namespace classes;

class Image
{
    public $name , $tmp_name , $new_name;

    public function __construct($image)
    {
        $this->name = $image['name'];
        $this->tmp_name = $image['tmp_name'];
        $ext = pathinfo($this->name, PATHINFO_EXTENSION);
        $this->new_name = uniqid().".".$ext;
    }

    function upload()
    {
        move_uploaded_file($this->tmp_name, "../images/$this->new_name");
    }

    function delete($imgName)
    {
        unlink("../images/$imgName");
    }
}