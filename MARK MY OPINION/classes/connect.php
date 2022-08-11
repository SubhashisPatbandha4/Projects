<?php

class Database
{

    //setting up db----------------------------------------
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "markmyopinion_db";

    public function connect()
    { //connetion function----------------------------------------- {
        $connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        return $connection;
        
    }
    public function read($query)
    { //read function-------------------------------------------------- {
        $conn = $this->connect();
        $result = mysqli_query($conn, $query);

        if ($result == false) {
            return false;
        } else {
            $data = false;
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        }

    }
    public function save($query)
    { //save function------------------------------------------------------------ {
        $conn = $this->connect();
        $result = mysqli_query($conn, $query);

        if ($result == false) {
            return false;
        } else {
            return true;
        }
    }
    public function update($query)
    { //save function------------------------------------------------------------ {
        $conn = $this->connect();
        $result = mysqli_query($conn, $query);

        if ($result == false) {
            return false;
        } else {
            return true;
        }
    }

}

