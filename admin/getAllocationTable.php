<?php
	include('..//config.php');
	echo '<table  class="table table-hover table-bordered" id="sampleTable">
		<thead>
                    <tr>
			<td align="center">Script No</td>
			<td align="center">Faculty ID</td>
                        <td align="center">Status</td>
                    </tr>
		</thead>
		<tbody>';
						
		$sql= "select * from answerscriptallocation";
								
		$results=$mysqli->query($sql);
		if($results->num_rows >0){
			//output data of each row
			while($row=$results->fetch_array()){
				echo '<tr>';
				echo '<td id="scriptno" align="center">'.$row["scriptNo"].'</td>';
				echo '<td id="facultyId" align="center">'.$row["facultyId"].'</td>';
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