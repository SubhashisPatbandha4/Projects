<?php
class Comment
{
    private $error = "";
    // ------------------------------------------------coment
    public function create_comment($data)
    {
        if (!empty($data['comment'])) {

            $userid = $_SESSION['myopinion_userid'];

            $user = new User();
            $user_data = $user->get_user($userid);
            $username = $user_data['username'];
            $qid = $data['qid'];
            $comment = addslashes($data['comment']);
            $query = "insert into comments (user_id,username,	question_id	,answer	)values('$userid','$username','$qid','$comment') ";
            $DB = new Database();
            $result = $DB->save($query);

        } else {
            $this->error = "Please type your opinion.<br>";
        }
        return $this->error;
    }

    public function get_comment($question_id)
    {
        $query="select * from comments where question_id='$question_id' order by comment_id desc";
        $DB = new Database();
        $result = $DB->read($query);
        return $result;

    }
    // ----------------------------------------blog comment
    public function create_comment_blog($data)
    {
        if (!empty($data['comment_blog'])) {

            $userid = $_SESSION['myopinion_userid'];

            $user = new User();
            $user_data = $user->get_user($userid);
            $username = $user_data['username'];
            $bid = $data['bid'];
            $comment = addslashes($data['comment_blog']);
            $query = "insert into comment_blog (user_id,username,blog_id,answer)values('$userid','$username','$bid','$comment') ";
            $DB = new Database();
            $result = $DB->save($query);

        } else {
            $this->error = "Please type your opinion.<br>";
        }
        return $this->error;
    }

    public function get_comment_blog($blog_id)
    {
        $query="select * from comment_blog where blog_id='$blog_id' order by comment_id desc";
        $DB = new Database();
        $result = $DB->read($query);
        return $result;

    }
}
