<?php 
	
			include('config.php');
  
			$username = $_POST['uemail'];
			$password = $_POST['upasswd'];
			
			//MySqli Select Query
			$results = $mysqli->query("SELECT * FROM login");
			$a=0;
			$role = "User";
			
			while($row = $results->fetch_array()) {
			if($row["username"]==$username && $row["password"]==$password)
			{
				$role = $row["role"];
				$a=1;
				break;
			}
			}  
			if($a==1){
				session_start();
				$_SESSION['username'] = $username;
                              
				if($role=="admin" or $role=="Admin"){
                                        $sql = "select regno from login where username='".$username."'";
                                        $results = $mysqli->query($sql);
                                        $row = $results->fetch_array();   
                                        $_SESSION['regno'] = $row[0];
                                            
					header('Location: admin/dashboard.php');
					echo "<b>Welcome $username </b>";
				}else
					if($role=="Student" or $role=="student"){
                                            $sql = "select student.regno from student,login where student.regno = login.regno and username='".$username."'";
                                            $results = $mysqli->query($sql);
                                            $row = $results->fetch_array();   
                                            $_SESSION['regno'] = $row[0];
                                            
                                            header('Location: student/dashboard.php');
                                            echo "<b>Welcome $username </b>";
					} else if($role=="Faculty" or $role=="faculty"){
                                            $sql = "select faculty.regno from faculty,login where faculty.regno = login.regno and username='".$username."'";
                                            $results = $mysqli->query($sql);
                                            $row = $results->fetch_array();   
                                            $_SESSION['regno'] = $row[0];
                                                                                      
                                            header('Location: faculty/dashboard.php');
                                            echo "<b>Welcome $username </b>";
					}
			}else
			{
				echo "<script>alert('Username or Password is incorrect.')</script>";
				header('Location: login.php');
			}
?>