<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register :: E-Valuation</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
		<!--<img src="images/logo.png" alt="evaulaton"/>-->
        <h1>E-Valuation</h1>
      </div>
      <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Faculty Registration</h3>
            <div class="tile-body">
              <form class="form-horizontal" action="register2.php" method="POST">
                <div class="form-group row">
                  <label class="control-label col-md-3">Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="uname" name="uname" placeholder="Enter full name" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Address</label>
                  <div class="col-md-8">
                      <textarea class="form-control" id="address" name="address" placeholder="Enter address" required></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Gender</label>
                  <div class="col-md-8">
                      <input class="form-check-inline" type="radio" id="gender" name="gender" value="Male"> Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input class="form-check-inline" type="radio" id="gender" name="gender" value="Female"> Female        
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">College ID</label>
                  <div class="col-md-8">
                      <select class="form-control" id="collegeId" name="collegeId" required>
                          <option value="#">Select College ID</option>
                          <?php
                               include('..//config.php');
                               $results = $mysqli->query("SELECT collegeId FROM college");
                               while($row=$results->fetch_array()){
                                   echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                               }	
                          ?>
                      </select>
                  </div>
                </div>  
                <div class="form-group row">
                  <label class="control-label col-md-3">Department</label>
                  <div class="col-md-8">
                      <select class="form-control" id="department" name="department" required>
                          <option value="#">Select Department</option>
                          <?php
                               include('..//config.php');
                               $results = $mysqli->query("SELECT name FROM department");
                               while($row=$results->fetch_array()){
                                   echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                               }	
                          ?>
                      </select>
                  </div>
                </div> 
                <div class="form-group row">
                  <label class="control-label col-md-3">Designation</label>
                  <div class="col-md-8">
                      <select class="form-control" id="designation" name="designation" required>
                          <option value="#">Select Designation</option>
                          <?php
                               include('..//config.php');
                               $results = $mysqli->query("SELECT name FROM designation");
                               while($row=$results->fetch_array()){
                                   echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                               }	
                          ?>
                      </select>
                  </div>
                </div>   
		<div class="form-group row">
                  <label class="control-label col-md-3">Email</label>
                  <div class="col-md-8">
                    <input class="form-control" type="email" id="uemail" name="uemail" placeholder="Enter email address" required>
                  </div>
                </div>
		<div class="form-group row">
                  <label class="control-label col-md-3">Phone</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="uphone" name="uphone" placeholder="Enter phone number" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Username</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="username" name="username" placeholder="Enter username" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Password</label>
                  <div class="col-md-8">
                    <input class="form-control" type="password" id="passwd" name="passwd" placeholder="Enter password" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Conform Password</label>
                  <div class="col-md-8">
                    <input class="form-control" type="password" id="cpasswd" name="cpasswd" placeholder="Enter conform password" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">User Picture</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" id="hfile" name="hfile">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-8 col-md-offset-3">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" required>I accept the terms and conditions
                      </label>
                    </div>
                  </div>
                </div>

            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="login.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              </div>
            </div>
	</form>
	</div>
	</div>
        </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>