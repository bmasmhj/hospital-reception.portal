<?php 
// echo '<pre>';
// print_r($_POST);
// print_r($_FILES);
require 'connection.php';
if(isset($_POST['patientname'])){
    $ptname = $_POST['patientname'];
    $checkupfor = $_POST['checkupfor'];
    $detail = $_POST['detail'];
    $message = $_POST['message'];

    $md = $name.$checkupfor.$detail.$message;

    $invoice = md5($md);
    // echo $name.'<br>'.$checkupfor.'<br>'.$detail.'<br>'.$message.'<br>'.$invoice;

    if (isset($_FILES['reportimage'])) {
        $tmpFilePath = $_FILES['reportimage']['tmp_name'];
        if ($tmpFilePath != ""){
          $maxsize = 524288895959;
          $extsAllowed = array( 'jpg', 'jpeg', 'png' );
          $uploadedfile = $_FILES['reportimage']['name'];
          $extension = pathinfo($uploadedfile, PATHINFO_EXTENSION);
          if (in_array($extension, $extsAllowed) ) {
            $newpicture = uniqid();
            $url = $newpicture.$uploadedfile ;
            $name = "../../Hospital/assets/images/uploads/reports/".$url;
            $result = move_uploaded_file($_FILES['reportimage']['tmp_name'], $name);
            $imageofrecord = $url;
          }
      }
    }
    else{
        $imageofrecord = 'default.png';
    }

    $insert = "INSERT INTO `records` (`patientname`, `invoice`, `nameofrecord`, `detail`, `message`, `imageofrecord`) VALUES 
    ('$ptname','$invoice','$checkupfor','$detail','$message','$imageofrecord');";

    if ($con->query($insert)) {
        echo 'success';
    }
    else{
        die("Update failed $con->error");

    }

}

else if(isset($_POST['savepaymentname'])){
    $name = $_POST['savepaymentname'];
    $email = $_POST['email'];
    $price = $_POST['price'];

    $md = $name.$email.$price;
    $invoice = md5($md);
    $sql = "INSERT INTO `payment`(`name`, `email`, `invoice`, `price`) VALUES ('$name' , '$email' , '$invoice' , '$price')";
    if ($con->query($sql)) {
	    $date = date("Y-m-d");
        $visitsql = "SELECT  * FROM rich WHERE date = '$date' ";
        $visitresult = $con->query($visitsql);
        $visitdata = [];
        if ($visitresult->num_rows > 0) {
            mysqli_query($con,"update rich set moneytoday = moneytoday+'$price' where date='$date'");
            echo 'success'; 

        }
        else{
            $fe = "SELECT  * FROM rich ORDER BY id desc limit 1";
            $visitresult = $con->query($fe);
            $visitdata = [];
            if ($visitresult->num_rows > 0) {
                while ($visitrow = $visitresult->fetch_assoc()) {
                    $ptv = $visitrow['moneytoday'];
                }
            }
            // mysqli_query($con,"update post set  lastupdate = '$date' , views=newview , newview = 0 ");
            $visitsql = "INSERT INTO rich (`date`, `money`, `moneytoday`) VALUES ('$date','$ptv','0')";
                if ($con->query($visitsql)){ 
                 echo 'success'; 

            } else {
                die("Category creation failed $connection->error");
            }
        }
    }            
    else{
        die("Update failed $con->error");

    }


}

?>