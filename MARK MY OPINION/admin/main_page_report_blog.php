<?php
session_start();
include "classes/autoload.php";
//posting starts from here

$query="select * from report_blog order by reportid desc";
$db=new Database(); 
$allreports=$db->read($query);
// print_r($allreports);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin MMO</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main_body_nav.css">
    <link rel="stylesheet" href="CSS/main_body_func.css">
    <link rel="stylesheet" href="CSS/main_report.css">
</head>

<body>

<?php include "nav.php";?>

    <div class="question_head">
        Review Blogs
    </div>

    <?php
    if ($allreports) {

foreach ($allreports as $row) {
   $userid= $row['userid'];
  $user=new User();

    $user= $user->get_data($userid);

//   print_r($user);
  $blog_id= $row['blogid'];
  $query2="select * from blogs where blogid='$blog_id'";
  $blog= $db->read($query2);



?>
    <main class="user_report container">

        <div class="report_box">
        <div class="mmo_blog_body mmo_question_answer_body ">
        <div class="user_username">
          posted by <a href=""><span><?php echo "@".$user['username']."  ";?></span></a>
        </div>

<div style="border:purple solid 3px;font-size:20px;font-weight:bolder;" class="mmo_blog_heading mmo_question  text-center">
<?php echo $blog[0]['blog_heading'];?>
</div>

<div class="mmo_user_blog mmo_user_answer ">

    <div class="user_space">


        <div class="user_useranswer">
        <?php echo $blog[0]['blog_value'];?>
        </div>

    </div>
</div>
<?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $reportid=$_POST['rid'];
                        $blogid=$_POST['bid'];
                      if(isset($_POST['ignore']))
                      {
                       
                        $query="delete from report_blog where reportid ='$reportid'";
                        $result=$db->delete($query);
                        if($result){
                            echo"<script>alert('report deleted from report_question_comment table');</script>";
                            header("Location:main_page_report_blog.php");
                        }else
                        {
                            
                            echo"<script>alert('error');</script>";
                        }
                      }
                    //   unset($_POST);
                      if(isset($_POST['delete']))
                      {
                                               
                        $query="delete from report_blog where reportid ='$reportid'";
                        $result=$db->delete($query);
                        if($result){
                            echo"<script>alert('report deleted from report_question_comment table');</script>";
                            header("Location:main_page_report_blog.php");
                        }else
                        {
                            
                            echo"<script>alert('error');</script>";
                        }






                        
                        $query="delete from blogs where blogid ='$blogid'";
                        $result=$db->delete($query);
                        if($result){
                            echo"<script>alert('report deleted from comments table');</script>";
                            header("Location:main_page_report_blog.php");
                        }else
                        {
                            
                            echo"<script>alert('error');</script>";
                        }
                      }
                      unset($_POST);

                    
                    }
                
                ?>
<form method="post">
            <div class="admin_action">
           
            <input type="hidden" name="bid" value="<?php echo $blog[0]['blogid'];?>">
            <button name="delete" type="submit">🗑Delete</button>
               
            <input type="hidden" name="rid" value="<?php echo $row['reportid'];?>">
            <button name="ignore" type="submit">🤞Its alright</button>
            
            </div>
        </div>
</form>
    </main>

    <?php
}}
?>