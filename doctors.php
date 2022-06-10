<?php require 'header.php' ?>
<style>
     .modal{
        overflow : scroll !important;
     }
     .modal-dialog{
        margin : 9rem auto !important;
     }

 </style>
<link href="dist/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="dist/css/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
<div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Doctors Details</div>
          </h1>

    <div class="section-body">
      <div class="card">
        <div class="card-body">

       
      <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Sex</th>
                <th>Schedule Days</th>
                <th>Schedule Time</th>
                <th>Speciality</th>
                <th>Status</th>


                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
           require 'controller/infofetcher.php';
         $today = date('w'); // today 
            // echo $today.'<br>' ;
            date_default_timezone_set("Asia/Kathmandu");
                $now = date("H:i" );
                // echo $now ;
            foreach($doctordata as $key => $docname){ 
                $stime =  date('H:i', strtotime($docname['scheduletimestart']));
                $etime =  date('H:i', strtotime($docname['scheduletimeend']));
                $timea =  date('h:i A', strtotime($docname['scheduletimestart']));
                $timeb =  date('h:i A', strtotime($docname['scheduletimeend']));
                // echo $now;  
                if($stime === $etime ){
                  $stat = "Not Set";
                  $color = "info";
              }else {

                if($now > $stime && $now < $etime){
                    $starting = $docname['scheduledaystart']; //opening day
                    $closing =  $docname['scheduledaayend']; //closing day
                    $openday = date("w", strtotime($starting));  //coverting to number 
                    $closeday = date("w", strtotime($closing));  // coverting to number 
                    //checking if closing day is greater than opening day 
                    if($openday < $closeday ){ 
                        //checking if today lies starting and closing day
                          if($today > $openday && $today <= $closeday ){ 
                            $stat = 'Available';  //if today lies between starting day and ending day then available
                            $color = 'success';
                          }
                          else{  
                            $stat = 'Not Available'; //else not available
                            $color = 'danger';
                          }
                    }
                    // if closing day is less than opening day 
                    else{  
                      //checking if today lies between opening day and friday
                      if($today > $openday && $today <=  6 ){ 
                        $stat = 'Available';   
                        $color = 'success';
                      }
                      //checking if today lies between sunday and closeday
                      else if( $today > 0 &&  $today <= $closeday ){   
                        $stat = 'Available';    
                        $color = 'success';
                      }
                      else{
                            $color = 'danger';
                            $stat = 'Not Available';  // else not available
                      }
                    }
               
                }else{
                        $color = 'danger';
                        $stat = 'Not Available'; 
                }
              }
              ?> 

                <tr id='tr_<?php echo $docname['id']?>'>
                  <td onclick="viewdoctordetail(<?php echo $docname['id']?>)" style='cursor:pointer'>
                  <img class='data-imge' src='../Hospital/assets/images/uploads/doctors/<?php echo $docname['image'] ?>' />
                   <span id="name_<?php echo $docname['id']?>"> <?php echo ucfirst($docname['name'])?> </span></td>
                  <td><?php echo $docname['email']?></td>
                  <td><?php echo ucfirst($docname['sex'])?></td>
                  <td><?php echo strtoupper($docname['scheduledaystart'].' - '.$docname['scheduledaayend'])?></td>
                  <td><?php echo $timea.' - '.$timeb?></td>
                  <td><?php echo $docname['speciality']?></td>
                  <td><h4 class="badge badge-<?php echo $color?>"><?php echo $stat?></h4></td>
                  <td><h4 class='ion ion-trash-b text-danger' onclick="deletedoctor(<?php echo $docname['id']?>)"></h4> </td>
              </tr>
            <?php
            }

    ?>
        </tbody>
      </table>
      </div>
      </div>
</div>
<div class="modal" id="preview">
  
</div>


</section>
</div>
<?php require 'footer.php' ?>
<!-- Datatables js -->
<script src="dist/modules/table/jquery.dataTables.min.js"></script>
<script src="dist/modules/table/dataTables.bootstrap5.js"></script>
<script src="dist/modules/table/dataTables.responsive.min.js"></script>
<script src="dist/modules/table/responsive.bootstrap5.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Datatable Init js -->
<script src="dist/modules/table/demo.datatable-init.js"></script>
<script src="reception.js"></script>
