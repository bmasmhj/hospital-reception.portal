  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->

<?php 
require 'controller/connection.php';

if(isset($_POST['viewapoint'])){
	$id = $_POST['viewapoint'];


  $appointmentsql = "SELECT  * FROM appointment  WHERE id = '$id' ";
  $appointmentresult = $con->query($appointmentsql);
  $appointmentdata = [];
  if ($appointmentresult->num_rows > 0) {
    while ($appointmentrow = $appointmentresult->fetch_assoc()) {

$name = $appointmentrow['fullname'];
$docname = $appointmentrow['docname'];
$department = $appointmentrow['department'];
$reason = $appointmentrow['reason'];
$date = $appointmentrow['appointdate'];
$email = $appointmentrow['docname'];
$address = $appointmentrow['address'];
$age = $appointmentrow['age'];
$phone = $appointmentrow['phone'];
$gender = $appointmentrow['gender'];
$invoice = $appointmentrow['invoice'];
$status = $appointmentrow['status'];




    	echo '<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">'.$name.'</h4>
        <button type="button" onclick="closemodel()" class="btn ion ion-close-round" ></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <ul class="list-group">
      <li class="list-group-item "><strong>Invoice :</strong> '.$invoice.'</li>
        <li class="list-group-item "><strong>Address :</strong> '.$address.'</li>
        <li class="list-group-item"><strong>Email :</strong> '.$email.'</li>
        <li class="list-group-item"><strong>Age :</strong> '.$age.'</li>
        <li class="list-group-item"><strong>Gender :</strong> '.$gender.'</li>
        <li class="list-group-item"><strong>Number :</strong> '.$phone.'</li>
        <li class="list-group-item"><strong>Status :</strong> '.$status.'</li>
        <li class="list-group-item"><strong>Doctor :</strong> '.$docname.'</li>
        <li class="list-group-item"><strong>Department :</strong> '.$department.'</li>
        <li class="list-group-item"><strong>Date :</strong> '.$date.'</li>
        <li class="list-group-item"><strong>Reason :</strong> '.$reason.'</li>
      </ul>
      </div>
    </div>
  </div>';
        
        }
    }  
 	

}
?>

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->

  <?php 

if(isset($_POST['viewhealth'])){
	$id = $_POST['viewhealth'];

  $pkgsql = "SELECT  * FROM bookedpkg  WHERE id = '$id' ";
  $pkgresult = $con->query($pkgsql);
  $pkgdata = [];
  if ($pkgresult->num_rows > 0) {
    while ($pkgrow = $pkgresult->fetch_assoc()) {

      $name = $pkgrow['name'];
      $address = $pkgrow['address'];
      $date = $pkgrow['date'];
      $department = $pkgrow['pkgcode'];
      $email = $pkgrow['email'];
      $age = $pkgrow['age'];
      $phone = $pkgrow['num'];
      $gender = $pkgrow['sex'];
      $invoice = $pkgrow['invoice'];





    	echo '<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">'.$name.'</h4>
        <button type="button" onclick="closemodel()" class="btn ion ion-close-round" ></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <ul class="list-group">
      <li class="list-group-item "><strong>Invoice :</strong> '.$invoice.'</li>
        <li class="list-group-item "><strong>Address :</strong> '.$address.'</li>
        <li class="list-group-item"><strong>Email :</strong> '.$email.'</li>
        <li class="list-group-item"><strong>Age :</strong> '.$age.'</li>
        <li class="list-group-item"><strong>Gender :</strong> '.$gender.'</li>
        <li class="list-group-item"><strong>Number :</strong> '.$phone.'</li>
        <li class="list-group-item"><strong>Department :</strong> '.$department.'</li>
        <li class="list-group-item"><strong>Date :</strong> '.$date.'</li>
      </ul>
      </div>
    </div>
  </div>';
        
        }
    }  
 	

}
?>

<?php 

if(isset($_POST['viewdoctordetail'])){
	$id = $_POST['viewdoctordetail'];

  $doctorsql = "SELECT  s.name as speciality,  d.*
    FROM doctor d
    JOIN speciality s
    ON d.specialityid = s.id
    WHERE d.id = '$id'
    ";
  $docresult = $con->query($doctorsql);
  $docdata = [];
  if ($docresult->num_rows > 0) {
    while ($docrow = $docresult->fetch_assoc()) {

      $name = $docrow['name'];
      $username = $docrow['username'];
      $email = $docrow['email'];
      $image = $docrow['image'];
      $speciality = $docrow['speciality'];
      $gender = $docrow['sex'];
      $stime =  date('H:i', strtotime($docrow['scheduletimestart']));
      $etime =  date('H:i', strtotime($docrow['scheduletimeend']));
      $starting = $docrow['scheduledaystart']; 
      $closing =  $docrow['scheduledaayend'];

    	echo '<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Doctor Detail</h4>
        <button type="button" onclick="closemodel()" class="btn ion ion-close-round" ></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <div class="card-body text-center">
          <img class="rounded-circle m-2" src="../Hospital/assets/images/uploads/doctors/'.$image.'" alt="" style="width: 150px; height: 150px; object-fit: cover;">
          <h3>Dr.'.$name.'</h3>
          <span>'.$speciality.'</span>
      </div>
      <div class="card-body text-center">
        <h3 class="text-primary">OPD Scheule</h3>
        <hr>
        <ul class="list-group">
        <li class="list-group-item "><strong> Days : </strong>'.$starting.' to '.$closing.'</li>
        <li class="list-group-item "><strong> Time : </strong>'.$stime.' - '.$etime.'</li>
        </ul>
    </div>
    <div class="card-body">
    <h6 class="text-danger pt-3">EDUCATION & TRAINING</h6>
    <hr>
    <ul class="doc-list">
                                
                            
    ';

        $educationsql = "SELECT  * FROM education WHERE docid = $id ORDER BY rand()  ";
        $educationresult = $con->query($educationsql);
        $educationdata = [];
        if ($educationresult->num_rows > 0) {
          while ($educationrow = $educationresult->fetch_assoc()) {
            $edu = $educationrow['description'];
              echo "<li>".$edu."</li>";
          }
      }	
  echo'
  </ul>
  </div>
  <div class="card-body">
  <h6 class="text-danger pt-3">WORK EXPERIENCE</h6>
  <hr>
  <ul class="doc-list">                  
  ';

      $workexperiencesql = "SELECT  * FROM workexperiene WHERE docid = $id ORDER BY rand()  ";
      $workexperienceresult = $con->query($workexperiencesql);
      $workexperiencedata = [];
      if ($workexperienceresult ->num_rows > 0) {
        while ($workexperiencerow = $workexperienceresult->fetch_assoc()) {
          $wrk = $workexperiencerow['description'];
            echo "<li>".$wrk."</li>";
        }
    }	


echo'
</ul>
</div>';

  echo'
  </div>
    </div>
  </div>';
        
        }
    }

 	

}
?>