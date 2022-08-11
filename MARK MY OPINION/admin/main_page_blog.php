
<?php
session_start();
include "classes/autoload.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $blog = new Blog();
    $id = $_SESSION['admin_userid'];
    $result = $blog->create_blog($id, $_POST);

    if($result==""){
        header("Location:main_page_blog.php");
        die;
    }
   
}

// print_r($result_blog);
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
    <link rel="stylesheet" href="CSS/main_blog.css">
</head>
<body>

<?php
        include "nav.php";
        ?>


    <div class="question_head">
        Write a Blog
    </div>

    <div class="admin_blog " id="blog_post_show">
        <form method="post">
        <div class="blog_title">
            <textarea name="blog_heading" id="" cols="100" rows="1" placeholder="    Blog Title Goes Here"></textarea>
        </div>

        <div class="blog_content">
            <textarea name="blog_value" id="" cols="120" rows="16" placeholder="Blog Content Goes Here"></textarea>
        </div>

        <button>Post</button>
        </form>
    </div>