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
    <title>E-Valuation :: Valuate Answerscript</title>
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
            <h3 class="tile-title">Answer Script Valuation</h3>
            <div class="tile-body">
                <form action="" method="POST">
                <div class="form-group row">
                  <label class="control-label col-md-3">Script No</label>
                  <div class="col-md-8">
                      
                            <select class="form-control" id="scriptno" name="scriptno" required>
                                <option value="#">Select Script No</option>
                                <?php
                                     include('..//config.php');
                                     session_start();
                                     $name = "";
                                     $results = $mysqli->query("select scriptNo from answerscriptallocation where facultyId=".$_SESSION['regno']." and status='allocated'");
                                     while($row=$results->fetch_array()){
                                         echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                                     }	
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3">Submit</label>
                      <div class="col-md-8">
                          <button class="btn btn-primary" type="submit" id="getScriptNo" name="getScriptNo"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                
                <?php 
                    $GLOBALS['file'] = "";
                    $scriptno="";
                    if(isset($_POST['getScriptNo'])){
                    
                    $scriptno = $_POST['scriptno'];
                    
                    $results = $mysqli->query("select loc from answerscript where scriptNo='".$_POST['scriptno']."'");
                    $row=$results->fetch_array();
                    //echo $_SERVER['DOCUMENT_ROOT']."/evaluation/uploads/".$row[0]; 
                    $GLOBALS['file'] = "./uploads/".$row[0];
                    
                    $filename = $row[0];
                    
                    //header("Location: download.php?filename=".$filename);
                    
//                    header ("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//                    header('Content-Type: application/octetstream');
//                    header("Content-Transfer-Encoding: Binary");
//                    header("Content-length: ".filesize($GLOBALS['file']));
//                    header("Content-disposition: attachment; filename=".basename($GLOBALS['file']));
//                    readfile($GLOBALS['file']);                  
                    }
                    
                    //echo "<a href='".$GLOBALS['file']."'><h1>Download Script</h1></a>";
                ?>
                  
                <form class="form-horizontal" action="valuate_answerscript2.php" method="POST">  
                    <div class="form-group row" hidden="true">
                  <label class="control-label col-md-3">Download Answer Script</label>
                  <div class="col-md-8">
                      <?php echo '<input type="hidden" id="scriptno" name="scriptno" value='.$scriptno; ?>
                      <a class="treeview-item" target="_new" href=" <?php echo $GLOBALS['file']; ?> "><i class="icon fa fa-circle-o"></i>Answer Script</a>
                  </div>
                  
                </div>
                
                <div class="form-group row">
                  <label class="control-label col-md-3">Mark</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="mark" name="mark" placeholder="Enter Secured Mark" required>
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
                    <button class="btn btn-primary" type="submit" id="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="dashboard.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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