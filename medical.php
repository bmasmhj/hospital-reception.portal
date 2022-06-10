<?php require 'header.php';

 ?>
 <style>
     .modal{
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        overflow : scroll !important;
     }
     .modal-dialog{
        max-width : 50% !important;
        margin : 9rem auto !important;
     }
     #reportimage{
         width: 100%!important;
     }

 </style>
<link href="dist/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="dist/css/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
<div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Medical Reports</div>
            <button onclick='addreportform()' class='btn btn-success float-right'>Add Report</button>

          </h1>

    <div class="section-body">
      <div class="card">
        <div class="card-body">

       
      <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
              <th>S.N</th>
                <th>Date</th>
                <th>Patient Name</th>
                <th>Report</th>
                <th>Record Name</th>
                <th>Detail</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recordsdata as $key => $report) {
                $sn = $key+1;
             ?>

            <tr id='row_<?php echo $report['id']?>'>
            <td><?php echo $sn?></td>
                <td><?php echo $report['time'] ?></td>
                <td id='patienname_<?php echo $report['id']?>'><?php echo $report['patientname']?></td>
                <td>
                  <img onclick="viewimg(<?php echo $report['id']?>)" id='imagesrc_<?php echo $report['id']?>' class='data-record' src='../Hospital/assets/images/uploads/reports/<?php echo $report['imageofrecord']?>' alt='<?php echo $report['imageofrecord']?>'/>
                </td>
                <td id='nameofrecord_<?php echo $report['id']?>'><?php echo $report['nameofrecord']?></td>
                <td id='detail_<?php echo $report['id']?>'><?php echo $report['detail']?></td>
                <td id='messange_<?php echo $report['id']?>'><?php echo $report['message']?></td>
                <td>
                    <button  class='btn btn-info m-0 p-2' onclick="editrecords(<?php echo $report['id']?>)"><h6 class='p-0 m-0 ion-edit text-white'></h6></button>
                    <button  class='btn btn-danger m-0 p-2' onclick="removemedicalreport(<?php echo $report['id']?>)">
                    <h6 class='p-0 m-0 ion-trash-b text-white'></h6></button>  </td>
            </tr>
                <?php } ?>
        </tbody>
      </table>
      </div>
      </div>
      
</div>
<div class="modal" id="preview">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id='meidcalreportname'></h4>
        <button type="button" onclick="closemodel()" class="btn ion ion-close-round" ></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body" id='medicalreportimage'>
              
      
      </div>
    </div>
  </div>
</div>
<div class="modal" id="editrecordform">
<div class='modal-dialog' style='display:block'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h4 class='modal-title'>Edit Reports</h4>
          <h5 id='alerts'></h5>
          <button type='button' onclick='closemodel()' class='btn ion ion-close-round' ></button>
        </div>
        <!-- Modal body -->
        <div class='modal-body'>
            <form method='post' enctype='multipart/form-data' novalidate id='patienteditform' data-index-number=''>
              <input type='text' class='form-control mb-3' id='patientnames' name='patientname' value='' required placeholder='Patient Name'>
              <input type='text' class='form-control mb-3' id='imageurl' name='imageurl' hidden value='' required placeholder='imagepath'>
              <input type='text' class='form-control mb-3' id='id' name='id' hidden value='' required placeholder='id'>
              <input type='text' class='form-control mb-3' id='checkupfors' name='checkupforrecords' value='' required placeholder='Checkup for'>
              <input type='file' class='form-control mb-3' name='reportimages' required >
              <textarea class='form-control mb-3' required id='reportdetailss'  name='detail' placeholder='Detail'></textarea>
              <textarea class='form-control mb-3' required id='reportmessages'  name='message' placeholder='Message'></textarea>
              <button type='submit' name='editrecorddetail' value='updaterecordsnow' class='btn btn-success'>Update</button>
            </form>
        </div>
      </div>
    </div>
</div>

<div class="modal" id="reportformmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Reports</h4>
        <h5 id='alert'></h5>
        <button type="button" onclick="closeform()" class="btn ion ion-close-round" ></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
          <form method="post" enctype="multipart/form-data" novalidate id='patientreportform'>
            <input type="text" class='form-control mb-3' id='patientname' name='patientname' required placeholder='Patient Name'>
            <input type="text" class='form-control mb-3' id='checkupfor' name='checkupfor' required placeholder='Checkup for'>
            <input type="file" class='form-control mb-3' name='reportimage' required >
            <textarea class='form-control mb-3' required id='reportdetails' name='detail' placeholder='Detail'></textarea>
            <textarea class='form-control mb-3' required id='reportmessage' name='message' placeholder='Message'></textarea>
            <button type='submit' class='btn btn-success'>Save</button>
          </form>
      </div>
    </div>
  </div>
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
