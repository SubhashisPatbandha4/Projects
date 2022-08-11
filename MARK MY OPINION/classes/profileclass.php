<?php

class Profile{
    function get_profile($id){

        $id=addslashes($id);//variable asceping to avoid sql injection
        $DB=new Database();
        $query="select * from users where userid='$id' limit 1";
        $data=$DB->read($query);
        return $data;
    }
}


















?>