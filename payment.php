<?php require 'header.php' ?>

<link href="dist/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="dist/css/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="dist/css/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />

<div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Payments</div>
          </h1>

    <div class="section-body">
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
        <form action="" id="savenewpayment">

            <div class="row">
                <span id="messages"></span>
                <div class="col-4">
                    <input type="text" id="name" name="savepaymentname" placeholder="Name" class="form-control">
                </div>
                <div class="col-4">
                    <input type="text" id="email" name="email" placeholder="Email" class="form-control">
                </div>
                <div class="col-3">
                    <input type="number" id="price" name="price" placeholder="Price" class="form-control">
                </div>
                <div class="col-1">
                    <button type="submit" name="btnsavenewpayment" class="btn btn-rounded btn-success"> Add Data </button>
                </div>
            </div>
            </form>

        </div>
    </div>
    <div class="card">
        <div class="card-body" id="dataherepayment">

        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">

<thead>
    <tr>
        <th id="descending">Date</th>
        <th>Name</th>
        <th>Email</th>
        <th>Price</th>
        <th>Invoice</th>
        <th>Action</th>
    </tr>
</thead>
<tbody id="tabledatajere">


 
<?php 

    $paymentsql = "SELECT  * FROM payment ";
    $paymentresult = $con->query($paymentsql);
    $paymentdata = [];
    if ($paymentresult->num_rows > 0) {
      while ($paymentrow = $paymentresult->fetch_assoc()) {
          array_push($paymentdata, $paymentrow);
          }
      } 

      foreach($paymentdata as $key => $paymentdataval){
        $dateq = date_create($paymentdataval['date']);
        $date =  date_format($dateq , 'M d Y, h:i:A');
        echo
        "
        <tr id='row_".$paymentdataval['id']."'>
            <td>".$date."</td>
            <td>".$paymentdataval['name']."</td>
            <td>".$paymentdataval['email']."</td>
            <td>".$paymentdataval['price']."</td>
            <td>".$paymentdataval['invoice']."</td>
            <td ><button onclick=' deletepayment(".$paymentdataval['id'].")' class='btn btn-rounded btn-danger'>Delete </button></td>

        </tr>
        ";
        }

?>

</tbody>

</table>

        </div>
    </div>
</div>
</div>


<?php require 'footer.php' ?>

<script>
    function paymentdata(){
        // $('#dataherepayment').html('');

        $.ajax({
        url: "model/table.php",
        method: 'POST',
        data:{'paymentdata':'any'},
        success:function(data){
            $('#dataherepayment').html(data);

        }
    }); 
    }
    // paymentdata();
    atohere();


    $('#savenewpayment').on('submit', function(e) {
        // alert();
        e.preventDefault();
        const name = $('#name').val();
        const email = $('#email').val();
        const price = $('#price').val();

        if(name != '' & email != '' & price != '' ){
            $.ajax({
            url: "controller/add.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success:function(response){
                var result = $.trim(response);
                if(result == 'failed'){
                    $('#messages').html('Failed while Saving data!');
                }
                if(result == 'success'){
                    paymentdata();
                    $('#name').val("");
                    $('#email').val("");
                    $('#price').val("");
                    
                }
                else{
                    console.log(response);
                        // atohere();
                    
                }
            }
        });
        }
        if(name == '' ){
            $('#name').addClass('is-invalid');
        }
        if(email == '' ){
            $('#email').addClass('is-invalid');
        }
        if(price == '' ){
            $('#price').addClass('is-invalid');
        }
    });

    $('#name').keyup(function(){
        $('#name').removeClass('is-invalid');
    });
    $('#email').keyup(function(){
        $('#email').removeClass('is-invalid');
    });
    $('#price').keyup(function(){
        $('#price').removeClass('is-invalid');
    });


    function deletepayment(id){
            $.ajax({
            url: "controller/deleter.php",
            method: 'POST',
            data:{'deletepay': id },
            success:function(data){
                paymentdata();
            }
        }); 
    }
    function atohere(){
  setTimeout(() => {
    $('#descending').click();
  }, 300);
}


   
</script>

<script src="dist/modules/table/jquery.dataTables.min.js"></script>
<script src="dist/modules/table/dataTables.bootstrap5.js"></script>
<script src="dist/modules/table/dataTables.responsive.min.js"></script>
<script src="dist/modules/table/responsive.bootstrap5.min.js"></script>

<!-- Datatable Init js -->
<script src="dist/module/table/dataTables.buttons.min.js"></script>
<script src="dist/module/table/buttons.bootstrap5.min.js"></script>
<script src="dist/module/table/buttons.html5.min.js"></script>
<script src="dist/module/table/buttons.flash.min.js"></script>
<script src="dist/module/table/buttons.print.min.js"></script>



<script src="dist/modules/table/demo.datatable-init.js"></script>
<script src="reception.js"></script>
