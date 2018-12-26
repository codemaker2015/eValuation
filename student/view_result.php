<!DOCTYPE html>
<html lang="en">
  <head>
    <title>E-Valuation:: View Result</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Data table plugin-->
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>

    <!--<script>
		//Auto refresh a table 
		$(document).ready(function(){
			refreshTable();
		});

		function refreshTable(){
			$('.tile-body').load('getResultTable.php', function(){
				setTimeout(refreshTable, 60000);
			});
		}
		
	</script>
	-->
  </head>
  <body class="app sidebar-mini rtl">
       <!-- Navbar-->
		<!--Header section -->
		<?php 
			session_start();
			include('..//header.php'); 
		?>
	<!-- End of Nav Bar-->
	
    <!-- Sidebar menu-->
		<?php include('sidebar.php');?>
	<!-- -->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> View Details</h1>
          <p>Your action is more valuable </p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">E-Valuation</li>
          <li class="breadcrumb-item active"><a href="#">details</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <div class="col-md-6">
                  <div class="tile">
                    <h3 class="tile-title">Semester wise results</h3>
                    <div class="tile-body">
                      <form class="form-horizontal" action="" method="POST">
                        <div class="form-group row">
                          <label class="control-label col-md-3">Semster</label>
                          <div class="col-md-8">
                            <input class="form-control" type="text" id="sem" name="sem" placeholder="Enter Semester" required>
                          </div>
                        </div>
                    <div class="tile-footer">
                      <div class="row">
                        <div class="col-md-8 col-md-offset-3">
                            <button class="btn btn-primary" type="submit" id="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Result</button>
                        </div>
                      </div>
                    </div>
                </form>
                </div>
                </div>
                </div>
                <?php
                   include('..//config.php');
                   
                   if(isset($_POST['submit'])){
                        $sql= "select student.name,college.name,course.name from student,college,course,answerscript where college.collegeId = student.collegeId and course.courseId = student.courseId and answerscript.studentId = student.regno and student.regno=".$_SESSION['regno']. " and answerscript.sem=".$_POST['sem'];

                        $results=$mysqli->query($sql);
                        if($results->num_rows >0){
                                //output data of each row
                            $row=$results->fetch_array();

                        echo '<div>
                                   <h4>Student Name: '.$row[0].' </h4>
                                   <h4>College : '.$row[1].' </h4>
                                   <h4>Course : '.$row[2].' </h4>
                                   <h4>Semester : '.$_POST["sem"].' </h4>
                             </div>';
                        }
                        echo '<table  class="table table-hover table-bordered" id="sampleTable" width="90%">
                                <thead>
                                    <tr>
                                        <td align="center">Script No</td>
                                        <td align="center">Subject ID</td>
                                        <td align="center">Subject Name</td>
                                        <td align="center">Mark</td>

                                    </tr>
                                </thead>
                                <tbody>';

                                $sql= "select result.scriptNo,answerscript.subjectId,subject.name,result.mark from result,answerscript,subject where result.scriptNo = answerscript.scriptNo and subject.subjectId = answerscript.subjectId and result.status='published' and answerscript.studentId=".$_SESSION['regno']. " and answerscript.sem=".$_POST['sem']; 

                                $results=$mysqli->query($sql);
                                if($results->num_rows >0){
                                        //output data of each row
                                        while($row=$results->fetch_array()){
                                                echo '<tr>';
                                                echo '<td id="regno" align="center">'.$row[0].'</td>';
                                                echo '<td id="name" align="center">'.$row[1].'</td>';
                                                echo '<td id="course" align="center">'.$row[2].'</td>';
                                                echo '<td id="sem" align="center">'.$row[3].'</td>';

                                            echo '</tr>';
                                        }
                                }
                                else{
                                    echo "Result yet not published!!!";
                                }
                                $mysqli->close();
                                echo	'</tbody>
                                </table>';          
                             }
                    ?>
                </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Google analytics script-->
	
  </body>
</html>