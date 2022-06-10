<div class="row mt-4">
    <div class="col-12 col-sm-6 col-lg-3">
    <div class="card card-sm-4">
        <div class="card-icon bg-primary">
        <i class="ion ion-ios-medical"></i>
        </div>
        <div class="card-wrap">
        <div class="card-header">
            <h4>Total Doctors</h4>
        </div>
        <div class="card-body">
        <?php echo $doctor_count?>

        </div>
        </div>
    </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
    <div class="card card-sm-4">
        <div class="card-icon bg-danger">
        <i class="ion ion-person"></i>
        </div>
        <div class="card-wrap">
        <div class="card-header">
            <h4>Total Users</h4>
        </div>
        <div class="card-body">
            <?php echo $user_count?>
        </div>
        </div>
    </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
    <div class="card card-sm-4">
        <div class="card-icon bg-warning">
        <i class="ion ion-ios-paper-outline"></i>

        </div>
        <div class="card-wrap">
        <div class="card-header">
            <h4>Appointments</h4>
        </div>
        <div class="card-body">
        <?php echo $appointment_count?>
        </div>
        </div>
    </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
    <div class="card card-sm-4">
        <div class="card-icon bg-dark">
        <i class="ion ion-document-text"></i>
        </div>
        <div class="card-wrap">
        <div class="card-header">
            <h4>Book Packages</h4>
        </div>
        <div class="card-body">
         <?php echo $booked_count?>
        </div>
        </div>
    </div>
    </div>
</div>
