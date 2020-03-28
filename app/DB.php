<?php
namespace App;

class DB{
    protected $db_host;
    protected $username;
    protected $password;
    protected $db_name;
 
    public function connect(){

        $db_host = "localhost";
        $username = "root";
        $password = "";
        $db_name = "todo";

        // Create connection
        $conn = new \mysqli($db_host, $username, $password,$db_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}