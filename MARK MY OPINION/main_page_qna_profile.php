
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark-My-Opinion</title>


</head>

<body>

<div class="mmo_body_blur" id="mmo_body_blur">


    <main class="mmo_body">

        <!-- //mmo_question_answer_body is the container which contains the question and different answers of //different users -->

        <!-------------------------------question posts-------------------------------------- -->
    <?php

    
if ($result_question) { //result_question contains all the questions of the the logged in USER  

   

    foreach ($result_question as $row) {  //row points to the 1st index of $result_question
        $user=new User();
        $row_user=$user->get_user($row['userid']);  //row_user contains all the information of loggedin USER
        include "question_2.php";

    }
}

?>
    </main>
</div>
</body>

</html>
