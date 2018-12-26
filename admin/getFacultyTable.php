<?php
	include('..//config.php');
	echo '<table  class="table table-hover table-bordered" id="sampleTable" width="90%">
		<thead>
                    <tr>
			<td align="center">Reg No</td>
			<td align="center">Name</td>
                        <td align="center">Address</td>
                        <td align="center">Gender</td>
                        <td align="center">Phone</td>
			<td align="center">Email</td>
			<td align="center">College ID</td>
                        <td align="center">Department</td>
                        <td align="center">Designation</td>
                        <td align="center">Status</td>
                    </tr>
		</thead>
		<tbody>';
						
		$sql= "select * from faculty";
								
		$results=$mysqli->query($sql);
		if($results->num_rows >0){
			//output data of each row
			while($row=$results->fetch_array()){
				echo '<tr>';
				echo '<td id="regno" align="center">'.$row["regno"].'</td>';
				echo '<td id="name" align="center">'.$row["name"].'</td>';
				echo '<td id="address" align="center">'.$row["address"].'</td>';
				echo '<td id="gender" align="center">'.$row["gender"].'</td>';
				echo '<td id="phone" align="center">'.$row["phone"].'</td>';
                                echo '<td id="email" align="center">'.$row["email"].'</td>';
                                echo '<td id="collegeId" align="center">'.$row["collegeId"].'</td>';
                                echo '<td id="department" align="center">'.$row["department"].'</td>';
                                echo '<td id="designation" align="center">'.$row["designation"].'</td>';
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