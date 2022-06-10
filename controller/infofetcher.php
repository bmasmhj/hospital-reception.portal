<?php 

require 'connection.php';

$doctorsql = "SELECT  s.name as speciality,  d.*
FROM doctor d
JOIN speciality s
ON d.specialityid = s.id
ORDER BY d.name
";
$doctorresult = $con->query($doctorsql);
$doctordata = [];
if ($doctorresult->num_rows > 0) {
while ($doctorrow = $doctorresult->fetch_assoc()) {
array_push($doctordata, $doctorrow);
}
}	

  $usersql = "SELECT  * FROM users ORDER BY id desc  ";
    $userresult = $con->query($usersql);
    $userdata = [];
    if ($userresult->num_rows > 0) {
      while ($userrow = $userresult->fetch_assoc()) {
          array_push($userdata, $userrow);
      }
  }	

  $appointmentsql = "SELECT  * FROM appointment ORDER BY id desc ";
  $appointmentresult = $con->query($appointmentsql);
  $appointmentdata = [];
  if ($appointmentresult->num_rows > 0) {
    while ($appointmentrow = $appointmentresult->fetch_assoc()) {
        array_push($appointmentdata, $appointmentrow);
        }
    }   

    $bookedpkgsql = "SELECT  * FROM bookedpkg ORDER BY id desc  ";
  $bookedpkgresult = $con->query($bookedpkgsql);
  $bookedpkgdata = [];
  if ($bookedpkgresult->num_rows > 0) {
    while ($bookedpkgrow = $bookedpkgresult->fetch_assoc()) {
        array_push($bookedpkgdata, $bookedpkgrow);
        }
    }  
    
    $paymentsql = "SELECT  * FROM payment ORDER BY id desc  ";
    $paymentresult = $con->query($paymentsql);
    $paymentdata = [];
    if ($paymentresult->num_rows > 0) {
      while ($paymentrow = $paymentresult->fetch_assoc()) {
          array_push($paymentdata, $paymentrow);
          }
      }  
      
    $recordssql = "SELECT  * FROM records ORDER BY id desc ";
    $recordsresult = $con->query($recordssql);
    $recordsdata = [];
    if ($recordsresult->num_rows > 0) {
      while ($recordsrow = $recordsresult->fetch_assoc()) {
          array_push($recordsdata, $recordsrow);
          }
      }  
    



?>

<?php 

$user_sql = "SELECT COUNT(id) FROM users ";
$doctor_sql = "SELECT COUNT(id) FROM doctor ";
$appointment_sql = "SELECT COUNT(id) FROM appointment ";
$booked_sql = "SELECT COUNT(id) FROM bookedpkg ";





$user_result = mysqli_query($con,$user_sql);
$doctor_result = mysqli_query($con,$doctor_sql);
$appointment_result = mysqli_query($con,$appointment_sql);
$booked_result = mysqli_query($con,$booked_sql);




$user_row = mysqli_fetch_array($user_result);
$booked_row = mysqli_fetch_array($booked_result);
$appointment_row = mysqli_fetch_array($appointment_result);
$doctor_row = mysqli_fetch_array($doctor_result);



$user_count = $user_row[0];
$appointment_count = $appointment_row[0];
$booked_count = $booked_row[0];

$doctor_count = $doctor_row[0];


?>
