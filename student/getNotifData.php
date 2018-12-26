 <?php
        include('../config.php');
        session_start();
        
        $sql = "select * from notification where status = 'unread' and regno=".$_SESSION['regno'];
         $results=$mysqli->query($sql);
         $notif_count = 0;
        if($results->num_rows >0)
            $notif_count = $results->num_rows;
        
        if($notif_count){
            while($row=$results->fetch_array()){   
                echo $row["notification_title"]."<br/>";
            }
            echo '<span class="tile-badge bg-darkRed">'.$notif_count.'</span>'; 
        } 
                            
  ?>