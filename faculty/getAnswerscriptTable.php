<?php
	include('..//config.php');
        session_start();
        
	echo '<table  class="table table-hover table-bordered" id="sampleTable" width="90%">
		<thead>
                    <tr>
			<td align="center">Script No</td>
			<td align="center">Student ID</td>
                        <td align="center">Course ID</td>
                        <td align="center">Semester</td>
                        <td align="center">Year</td>
			<td align="center">Uploaded By</td>
			<td align="center">File Location</td>
                        <td align="center">Status</td>
                    </tr>
		</thead>
		<tbody>';
						
		$sql= "select * from answerscript where scriptNo in (select scriptNo from answerscriptallocation where facultyId=".$_SESSION['regno']." and status='allocated')";
								
		$results=$mysqli->query($sql);
		if($results->num_rows >0){
			//output data of each row
			while($row=$results->fetch_array()){
				echo '<tr>';
				echo '<td id="scriptno" align="center">'.$row["scriptNo"].'</td>';
				echo '<td id="studentId" align="center">'.$row["studentId"].'</td>';
				echo '<td id="courseId" align="center">'.$row["courseId"].'</td>';
				echo '<td id="sem" align="center">'.$row["sem"].'</td>';
				echo '<td id="year" align="center">'.$row["year"].'</td>';
                                echo '<td id="uploadedBy" align="center">'.$row["uploadedBy"].'</td>';
                                echo '<td id="loc" align="center">'.$row["loc"].'</td>';
                                echo '<td id="status" align="center">'.$row["status"].'</td>';
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