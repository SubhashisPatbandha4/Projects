<?php
session_start();
include "classes/autoload.php";
//posting starts from here

$query = "select * from report_blog_comment order by reportid desc";
$db = new Database();
$allreports = $db->read($query);
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
        Review Blog Comments
    </div>

    <?php
if ($allreports) {

    foreach ($allreports as $row) {
        $userid = $row['userid'];
        $user = new User();

        $user = $user->get_data($userid);

//   print_r($user);
        $comment_id = $row['commentid'];
        $query2 = "select * from comment_blog where comment_id='$comment_id'";
        $comment = $db->read($query2);

        ?>
    <main class="user_report container">

        <div class="report_box">
            <div class="user_name">
                <?php echo $user['username'];?> say's
            </div>

            <div class="user_content">
                <?php echo $comment[0]['answer']?>
            </div>
            <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $reportid = $_POST['rid'];
            $commentid = $_POST['cid'];
            if (isset($_POST['ignore'])) {

                $query = "delete from report_blog_comment where reportid ='$reportid'";
                $result = $db->delete($query);
                if ($result) {
                    echo "<script>alert('report deleted from report_blog_comment table');</script>";
                    header("Location:main_page_report_blog_comment.php");
                } else {

                    echo "<script>alert('error');</script>";
                }
            }
            //   unset($_POST);
            if (isset($_POST['delete'])) {

                $query = "delete from report_blog_comment where reportid ='$reportid'";
                $result = $db->delete($query);
                if ($result) {
                    echo "<script>alert('report deleted from report_blog_comment table');</script>";
                    header("Location:main_page_report_blog_comment.php");
                } else {

                    echo "<script>alert('error');</script>";
                }

                $query = "delete from comment_blog where comment_id ='$commentid'";
                $result = $db->delete($query);
                if ($result) {
                    echo "<script>alert('report deleted from comment_blog table');</script>";
                    header("Location:main_page_report_blog_comment.php");
                } else {

                    echo "<script>alert('error');</script>";
                }
            }
            unset($_POST);

        }

        ?>



<form method="post">
            <div class="admin_action">
            <input type="hidden" name="cid" value="<?php echo $comment[0]['comment_id'];?>">

                <button name="delete" type="submit">🗑Delete</button>
                <input type="hidden" name="rid" value="<?php echo $row['reportid'];?>">

              
                <button name="ignore" type="submit">🤞Its alright</button>
            </div>
                </form>
        </div>

    </main>

    <?php
}}
?>