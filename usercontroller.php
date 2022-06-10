<?php 
session_start();
require 'controller/infofetcher.php';

if(isset($_SESSION['receptionuser']) && isset($_SESSION['password'])){
    require 'controller/connection.php';
    $username = $_SESSION['receptionuser'];
    $password = $_SESSION['password'];
    $usernames = base64_decode($username);
    $chewckuser = "SELECT * FROM cashier WHERE username = '$username'";
        $res = mysqli_query($con, $chewckuser);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $name = $fetch['name'];
                $status = $fetch['status'];
                if($status === 'newacc'){
                    $sql = "UPDATE cashier SET status = 'new' WHERE username = '$username' ";
                    if ($con->query($sql)) {
                         header('Location: Profile');
                    }

                }
            }else{
                session_start();
                session_unset();
                session_destroy();
                header('Location: LOGIN');
            }
        }else{
            session_start();
            session_unset();
            session_destroy();
            header('Location: LOGIN');
       
        }
}
else{
    header('Location: LOGIN');
}

?>