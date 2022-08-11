
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark-My-Opinion</title>


</head>

<body>

    <!-- //mmo_body is the main body container  -->
    
    <div class="mmo_body_blur" id="mmo_body_blur">

    <main class="mmo_body container">


        <div class="mmo_askquestion">

                <form  method="Post" onsubmit="return check_question_submit()">
            <textarea name="question" id="text_question" cols="120" rows="1" placeholder="     Ask the Community"  onkeyup="check_val_user_question()" ></textarea>
            <button id="question-post" class="question_post">Post</button>
            <label for="" id="user_question_warning" class="user_warning"></label>
            </form>

        </div>
        <!-------------------------------question posts-------------------------------------- -->
    <?php

if ($result_question) {

    foreach ($result_question as $row) {
        $user = new User();
        $row_user = $user->get_user($row['userid']);
        include "question.php";

    }
}
?>

    </main>
</div>
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

<script src="JavaScript/proThought.js"></script>


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
