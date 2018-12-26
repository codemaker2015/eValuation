<?php
	include('..//config.php');
	echo '<table  class="table table-hover table-bordered" id="sampleTable" width="90%">
		<thead>
                    <tr>
			<td align="center">Reg No</td>
			<td align="center">Name</td>
                        <td align="center">Semester</td>
			<td align="center">College ID</td>
                        <td align="center">Course ID</td>
                        <td align="center">Subject ID</td>
                        <td align="center">Script No</td>
                        <td align="center">Mark</td>
                        <td align="center">Actions</td>
                    </tr>
		</thead>
		<tbody>';
						
		$sql= "select student.regno,student.name,answerscript.sem,student.collegeId,student.courseId,answerscript.subjectId,result.scriptNo,result.mark from student,answerscript,result where result.status='added' and student.regno = answerscript.studentId and result.scriptNo = answerscript.scriptNo";
								
		$results=$mysqli->query($sql);
		if($results->num_rows >0){
			//output data of each row
			while($row=$results->fetch_array()){
				echo '<tr>';
				echo '<td id="regno" align="center">'.$row[0].'</td>';
				echo '<td id="name" align="center">'.$row[1].'</td>';
				echo '<td id="sem" align="center">'.$row[2].'</td>';
				echo '<td id="college" align="center">'.$row[3].'</td>';
				echo '<td id="course" align="center">'.$row[4].'</td>';
                                echo '<td id="subject" align="center">'.$row[5].'</td>';
                                echo '<td id="scriptNo" align="center">'.$row[6].'</td>';
                                echo '<td id="mark" align="center">'.$row[7].'</td>';
                                echo '<td id="action" align="center">'
                                    . '<form action="publish.php?scriptno='.$row[6].'" method="post">'
                                          . '<button class="btn btn-primary" type="submit" id="publish" name="publish"><i class="fa fa-fw fa-lg fa-check-circle"></i>Publish</button></form></td>';
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