 <?php
        include('config.php');
        
        $sql = "select * from tbl_notification where status = 'unread'";
         $results=$mysqli->query($sql);
         $notif_count = 0;
        if($results->num_rows >0)
            $notif_count = $results->num_rows;
        
        if($notif_count){
            while($row=$results->fetch_array()){   
                echo $row["notification_title"];
            }
            echo '<span class="tile-badge bg-darkRed">'.$notif_count.'</span>'; 
        } 
                            
  ?>