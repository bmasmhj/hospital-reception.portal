<?php 

require 'controller/connection.php';

if(isset($_POST['receptionuser'])){
    $username = $_POST['receptionuser'];
    $password = $_POST['password'];

    $userconvert = base64_encode($username); 

    $chewckuser = "SELECT * FROM cashier WHERE username = '$userconvert'";
        $res = mysqli_query($con, $chewckuser);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            $fetch_name = $fetch['name'];
            if(password_verify($password, $fetch_pass)){
                session_start();
                $_SESSION['receptionuser'] = $userconvert;
                $_SESSION['password'] = $password;
                echo "success";
            }else{
                echo "wronguser";
            }
        }else{
            echo "nouser";
        }
    // $encpass = password_hash($password, PASSWORD_BCRYPT);
}
?>