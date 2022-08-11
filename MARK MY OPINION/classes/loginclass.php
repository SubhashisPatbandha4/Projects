
<?php

class Login
{

    private $error = "noerror";

    public function evaluate($data)
    {

        $email = $data['log-email']; //adaslashes is used for escaping special characters
        $password = $data['log-password'];

        $query = "select * from users where email = '$email' limit 1;"; //limit to one row which is matched,the first one

        // echo $query;
        // return $query;
        $DB = new Database();
        $result = $DB->read($query);

        if ($result) {

            $row = $result[0]; //$row contains all the information about matched result(email)
            if ($password == $row['password']) { //result row's password column
                //create a sesson data   //$_SESSION is a global variable

                //to use session we have to fist start session_start();

                //$_SESSION - is a array[] of information , $_SESSION['myopinion_userid']->Here 'myopinion_userid' is a memory location(index number)
                $_SESSION['myopinion_userid'] = $row['userid']; //creating a location in memory called sesssion['userid']
                //  adding user id of selected row to session

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