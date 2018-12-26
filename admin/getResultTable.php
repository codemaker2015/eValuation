<?php
	include('..//config.php');
	echo '<table  class="table table-hover table-bordered" id="sampleTable" width="90%">
		<thead>
                    <tr>
			<td align="center">Reg No</td>
			<td align="center">Name</td>
                        <td align="center">Course</td>
                        <td align="center">Semester</td>
                        <td align="center">Mark</td>
                        <td align="center">Status</td>
                        
                    </tr>
		</thead>
		<tbody>';
						
		$sql= "select student.regno,student.name,course.name,answerscript.sem,mark,result.status from result,course,student,answerscript where result.scriptNo = answerscript.scriptNo and course.courseId = answerscript.courseId and student.regno = answerscript.studentId";
								
		$results=$mysqli->query($sql);
		if($results->num_rows >0){
			//output data of each row
			while($row=$results->fetch_array()){
				echo '<tr>';
				echo '<td id="regno" align="center">'.$row[0].'</td>';
				echo '<td id="name" align="center">'.$row[1].'</td>';
				echo '<td id="course" align="center">'.$row[2].'</td>';
				echo '<td id="sem" align="center">'.$row[3].'</td>';
                                echo '<td id="mark" align="center">'.$row[4].'</td>';
                                echo '<td id="status" align="center">'.$row[5].'</td>';
				
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