
    <nav class="mmo_nav">
      <a href="timeline-question.php">  <div class="nav_brand">
            <img src="image/logo2.png" alt="">
        </div>
        </a>
        <div class="nav_content_switch">
            <button onclick="document.location='timeline-question.php'" class="qna">Questions/Thoughts </button>
            <button onclick="document.location='timeline-blog.php'" class="blog">Blogs</button>
        </div>

        <!-- // here i am using bootstrap drop down cuz i am lazy -->
        <div style="margin-left:-0px;" class="dropdown nav_extra">
            <button type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
            <img style="border-radius:50% ;width:65px;height:65px;border:solid 2px blueviolet;margin-left:-5px;" src="
          
             <?php //profile image
            if (file_exists($user_data['profile_image'])) {
                echo $user_data['profile_image'];
            
            }else{
                echo "uploads/default.png";
            }
            ?>
      
            
            " alt="">
            </button>
            <div class="dropdown-menu dropdown-menu-right nav_extra_links">
            <a class="dropdown-item" href="logout.php">Logout</a>
                <a class="dropdown-item" href="profile-blog.php?id=<?php echo $_SESSION['myopinion_userid'];?>">Profile</a>
                <a class="dropdown-item" href="about.php">About Us</a>
                <a class="dropdown-item" onclick="toggle_blur2()">Report an issue</a>
                <!-- <a class="dropdown-item" href="index.php">landing page</a> -->
                
            </div>
        </div>

        <div class="nav_search">
            <form class="form-inline my-2 my-lg-0" method="get" action="timeline-blog.php">
                <input name='find-blog' class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
                <button class=" my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

    </nav>
    <?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['issue_submit'])){
        if(!empty($_POST['issue_content'])){
            $user=new User();
            $data=$user->get_data($_SESSION['myopinion_userid']);
        //    print_r($data);
        $userid=$data['userid'];
        $username=$data['username'];
        $report=$_POST['issue_content'];
        
            $query="insert into report_issue (userid,username,reportvalue) values ('$userid','$username','$report')";
            $db=new Database();
            $db->save($query);
        }
        else{
            echo"<script>alert('please fill up the report box');</script>";
        }
            }
   }

?>



        <!-- report an issue  -->
        <div class="user_issue container" id="user_issue">
        <button class="exit_issue" onclick="toggle_blur2()">❌</button>
        <form method="post">
        <textarea name="issue_content" id="user_issue_content" cols="80" rows="12" placeholder="Tell us about your issue"
            class="user_issue_content"></textarea>
        <button name="issue_submit" type="submit" class="issue_submit">Send To Developers</button>
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