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




            <!-- Next Blog -->

        <?php
if ($result_blog) {
// print_r($result_blog);
    foreach ($result_blog as $row) {
        $user = new User();
        $row_user = $user->get_user($row['userid']);
        include "blog.php";
    }
}

?>

            <!-- next blog -->






        </main>

    </div>


    <div class="blog_post_show container" id="blog_post_show">

    <form  method="Post">
        <div class="blog_title">
            <textarea name="blog_heading" id="" cols="100" rows="1" placeholder="    Blog Title Goes Here"></textarea>
        </div>

        <div class="blog_content">
            <textarea name="blog_value" id="" cols="120" rows="16" placeholder="Blog Content Goes Here"></textarea>
        </div>

        <button>Post</button>
    </form>
    </div>




























    <script>
        function toggle_blur() {
            let blur = document.getElementById('mmo_body_blur');
            blur.classList.toggle('active');

            let show= document.getElementById('blog_post_show');
            show.classList.toggle('active');
        }
    </script>

<script>

function blockFunction() {
    let x = document.getElementById('user_comment');

    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>

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
