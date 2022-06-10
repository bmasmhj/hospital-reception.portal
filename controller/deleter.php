<?php require 'connection.php' ?>

<?php 

if(isset($_POST['deleteuser'])){

    $id = $_POST['deleteuser'];
    $sql = "DELETE FROM users WHERE id = '$id' ";
    if ($con->query($sql)) {

        echo 'deleted';
    }
    else{
        echo 'failed';
    }
    

}
if(isset($_POST['deletedoctor'])){

    $id = $_POST['deletedoctor'];
    $sql = "DELETE FROM doctor WHERE id = '$id' ";
    if ($con->query($sql)) {

        echo 'deleted';
    }
    else{
        echo 'failed';
    }
    

}

if(isset($_POST['deleterecords'])){

    $id = $_POST['deleterecords'];
    $sql = "DELETE FROM records WHERE id = '$id' ";
    if ($con->query($sql)) {
        echo 'deleted'; 
    }
    else{
        echo 'failed';
    }
    

}
if(isset($_POST['deletepay'])){

    $id = $_POST['deletepay'];
    $sql = "DELETE FROM payment WHERE id = '$id' ";
    if ($con->query($sql)) {
        echo 'success'; 
    }
    else{
        echo 'failed';
    }
    

}


?>
