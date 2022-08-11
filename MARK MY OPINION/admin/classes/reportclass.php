<?php
class Report{
    public function create_report_question_comment($data)
    {            
            $userid=$_SESSION['myopinion_userid'];
           $questionid= $data['qid'];
           $commentid= $data['cid'];
            $query="insert into report_question_comment (userid,questionid,commentid) values ('$userid','$questionid','$commentid')";
            $DB= new Database();
            $DB->save($query);  

    }
    public function create_report_blog($data)
    {            
            $userid=$_SESSION['myopinion_userid'];
            $blogid= $data['bid'];
            $query="insert into report_blog (userid,blogid) values ('$userid','$blogid')";
            $DB= new Database();
            $DB->save($query);  

    }
    public function create_report_blog_comment($data)
    {            
            $userid=$_SESSION['myopinion_userid'];
            $blogid= $data['bid'];
            $commentid= $data['cid'];
            $query="insert into report_blog_comment (userid,blogid,commentid) values ('$userid','$blogid','$commentid')";
            $DB= new Database();
            $DB->save($query);  

    }

}
?>