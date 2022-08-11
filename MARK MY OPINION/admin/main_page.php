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
</head>
<body>

        <?php
        include "nav.php";
        ?>

    <main class="admin_func container">

        <div class="func_btn">
        
        <button onclick="document.location='main_page_question.php'" class="question">Write a Question</button>
        <button onclick="document.location='main_page_blog.php'" class="blog">Write a Blog</button>
        <button onclick="document.location='main_page_report_choices.php'" class="report">Review Reports</button>
        <button onclick="document.location='main_page_issue.php'" class="issue">Review Issues</button>
    </div>
    </main>

</body>
</html>