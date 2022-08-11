<?php

class Signup
{

//creating user
    public function create_user($data)
    {

        $name = ucwords($data['name']); //ucfirst() - it converts the first letter to uppercase
        $email = $data['email']; //ucwords 1st letter of word to uppercase
        $mobile = $data['number'];
        $password = $data['password'];

        $DB = new Database();

        $query = "SELECT * FROM users WHERE email='$email' OR mobile='$mobile'";

        $result = $DB->read($query);

        if ($result) {

            return false;
        } else {

            $query = "insert into users(username,email,mobile,password)
            values('$name','$email','$mobile','$password')";

            $DB->save($query);
            return true;
        }
    }

//create url

}
