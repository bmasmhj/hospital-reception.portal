<?php require 'header.php';
 ?>

<link href="dist/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="dist/css/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
<div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Booked Health Packages</div>
          </h1>

    <div class="section-body">
      <div class="card">
        <div class="card-body">

       
      <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th>Booking Date</th>
                <th>Name</th>
                <th>Address</th>
                <th>Package</th>
                <th>Age</th>
                <th>Sex</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookedpkgdata as $key => $appoint) {
              
             ?>
            <tr>
                <td><?php echo $appoint['date']?></td>
                <td><?php echo $appoint['name']?></td>
                <td><?php echo $appoint['address']?></td>
                <td><?php echo $appoint['pkgcode']?></td>
                <td><?php echo $appoint['age']?></td>
                <td><?php echo $appoint['sex']?></td>
                <td><button  class='btn btn-success m-0 p-2' onclick="viewhealthpkg(<?php echo $appoint['id']?>)"><h4 class='p-0 m-0 ion-ios-eye text-white'></h4></button>  </td>
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

<!-- Datatable Init js -->
<script src="dist/modules/table/demo.datatable-init.js"></script>
<script src="reception.js"></script>