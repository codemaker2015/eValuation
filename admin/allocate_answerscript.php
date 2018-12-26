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
    <title>Paper Allocation :: E-Valuation</title>
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
            <h3 class="tile-title">Answer Script Allocation</h3>
            <div class="tile-body">
                <form class="form-horizontal" action="allocate_answerscript2.php" method="POST">
                <div class="form-group row">
                  <label class="control-label col-md-3">Script No</label>
                  <div class="col-md-8">
                      <select class="form-control" id="scriptno" name="scriptno" required>
                          <option value="#">Select Script No</option>
                          <?php
                               include('..//config.php');
                               $results = $mysqli->query("SELECT scriptno FROM answerscript where status='uploaded'");
                               while($row=$results->fetch_array()){
                                   echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                               }	
                          ?>
                      </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Faculty ID</label>
                  <div class="col-md-8">
                      <select class="form-control" id="facultyId" name="facultyId" required>
                          <option value="#">Select Faculty ID</option>
                          <?php
                               include('..//config.php');
                               $results = $mysqli->query("SELECT regno FROM faculty");
                               while($row=$results->fetch_array()){
                                   echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                               }	
                          ?>
                      </select>
                  </div>
                </div>
		
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Allocate</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="dashboard.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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