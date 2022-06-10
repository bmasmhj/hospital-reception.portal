<?php require 'header.php';

 ?>

<link href="dist/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="dist/css/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
<div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Appointment Details</div>
          </h1>

    <div class="section-body">
      <div class="card">
        <div class="card-body">

       
      <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th>Appointment Date</th>         
                <th>Name</th>
                <th>Address</th>
                <th>Doctor</th>
                <th>Age</th>
                <th>Sex</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointmentdata as $key => $appoint) {
            
             ?>
            <tr id='appointmenttable_<?php echo $appoint['id']?>'>
               <td><?php echo $appoint['appointdate']?></td>
                <td><?php echo $appoint['fullname']?></td>
                <td><?php echo $appoint['address']?></td>
                <td><?php echo $appoint['docname']?></td>
                <td><?php echo $appoint['age']?></td>
                <td><?php echo $appoint['gender']?></td>

                <?php if($appoint['status']=='pending') {?>
                <td><h4 class="badge badge-warning"><?php echo $appoint['status']?></h4></td>
                <td> 
                    <button onclick="cancelit(<?php echo $appoint['id']?>)"  class='btn btn-danger'>Cancel <i class='ion ion-close-round text-white'></i></button>  
                    <button onclick="acceptit(<?php echo $appoint['id']?>)"  class='btn btn-success'>Accept <i class='ion ion-checkmark-round text-white'></i></button> 


                <?php }else if($appoint['status']=='accepted'){?>

                <td><h4 class="badge badge-success"><?php echo $appoint['status']?></h4></td>
                <td> <button onclick="cancelit(<?php echo $appoint['id']?>)"  class='btn btn-danger'>Cancel <i class='ion ion-close-round text-white'></i></button> 

                <?php }else if($appoint['status']=='cancelled'){ ?>
                <td><h4 class="badge badge-danger"><?php echo $appoint['status']?></h4></td>
                 <td>   
                <button onclick="acceptit(<?php echo $appoint['id']?>)"  class='btn btn-success'>Accept <i class='ion ion-checkmark-round text-white'></i></button> 

                <?php }else{ ?>
                    <td><h4 class="badge badge-success"><?php echo $appoint['status']?></h4></td>
                    <td>
                <?php } ?>
                <button  class='btn btn-success m-0 p-2' onclick="viewappointment(<?php echo $appoint['id']?>)"><h4 class='p-0 m-0 ion-ios-eye text-white'></h4></button>  </td>
            </tr>
            <?php  } ?>
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

<!-- Datatable Init js -->
<script src="dist/modules/table/demo.datatable-init.js"></script>
<script src="reception.js"></script>