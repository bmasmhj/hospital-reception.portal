<?php require 'header.php' ?>
<link href="dist/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="dist/css/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
<div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>User Details</div>
          </h1>

    <div class="section-body">
      <div class="card">
        <div class="card-body">

       
      <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Sex</th>
                <th>DOB</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
            require 'controller/infofetcher.php';
            foreach($userdata as $key => $userdet) {?>
            <tr id='tr_<?php echo $userdet['id']?>'>
                <td>
                  <img class='data-imge' src='../Hospital/assets/images/uploads/users/<?php echo $userdet['image']?>'/>
                  <span id='name_<?php echo $userdet['id']?>'> <?php echo $userdet['name']?> </span>
                </td>
                <td><?php echo $userdet['address']?></td>
                <td><?php echo $userdet['phone']?></td>
                <td><?php echo $userdet['email']?></td>
                <td><?php echo $userdet['sex']?></td>
                <td><?php echo $userdet['age']?></td>
                <td>
                  <?php 
                  $status = $userdet['status']; 
                  $statusc = ( $status == 'verified') ?  'success' : 'danger' ;?>

                  <h4 class="badge badge-<?php echo $statusc?>"><?php echo $userdet['status']?>
                </h4></td>
                <td>
                  <h4 class='ion ion-trash-b text-danger' onclick="deleteuser(<?php echo $userdet['id']?>)"></h4> 

                </td>


            </tr>
            <?php } ?>
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
