<?php
	include('..//config.php');
        session_start();
        $sql= "select student.name,college.name,course.name from student,college,course where college.collegeId = student.collegeId and course.courseId = student.courseId and student.regno=".$_SESSION['regno'];

        $results=$mysqli->query($sql);
        if($results->num_rows >0){
                //output data of each row
            $row=$results->fetch_array();
                
        echo '<div>
                   <h4>Student Name: '.$row[0].' </h4>
                   <h4>College : '.$row[1].' </h4>
                   <h4>Course : '.$row[2].' </h4>
                   <h4>Semester : '.$_GET["sem"].' </h4>
             </div>';
        }
	echo '<table  class="table table-hover table-bordered" id="sampleTable" width="90%">
		<thead>
                    <th>
			<td align="center">Script No</td>
			<td align="center">Subject ID</td>
                        <td align="center">Subject Name</td>
                        <td align="center">Mark</td>
                        
                    </th>
		</thead>
		<tbody>';
						
		$sql= "select result.scriptNo,answerscript.subjectId,subject.name,result.mark from result,answerscript,subject where result.scriptNo = answerscript.scriptNo and subject.subjectId = answerscript.subjectId and result.status='published' and answerscript.studentId=".$_SESSION['regno']. " and answerscript.sem=".$_GET['sem']; 
								
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
                    echo "0 results";
		}
		$mysqli->close();
		echo	'</tbody>
		</table>';                  
?>