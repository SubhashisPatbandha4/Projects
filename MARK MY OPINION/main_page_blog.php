<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark-My-Opinion</title>



    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/main_page_body.css">

    <link rel="stylesheet" href="CSS/main_page_scrollbar.css">

    <link rel="stylesheet" href="CSS/main_page_nav.css">

    <link rel="stylesheet" href="CSS/main_page_body_blog.css">
    <link rel="stylesheet" href="CSS/main_page_user_issue_blog.css">

    <style>
        body {
            height: 100vh;

            background-image: linear-gradient(#ffffff, #9ae02a);


            /* background-image: linear-gradient(#5aff15,#00b712); */
        }
    </style>
</head>

<body>

<div class="mmo_body_blur" id="mmo_body_blur">
        <main class="mmo_body container">

            <div class="mmo_blog_post mmo_askquestion">
                <!-- <textarea class="mmo_textarea" name="" id="" cols="120" rows="1" placeholder="     Write a blog"></textarea> -->
                <button class="question_post blog_post" onclick="toggle_blur()">Write a Blog</button>

            </div>


            <!-- Next Blog -->

        <?php
if ($result_blog) {
// print_r($result_blog);
    foreach ($result_blog as $row) {
        
        $user = new User();
        $row_user = $user->get_user($row['userid']);

        $userid=$_SESSION['myopinion_userid'];
        $blogid= $row['blogid'];
         $query="select * from report_blog where userid='$userid' and blogid='$blogid' limit 1";
         $DB=new Database();
         $report=$DB->read($query);
         if($report)
         {
             continue;
         }


        include "blog.php";
    }
}

?>

            <!-- next blog -->






        </main>

   


    

    </div>

    <div class="blog_post_show container" id="blog_post_show">

        <form  method="Post" onsubmit="return check_blog_submit()">
        <div class="blog_title">
            <textarea name="blog_heading" id="blog_title" onkeyup="check_val_user_blog_title()" cols="100" rows="1" placeholder="    Blog Title Goes Here"></textarea>
            <label for="" id="user_blog_title_warning" class="user_warning"></label>

        </div>

        <div class="blog_content">
            <textarea name="blog_value" id="blog_content" onkeyup="check_val_user_blog_content()" cols="120" rows="16" placeholder="Blog Content Goes Here"></textarea>
            <label for="" id="user_blog_content_warning" class="user_warning"></label>

        </div>

        <button>Post</button>
        </form>
    </div>
    <script>
        function toggle_blur2() {
            let blur = document.getElementById('mmo_body_blur');
            blur.classList.toggle('active');

            let show = document.getElementById('user_issue');
            show.classList.toggle('active');
        }
    </script>

    <script>
        function toggle_blur() {
            let blur = document.getElementById('mmo_body_blur');
            blur.classList.toggle('active');

            let show= document.getElementById('blog_post_show');
            show.classList.toggle('active');
        }
    </script>

<script>

function blockFunction(id) {
    let x = document.getElementById('user_comment_'+id);
    console.log('user_comment_'+id);
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>
<script src="JavaScript/proThought.js"></script>

    <script>
        const textArea = document.querySelector('.mmo_textarea')
        function handleResize() {
            this.style.height = 'auto'

            this.style.height = this.scrollHeight + 'px'

        }
        textArea.addEventListener('input', handleResize)
    </script>


    <script>
        document.body.style.overflow = "hidden";
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
        crossorigin="anonymous"></script>
</body>

</html>
