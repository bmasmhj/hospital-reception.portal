<?php $profile = "true"; ?>
<?php require 'header.php' ?>
<div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Profile</div>
          </h1>

    <div class="section-body">
        <div class="container">
          <div class="row">
            <div class="col-md-5 offset-md-3">
              <div class="card">
                <div class="card-body">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="fullname" placeholder="Name" value="<?php echo $name?>" aria-label="Name" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-success" id="updatename" type="button">Update</button>
                    </div>
                  </div>
                  <input type="text" disabled class="form-control mb-3" value="<?php echo $usernames?>">
                  </form>
                  <form method="post" id="updatepass" >
                      <label>Change Password</label>
                      <input type="password" id="oldpw" name="oldpw" class="form-control mb-3" placeholder="Old Password">
                      <input type="password" id='newpw'name="newpw" class="form-control mb-3" placeholder="New Password">
                      <input type="password" id='cnewps' name="cnewps" class="form-control mb-3" placeholder="Confirm Password">
                      <span id="stat" class="text-danger"></span> <br>
                      <input type="submit" class="btn btn-success" value="Change Password" name="changepass">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </section>
<?php require 'footer.php' ?>
<script src="reception.js"></script>