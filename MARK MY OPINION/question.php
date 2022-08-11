<!-- css -->




<!-- --------------------------------------------------------------------question section-------------------------------------- -->
<a href="profile-question.php?id=<?php

echo $row_user['userid'];

?>">
<div class="mmo_question_answer_body">
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


                    <span style="color:blue;font-size:15px;font-family:roboto;">
                        <?php echo "posted by @" . $row_user['username']; ?>


                        </a>
                </span>
                    <!--------------------------------------------------------------------------- date---------------------- -->
                <span style="color:blueviolet;font-size:14px;float:right;font-weight:bolder;word-spacing:5px;">
                    <?php
                echo $row['date'];
                ?>
                </span>
                <!-- ----------------------------------------------------------------------question posted-------------------------- -->
                <div class="mmo_question">
                    <?php
                echo htmlspecialchars($row['post']); //htmlspecialchars() -> treats every thing as strings (HTML escaping)
                ?>
                </div>


                <!-- ------------------------------------comment inserting----------------- -->
                <?php
                if (isset($_POST['post_comment'])) {

                    if (!empty($_POST['comment']))
                    // var_dump($_POST);
                     {
                    $comment = new Comment();
                    $result = $comment->create_comment($_POST);
                unset($_POST);
                // header('location:timeline-question.php');
                echo ("<script>window.location='timeline-question.php';</script>");


                }

            }

                    ?>


                <div class="mmo_user_post">
                    <form action="" method="post" onsubmit="return check_question_comment_post(<?php echo $row['postid'];?>);">
                        <input type="hidden" name="qid" value="<?php echo $row['postid']; ?>">
                        <textarea class="mmo_textarea" name="comment" id="text_answer<?php echo $row['postid']; ?>" cols="80" rows="1" placeholder="Share your thoughts" onkeyup="check_question_comment(<?php echo $row['postid'];?>)"></textarea>
                        <input type="submit" value="Post" name="post_comment" class="question_post">
                        <label for="" id="user_answer_warning<?php echo $row['postid']; ?>" class="user_warning"></label>
                    </form>
                </div>
                <!-----------------------------------comment displaying----------------- -->
                <?php
                    $comment = new Comment();
                    $comment_data = $comment->get_comment($row['postid']);
                    if ($comment_data) {

                        foreach ($comment_data as $comment_row) 
                        {
                            $userid=$_SESSION['myopinion_userid'];
                           $questionid= $row['postid'];
                          $commentid= $comment_row['comment_id'];
                            $query="select * from report_question_comment where userid='$userid' and questionid='$questionid' and commentid='$commentid'";
                            $DB=new Database();
                            $report=$DB->read($query);
                            if($report)
                            {
                                continue;
                            }

                            ?>
                             <div class="mmo_user_answer">

                                 <div class="user_space">
                            <div class="user_username">
                                <a href=""><span><?php  echo  $comment_row['username'] ;      ?></span></a> say's
                                <div style="float:right;color:brown;font-size:10px;"><?php  echo  $comment_row['date'] ;      ?></div>
                            </div>

                            <div class="user_useranswer">
                            <?php  echo htmlspecialchars($comment_row['answer']);      ?>
                            </div>

                            <div class="user_interaction">
                                <button class="upvote<?php  echo  $comment_row['comment_id'] ;      ?>">👍 <span class="count<?php  echo  $comment_row['comment_id'] ;      ?>"><?php  echo  $comment_row['upvote'] ;      ?></span></button>
                                <button class="downvote<?php  echo  $comment_row['comment_id'] ;      ?>">👎 <span class="count<?php  echo  $comment_row['comment_id'] ;      ?>"><?php  echo  $comment_row['downvote'] ;?></span></button>
                            <?php
                            if(isset($_POST['report'])){
                                $report=new Report();
                                $report->create_report_question_comment($_POST);
                                unset($_POST['report']);
                                echo ("<script>window.location='timeline-question.php';</script>");
                    
                            }
                            ?>
                   
                                <form  method="post" id="report_btn">
                                    <input type="hidden" name="qid" value="<?php echo $row['postid'];?>" >
                                    <input type="hidden" name="cid" value="<?php echo $comment_row['comment_id'];?>" >
                                    <button class="report"  name="report">Report!</button>
                                    </form>       
                                
                                
                                
                                </div>

                            </div>

                            </div>


                            <script>
        let upvote = document.querySelector(".upvote<?php  echo  $comment_row['comment_id'] ;      ?>");
        let like = document.querySelector(".count_u<?php  echo  $comment_row['comment_id'] ;      ?>");

        let downvote = document.querySelector(".downvote<?php  echo  $comment_row['comment_id'] ;      ?>");
        let dislike = document.querySelector(".count_d<?php  echo  $comment_row['comment_id'] ;      ?>");

        let clicked = false;
        let dclicked = false;

        const li = parseInt(like.textContent);
        const di = parseInt(dislike.textContent);

        upvote.addEventListener("click", () => {
            if (!clicked) {
                clicked = true;
                like.textContent++;
                
                <?php
                    $db=new Database();
                    $upvote_inc=$comment_row['upvote']+1;
                    $id=$comment_row['comment_id'];
                    $query="update comments set upvote='$upvote_inc' where comment_id='$id'";
                    $db->update($query);
                ?>
                upvote.classList.toggle('active');
                downvote.classList.remove('active');
                if (dclicked == true) {
                    let temp = dislike.textContent;
                    if (temp == di + 1) {
                        dislike.textContent--;
                        <?php
                    $db=new Database();
                    $downvote_dec=$comment_row['downvote']-1;
                    $id=$comment_row['comment_id'];
                    $query="update comments set downvote='$downvote_dec' where comment_id='$id'";
                    $db->update($query);
                ?>
                        dclicked = false;
                    }
                }
            }

            else {
                alert("hello");
                clicked = false;
                like.textContent--;
                <?php
                    $db=new Database();
                    $upvote_dec=$comment_row['upvote']-1;
                    $id=$comment_row['comment_id'];
                    $query="update comments set upvote='$upvote_dec' where comment_id='$id'";
                    $db->update($query);
                ?>
            }
        })



        downvote.addEventListener("click", () => {
            if (!dclicked) {
                dclicked = true;
                dislike.textContent++;
                <?php
                    $db=new Database();
                    $downvote_inc=$comment_row['downvote']+1;
                    $id=$comment_row['comment_id'];
                    $query="update comments set downvote='$downvote_inc' where comment_id='$id'";
                    $db->update($query);
                ?>
                downvote.classList.toggle('active');
                upvote.classList.remove('active');

                if (clicked == true) {
                    let temp = like.textContent;
                    if (temp == li + 1) {
                        like.textContent--;
                        <?php
                    $db=new Database();
                    $upvote_dec=$comment_row['upvote']-1;
                    $id=$comment_row['comment_id'];
                    $query="update comments set upvote='$upvote_dec' where comment_id='$id'";
                    $db->update($query);
                ?>
                        clicked = false;
                    }
                }

            }

            else {
                dclicked = false;
                dislike.textContent--;
                <?php
                    $db=new Database();
                    $downvote_dec=$comment_row['downvote']-1;
                    $id=$comment_row['comment_id'];
                    $query="update comments set downvote='$downvote_dec' where comment_id='$id'";
                    $db->update($query);
                ?>
            }
        })


    </script>












                            <?php











                         }
    }
    else{

        echo "
        <p style='color:blueviolet;font-family:tohma;font-size:20px;text-align:center;'>
        No answers yet
        </p>
        
        ";
    }
    ?>
</div>




