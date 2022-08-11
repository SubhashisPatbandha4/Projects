<!-- --------------------------------------------------------------------blog section-------------------------------------- -->
<a href="profile-blog.php?id=<?php

echo $row_user['userid'];

?>">

<div class="mmo_blog_body mmo_question_answer_body ">


   <!-- --------------------------------------------------------------------profile-------------------------------------- -->
                <?php

if (file_exists($row_user['profile_image'])) {
    ?>
                    <img style="border-radius:50% ;width:40px;height:40px;border:solid 2px blueviolet; margin-left:-5px;" src="<?php echo $row_user['profile_image']; ?>
                    " alt="">
                <?php
} else {?>
                    <img style="border-radius:50% ;width:40px;height:40px;border:solid 2px blueviolet; margin-left:-5px;" src="uploads/default.png" alt="">
                <?php
}

?>


                    <span style="color:blue;font-style:italic;font-size:15px;font-family:cursive;">
                        <?php echo "posted by @" . $row_user['username']; ?>


 </a>
                </span>
                    <!--------------------------------------------------------------------------- date---------------------- -->
                <span style="color:blueviolet;font-size:14px;float:right;font-weight:bolder;word-spacing:5px;">
                    <?php
echo $row['date'];
?>
                </span>









<!-- ----------------------------------------blog posting------------------------------------------- -->

<div class="mmo_blog_heading mmo_question  text-center">
<?php
echo htmlspecialchars($row['blog_heading']); //htmlspecialchars() -> treats every thing as strings (HTML escaping)
?>
</div>

<div class="mmo_user_blog mmo_user_answer ">

    <div class="user_space">

        <div class="user_useranswer">
        <?php
echo htmlspecialchars($row['blog_value']); //htmlspecialchars() -> treats every thing as strings (HTML escaping)
?>

        </div>

        <div class=" user_blog_interaction user_interaction ">
            <!-- <button class="upvote">👍 <span class="count">11</span></button> -->
            <!-- <button class="downvote">👎 <span class="count">5</span></button> -->
            <button class="comments" onclick="blockFunction(<?php echo $row['blogid'] ?>)"><b>Comments</b></button>
            <?php
                   if(isset($_POST['report-blog'])){
                    $report=new Report();
                    $report->create_report_blog($_POST);
                    unset($_POST['report-blog']);
                    echo ("<script>window.location='timeline-blog.php';</script>");
                   }
            ?>

            
            <form method="post">   
                <input type="hidden" name="bid" value="<?php echo $row['blogid'];?>"> 
            <button class="report" name="report-blog" >Report!</button>
            </form>
      
        </div>
<!-- --------------------------------------blog comment section-------------------------------------------------- -->
        <div class="user_comment" id="user_comment_<?php echo $row['blogid'] ?>">

                <?php

if (isset($_POST['blog_comment_post'])) {

// print_r($_POST['comment_blog']);

    if (!empty($_POST['comment_blog']))
    
    {
    $comment = new Comment();
    $result = $comment->create_comment_blog($_POST);
    unset($_POST);
    // header('location:timeline-question.php');
    echo ("<script>window.location='timeline-blog.php';</script>");

}

}

    ?>

            <div class="user_comment_answer">
                <form action="" method="post" onsubmit="return check_blog_comment_post(<?php echo $row['blogid'];?>);">
                <input type="hidden" name="bid" value="<?php echo $row['blogid']; ?>">
                <textarea name="comment_blog"id="blog-comment" id="blog-comment<?php echo $row['blogid']; ?>" cols="120" rows="1" placeholder="Add your comment" onkeyup="check_blog_comment(<?php echo $row['blogid'];?>)"></textarea>
              <br>  <input type="submit" value="Post" name="blog_comment_post" id="blog-comment-button">
              <label for="" id="blog_comment_warning<?php echo $row['blogid']; ?>" class="user_warning"></label>

                </form>
            </div>
            <!-- --------------------displaying comment -->
            <?php
$comment = new Comment();
    $comment_data = $comment->get_comment_blog($row['blogid']);
    if ($comment_data) {

        foreach ($comment_data as $comment_row) {

            $userid=$_SESSION['myopinion_userid'];
            $blogid= $row['blogid'];
            $commentid=$comment_row['comment_id'];
             $query="select * from report_blog_comment where userid='$userid' and blogid='$blogid' and commentid='$commentid' limit 1";
             $DB=new Database();
             $report=$DB->read($query);
             if($report)
             {
                 continue;
             }
    






            ?>

            <div class="user_comment_space user_space">
                <div class="user_username">
                    <a href=""><span><?php
echo $comment_row['username'];

            ?></span></a> say's
                </div>

                <div class="user_useranswer">
                <?php
echo $comment_row['answer'];

            ?>
                </div>

                <div class="user_interaction">
                    <!-- <button class="upvote">👍 <span class="count">  -->
                        <?php
// echo $comment_row['upvote'];

            ?></span></button>
                    <!-- <button class="downvote">👎 <span class="count"> -->
                         <?php
// echo $comment_row['downvote'];

            ?></span></button>

            <?php
                   if(isset($_POST['report-blog-comment'])){
                    $report=new Report();
                    $report->create_report_blog_comment($_POST);
                    unset($_POST['report-blog-comment']);
                    echo ("<script>window.location='timeline-blog.php';</script>");
                   }
            ?>

                    <form method="POST">
                        <input type="hidden" name='bid' value="<?php echo $row['blogid'];?>">
                        <input type="hidden" name='cid' value="<?php echo $comment_row['comment_id'];?>">
                    <button class="report" name="report-blog-comment">Report!</button>
                    </form>
                </div>
            </div>
            <?php

        }}

    ?>

        </div>

    </div>
</div>

</div>


