<?php
	include('..//config.php');
	echo '<table  class="table table-hover table-bordered" id="sampleTable">
		<thead>
                    <tr>
			<td align="center">ID</td>
			<td align="center">Name</td>
			<td align="center">Address</td>
			<td align="center">Email</td>
			<td align="center">Phone</td>
                    </tr>
		</thead>
		<tbody>';
						
		$sql= "select * from college";
								
		$results=$mysqli->query($sql);
		if($results->num_rows >0){
			//output data of each row
			while($row=$results->fetch_array()){
				echo '<tr>';
				echo '<td id="id" align="center">'.$row["collegeId"].'</td>';
				echo '<td id="name" align="center">'.$row["name"].'</td>';
				echo '<td id="address" align="center">'.$row["address"].'</td>';
				echo '<td id="email" align="center">'.$row["email"].'</td>';
				echo '<td id="phone" align="center">'.$row["phone"].'</td>';
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