<?php
	include('..//config.php');
	echo '<table  class="table table-hover table-bordered" id="sampleTable">
		<thead>
                    <tr>
			<td align="center">ID</td>
			<td align="center">Name</td>
			<td align="center">Email</td>
			<td align="center">Feedback</td>
			<td align="center">File</td>
            </tr>
		</thead>
		<tbody>';
						
		$sql= "select * from tbl_feedback";
								
		$results=$mysqli->query($sql);
		if($results->num_rows >0){
			//output data of each row
			while($row=$results->fetch_array()){
				echo '<tr>';
				echo '<td id="id" align="center">'.$row["feedback_id"].'</td>';
				echo '<td id="date" align="center">'.$row["name"].'</td>';
				echo '<td id="title" align="center">'.$row["email"].'</td>';
				echo '<td id="type" align="center">'.$row["feedback"].'</td>';
				echo '<td id="desc" align="center">'.$row["file"].'</td>';
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