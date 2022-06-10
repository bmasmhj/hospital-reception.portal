<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="Home">Hospital</a>
        </div>
        <div class="sidebar-user">
        <div class="sidebar-user-picture">
            <img alt="image" src="../Hospital/assets/images/uploads/users/default.jpg">
        </div>
        <div class="sidebar-user-details">
            <div class="user-name"><?php echo $name?></div>
            <div class="user-role">
            Reception   
            </div>
        </div>
        </div>
        <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class='<?= ($activePage == 'index') ? 'active':''; ?>'>
            <a href="Home"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
        </li>

        <li class="menu-header">Records</li>
        <li  class='<?= ($activePage == 'appointment') ? 'active':''; ?>'><a href="Appointment"><i class="ion ion-clipboard"></i> Appointment </a></li>
        <li  class='<?= ($activePage == 'healthpackage') ? 'active':''; ?>'><a href="Health"><i class="ion ion-clipboard"></i> Health Packages</a></li>
        <li  class='<?= ($activePage == 'payment') ? 'active':''; ?>'><a href="Payments"><i class="ion ion-clipboard"></i> Payments </a></li>
        <li  class='<?= ($activePage == 'medical') ? 'active':''; ?>'><a href="Medical"><i class="ion ion-clipboard"></i> Meical Reports </a></li>


        <li class="menu-header">Details</li>
        <li  class='<?= ($activePage == 'user') ? 'active':''; ?>'>
                <a href="Users"><i class="ion ion-person"></i><span>Users</span></a>
        </li>
        <li  class='<?= ($activePage == 'doctors') ? 'active':''; ?>' >
            <a href="Doctors"><i class="ion ion-ios-medical"></i><span>Doctors</span></a>
        </li>
        
    </aside>
 </div>