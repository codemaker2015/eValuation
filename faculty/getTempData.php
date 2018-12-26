<?php
       include('config.php');
       
       $sql = "select * from tbl_statistics";
       $results=$mysqli->query($sql);
        while($row=$results->fetch_array()){   
         echo '<p class="no-margin text-shadow">Pressure: <span class="text-bold" id="pressure"></span> mm</p>'
          .'<p class="no-margin text-shadow">Temperature: <span class="text-bold" id="temperature">'.$row["temperature"].'<sup>o</sup>C</span></p>'
          .'<p class="no-margin text-shadow">Humidity: <span class="text-bold" id="humidity">'.$row["humidity"].'</span></p>'
           .'<p class="no-margin text-shadow">Light Intensity: <span class="text-bold" id="light">'.$row["light_intensity"].'</span></p>';
            if($row["presence"])
                 echo '<p class="no-margin text-shadow">Human Presence: <span class="text-bold" id="presence">Detected</span></p>';
            else
                echo '<p class="no-margin text-shadow">Human Presence: <span class="text-bold" id="presence">Absent</span></p>';

            }
  ?>