
<?php
session_start();
include "classes/autoload.php";
//posting starts from here

$query="select * from report_issue order by reportid desc";
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main_body_nav.css">
    <link rel="stylesheet" href="CSS/main_body_func.css">
    <link rel="stylesheet" href="CSS/main_issue.css">
</head>
<body>

<?php
        include "nav.php";
        ?>


    <div class="question_head">
        Review Issues
    </div>
<?php

if ($allreports) {

    foreach ($allreports as $row) {
      

?>

    <main class="user_report container">

        <div class="report_box">
            <div class="user_name">
                <?php echo $row['username'];?>
            </div>

            <div class="user_content">
            <?php echo $row['reportvalue'];?>
            </div>

            <div class="admin_action">
                <!-- <button>🗑Delete</button> -->
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                      if(isset($_POST['solved']))
                      {
                        $reportid=$_POST['rid'];
                        $query="delete from report_issue where reportid ='$reportid'";
                        $db=new Database();
                        $result=$db->delete($query);
                        if($result){
                            echo"<script>alert('report deleted fom report_issue table');</script>";
                            header("Location:main_page_issue.php");
                        }else
                        {
                            
                            echo"<script>alert('error');</script>";
                        }
                      }
                      unset($_POST);
                    
                    }
                
                ?>
                <form method="post">
                    <input type="hidden" name="rid" value="<?php echo $row['reportid'];?>">
                <button name="solved" type="submit" value="solved">🤞Solved🤟</button>
                </form>
            </div>
        </div>

    </main>

    <?php
    }}
    ?>