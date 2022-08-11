
<?php

class Login
{

    private $error = "noerror";

    public function evaluate($data)
    {

        $email = $data['log-email']; 
        $password = $data['log-password'];

        $query = "select * from admin where email = '$email' limit 1;"; 

        $DB = new Database();
        $result = $DB->read($query);

        if ($result) {

            $row = $result[0]; 
            if ($password == $row['password']) { 

                $_SESSION['admin_userid'] = $row['userid']; 
                $this->error = "SUCCESS";

            } else {
                $this->error = "PASSWORD ERROR";
            }
        } else {
            $this->error = "EMAIL ERROR";
        }

        // echo $this->error;

        return $this->error;

    }

    //it will
    public function check_login($id)
    {
        if (is_numeric($id)) 
        {
            $query = "select * from users where userid='$id' limit 1";

            $DB = new Database();
            $result = $DB->read($query);

            if ($result) 
            {
                $user_data=$result[0];
                return $user_data;
            } else 
            {
                header("Location:index.php");
                die;
            }

        }
        else 
        {
            header("Location:index.php");
            die;
        }

    }
}

?>