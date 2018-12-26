<!DOCTYPE html>
<html>
  <head>
    <title>E-Valuation - Index Page</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        $(document).ready(function(){
            refreshTable();
        });
        function refreshTable(){
            $('#chartData').load('chartData.php', function(){
		setTimeout(refreshTable, 5000);
            });
        }
    </script>
  </head>
  <body class="app sidebar-overlay pace-done sidenav-toggled">
    <!-- Navbar-->
      <?php include('index-header.php'); ?>
	  <!-- Sidebar menu-->
      <?php //include('sidebar.php'); ?>
	
    <main class="app-content">
      <!--<div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>A free and modular admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>-->
    
      <div class="">
        <div class="row">
          <div class="col-lg-12">
            <div class="bs-component">
              <div class="jumbotron">
                <h1 class="display-3">E-Valuation</h1>
                <hr/>
                <img src="images/valuation.jpg" alt="E-Valuation" width="100%" height="100%"/>
                <h6>&nbsp;</h6>
                <p><a class="btn btn-primary btn-lg" href="#">Learn more</a></p>
              </div>
            </div>
          </div>
        </div>
       <!--
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Raspberry Pi Usage</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Temperature</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
            </div>
          </div>
        </div>
      </div>
       -->
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Amazingly Powerful</h3>
            <p>Custom graphical control pages allow you to design the perfect user interface. Comprehensive scheduling and triggering features support very complex logic, letting you step beyond home control and into intelligent smart home automation. Hierarchical conditions allow you to fine-tune your system. And these features are configured using an intuitive user interface. For really advanced functionality, scripting via the industry standard Python language enables limitless possibilities.</p>
           </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Infinitely expandable</h3>
            <p>
                If the built-in protocols don't support a device or service you want to integrate, there's probably a 3rd party plugin that will. There are plugins that integrate security systems, weather data, home theater components, energy monitoring devices, sprinklers, thermostats, and many other devices and services. Plugins can also supply events, such as data and notifications from incoming services and actions like sending push notifications custom device controls. <br/>&nbsp;</p>
          </div>
        </div>
          

          <div class="col-lg-4">
            <div class="bs-component">

            </div>
          </div>
            
      </div>
        
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <div>
        <?php
             $val = array();
             for($i=0;$i<7;$i++)
                $val[$i] = rand(1,100);
        ?>
    </div>
    <div id="chartData">
       
    </div>
    <footer><center>Copyright &copy; 2018 VSoft Technologies</center></footer>
  </body>
</html>