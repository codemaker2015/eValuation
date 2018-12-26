<?php
	include('..//config.php');
	echo '<table  class="table table-hover table-bordered" id="sampleTable" width="90%">
		<thead>
                    <tr>
			<td align="center">Feedback ID</td>
			<td align="center">Name</td>
                        <td align="center">Email</td>
                        <td align="center">Feedback</td>
                        <td align="center">File</td>
                    </tr>
		</thead>
		<tbody>';
						
		$sql= "select * from feedback";
								
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