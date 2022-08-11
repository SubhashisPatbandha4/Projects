<?php
class Blog{
    private $error="";
    public function create_blog($userid,$data)
    {
        if(!empty($data['blog_heading']) && !empty($data['blog_value']))
        {
            $blog_heading=addslashes($data['blog_heading']);//to escape any spacial character
            $blog_value=addslashes($data['blog_value']);//to escape any spacial character
            

            $query="insert into blogs (userid,blog_heading,blog_value) values ('$userid','$blog_heading','$blog_value')";
            $DB= new Database();
            $DB->save($query);//inserting question into database    


        }
        else{
                $this->error .="please type some thing to post!<br>";
        }
        return $this->error;
    }

    public function get_blog($id){

        $query="select * from blogs where userid = '$id' order by blogid desc ";
        $DB= new Database();
      $result=  $DB->read($query);//reading from question table
        if($result){
            return $result;
        }
        else{
            return false;
        }
    }
    

}
?>