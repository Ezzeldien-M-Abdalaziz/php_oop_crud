<?php

namespace classes;

class Connection
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "Route_project";
    protected $conn;
    public function __construct(){
        $this->conn  = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
    }

}