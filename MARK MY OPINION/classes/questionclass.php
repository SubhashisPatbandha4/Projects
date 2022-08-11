<?php
class Question{
    private $error="";
    public function create_question($userid,$data)
    {
        if(!empty($data['question']))
        {
            $question=addslashes($data['question']);//to escape any spacial character
            

            $query="insert into question (userid,post) values ('$userid','$question')";
            $DB= new Database();
            $DB->save($query);//inserting question into database    


        }
        else{
                $this->error .="please type some thing to post!<br>";
        }
        return $this->error;
    }

    public function get_question($id){

        $query="select * from question where userid = '$id' order by postid desc ";
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