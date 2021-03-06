<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Metro, a sleek, intuitive, and powerful framework for faster and easier web development for Windows Metro Style.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development">
    <meta name="author" content="Sergey Pimenov and Metro UI CSS contributors">

    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
    <title>Smart Home :: Dashboard</title>

    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
    <!--<link href="css/metro-responsive.css" rel="stylesheet">-->

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/metro.js"></script>
  
    <style>
        .tile-area-controls {
            position: fixed;
            right: 40px;
            top: 40px;
        }

        .tile-group {
            left: 100px;
        }

        .tile, .tile-small, .tile-sqaure, .tile-wide, .tile-large, .tile-big, .tile-super {
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }

        #charmSettings .button {
            margin: 5px;
        }

        .schemeButtons {
            /*width: 300px;*/
        }

        @media screen and (max-width: 640px) {
            .tile-area {
                overflow-y: scroll;
            }
            .tile-area-controls {
                display: none;
            }
        }

        @media screen and (max-width: 320px) {
            .tile-area {
                overflow-y: scroll;
            }

            .tile-area-controls {
                display: none;
            }

        }
    </style>

    <script>
        (function($) {
            $.StartScreen = function(){
                var plugin = this;
                var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

                plugin.init = function(){
                    setTilesAreaSize();
                    if (width > 640) addMouseWheel();
                };

                var setTilesAreaSize = function(){
                    var groups = $(".tile-group");
                    var tileAreaWidth = 80;
                    $.each(groups, function(i, t){
                        if (width <= 640) {
                            tileAreaWidth = width;
                        } else {
                            tileAreaWidth += $(t).outerWidth() + 80;
                        }
                    });
                    $(".tile-area").css({
                        width: tileAreaWidth
                    });
                };

                var addMouseWheel = function (){
                    $("body").mousewheel(function(event, delta, deltaX, deltaY){
                        var page = $(document);
                        var scroll_value = delta * 50;
                        page.scrollLeft(page.scrollLeft() - scroll_value);
                        return false;
                    });
                };

                plugin.init();
            }
        })(jQuery);

        $(function(){
            $.StartScreen();

            var tiles = $(".tile, .tile-small, .tile-sqaure, .tile-wide, .tile-large, .tile-big, .tile-super");

            $.each(tiles, function(){
                var tile = $(this);
                setTimeout(function(){
                    tile.css({
                        opacity: 1,
                        "-webkit-transform": "scale(1)",
                        "transform": "scale(1)",
                        "-webkit-transition": ".3s",
                        "transition": ".3s"
                    });
                }, Math.floor(Math.random()*500));
            });

            $(".tile-group").animate({
                left: 0
            });
        });

        function showCharms(id){
            var  charm = $(id).data("charm");
            if (charm.element.data("opened") === true) {
                charm.close();
            } else {
                charm.open();
            }
        }

        function setSearchPlace(el){
            var a = $(el);
            var text = a.text();
            var toggle = a.parents('label').children('.dropdown-toggle');

            toggle.text(text);
        }

        $(function(){
            var current_tile_area_scheme = localStorage.getItem('tile-area-scheme') || "tile-area-scheme-dark";
            $(".tile-area").removeClass (function (index, css) {
                return (css.match (/(^|\s)tile-area-scheme-\S+/g) || []).join(' ');
            }).addClass(current_tile_area_scheme);

            $(".schemeButtons .button").hover(
                    function(){
                        var b = $(this);
                        var scheme = "tile-area-scheme-" +  b.data('scheme');
                        $(".tile-area").removeClass (function (index, css) {
                            return (css.match (/(^|\s)tile-area-scheme-\S+/g) || []).join(' ');
                        }).addClass(scheme);
                    },
                    function(){
                        $(".tile-area").removeClass (function (index, css) {
                            return (css.match (/(^|\s)tile-area-scheme-\S+/g) || []).join(' ');
                        }).addClass(current_tile_area_scheme);
                    }
            );

            $(".schemeButtons .button").on("click", function(){
                var b = $(this);
                var scheme = "tile-area-scheme-" +  b.data('scheme');

                $(".tile-area").removeClass (function (index, css) {
                    return (css.match (/(^|\s)tile-area-scheme-\S+/g) || []).join(' ');
                }).addClass(scheme);

                current_tile_area_scheme = scheme;
                localStorage.setItem('tile-area-scheme', scheme);

                showSettings();
            });
        });

        var weather_icons = {
            'clear-day': 'mif-sun',
            'clear-night': 'mif-moon2',
            'rain': 'mif-rainy',
            'snow': 'mif-snowy3',
            'sleet': 'mif-weather4',
            'wind': 'mif-wind',
            'fog': 'mif-cloudy2',
            'cloudy': 'mif-cloudy',
            'partly-cloudy-day': 'mif-cloudy3',
            'partly-cloudy-night': 'mif-cloud5'
        };
        
        /*
        var api_key = 'AIzaSyDPfgE0qhVmCcy-FNRLBjO27NbVrFM2abg';

        $(function(){
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position){
                    var lat = position.coords.latitude, lon = position.coords.longitude;
                    var pos = lat+','+lon;
                    var latlng = new google.maps.LatLng(lat, lon);
                    var geocoder = new google.maps.Geocoder();
                    $.ajax({
                        url: '//api.forecast.io/forecast/219588ba41dedc2f1019684e8ac393ad/'+pos+'?units=si',
                        dataType: 'jsonp',
                        success: function(data){
                            //do whatever you want with the data here
                            geocoder.geocode({latLng: latlng}, function(result, status){
                                console.log(result[3]);
                                $("#city_name").html(result[3].formatted_address);
                            });
                            var current = data.currently;
                            //$('#city_name').html(response.city+", "+response.country);
                            $("#city_temp").html(Math.round(current.temperature)+" &deg;C");
                            $("#city_weather").html(current.summary);
                            $("#city_weather_daily").html(data.daily.summary);
                            $("#weather_icon").addClass(weather_icons[current.icon]);
                            $("#pressure").html(current.pressure);
                            $("#ozone").html(current.ozone);
                            $("#wind_bearing").html(current.windBearing);
                            $("#wind_speed").html(current.windSpeed);
                            $("#weather_bg").css({
                                'background-image': 'url(images/'+current.icon+'.jpg'+')'
                            });
                        }
                    });
                });
            }
        });
        */
       
        function check(id,status){
            //alert(id+status);
            if(status == "ON")
                window.location.href = "btn_action2.php?id=ctrl_button"+id+"&loc=dashboard";
            else
                window.location.href = "btn_action1.php?id=ctrl_button"+id+"&loc=dashboard";
        }
    </script>
    
    <script>
		//Auto refresh a table 
		$(document).ready(function(){
			refreshTable1();
                        refreshTable2()
		});

		function refreshTable1(){
			$('#notif-data').load('getNotifData.php', function(){
				setTimeout(refreshTable1, 5000);
			});
		}
		
                function refreshTable2(){
			$('#temp-data').load('getTempData.php', function(){
				setTimeout(refreshTable2, 5000);
			});
		}
                
	</script>
    
    <?php include('config.php') ?>
</head>
<body style="overflow-y: hidden;">
    <div data-role="charm" id="charmSearch">
        <h1 class="text-light">Search</h1>
        <hr class="thin"/>
        <br />
        <div class="input-control text full-size">
            <label>
                <span class="dropdown-toggle drop-marker-light">Anywhere</span>
                <ul class="d-menu" data-role="dropdown">
                    <li><a onclick="setSearchPlace(this)">Anywhere</a></li>
                    <li><a onclick="setSearchPlace(this)">Options</a></li>
                    <li><a onclick="setSearchPlace(this)">Files</a></li>
                    <li><a onclick="setSearchPlace(this)">Internet</a></li>
                </ul>
            </label>
            <input type="text">
            <button class="button"><span class="mif-search"></span></button>
        </div>
    </div>

    <div data-role="charm" id="charmSettings" data-position="top">
        <h1 class="text-light">Settings</h1>
        <hr class="thin"/>
        <br />
        <div class="schemeButtons">
            <div class="button square-button tile-area-scheme-dark" data-scheme="dark"></div>
            <div class="button square-button tile-area-scheme-darkBrown" data-scheme="darkBrown"></div>
            <div class="button square-button tile-area-scheme-darkCrimson" data-scheme="darkCrimson"></div>
            <div class="button square-button tile-area-scheme-darkViolet" data-scheme="darkViolet"></div>
            <div class="button square-button tile-area-scheme-darkMagenta" data-scheme="darkMagenta"></div>
            <div class="button square-button tile-area-scheme-darkCyan" data-scheme="darkCyan"></div>
            <div class="button square-button tile-area-scheme-darkCobalt" data-scheme="darkCobalt"></div>
            <div class="button square-button tile-area-scheme-darkTeal" data-scheme="darkTeal"></div>
            <div class="button square-button tile-area-scheme-darkEmerald" data-scheme="darkEmerald"></div>
            <div class="button square-button tile-area-scheme-darkGreen" data-scheme="darkGreen"></div>
            <div class="button square-button tile-area-scheme-darkOrange" data-scheme="darkOrange"></div>
            <div class="button square-button tile-area-scheme-darkRed" data-scheme="darkRed"></div>
            <div class="button square-button tile-area-scheme-darkPink" data-scheme="darkPink"></div>
            <div class="button square-button tile-area-scheme-darkIndigo" data-scheme="darkIndigo"></div>
            <div class="button square-button tile-area-scheme-darkBlue" data-scheme="darkBlue"></div>
            <div class="button square-button tile-area-scheme-lightBlue" data-scheme="lightBlue"></div>
            <div class="button square-button tile-area-scheme-lightTeal" data-scheme="lightTeal"></div>
            <div class="button square-button tile-area-scheme-lightOlive" data-scheme="lightOlive"></div>
            <div class="button square-button tile-area-scheme-lightOrange" data-scheme="lightOrange"></div>
            <div class="button square-button tile-area-scheme-lightPink" data-scheme="lightPink"></div>
            <div class="button square-button tile-area-scheme-grayed" data-scheme="grayed"></div>
        </div>
    </div>

    <div class="tile-area tile-area-scheme-dark fg-white" style="height: 100%; max-height: 100% !important;">
        <h1 class="tile-area-title">Smart Home</h1>
        <div class="tile-area-controls">
            <button class="image-button icon-right bg-transparent fg-white bg-hover-dark no-border"><span class="sub-header no-margin text-light">Vishnu Sivan</span> <span class="icon mif-user"></span></button>
            <a class="square-button bg-darkBlue no-border" onclick="showCharms('#charmSettings')"><span class="mif-cog"></span></a>
            <a href="device-manager.php" class="square-button no-border bg-darkBlue"><span class="mif-exit"></span></a>
        </div>

        <div class="tile-group double">
            <span class="tile-group-title">General</span>

            <div class="tile-container">

                <a href="http://calendar.google.com" class="tile bg-indigo fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-calendar"></span>
                    </div>
                    <span class="tile-label">Calendar</span>
                </a>

                <div class="tile bg-darkBlue fg-white" data-role="tile" onclick="document.location.href='notifications.php'">
                    <div class="tile-content iconic">
                        <span class="icon mif-envelop"></span>
                    
                        <div id="notif-data">
                            <!-- read notification from getNotifData.php -->
                        </div>
                    </div>
                    <span class="tile-label">Inbox</span>
                </div>

                <div class="tile-large bg-lightBlue fg-white" data-role="tile" data-on-click="document.location.href='#'">
                    <div class="tile-content iconic" id="weather_bg" style="background: top left no-repeat; background-size: cover;">
                        <span class="icon mif-cloudy2"></span>
                        <div class="padding10">
                            <h1 id="weather_icon" style="font-size: 6em;position: absolute; top: 10px; right: 10px;"></h1>
                            <h1 id="city_temp"></h1>
                            <h2 id="city_name" class="text-light"></h2>
                            <h4 id="city_weather"></h4>
                            <p id="city_weather_daily"></p>
                            <div id="temp-data"> 
                                <!--Temperature data from getTempData.php -->
                            </div>
                        </div>
                    </div>
                    <span class="tile-label">Weather</span>
                </div>
            </div>
        </div>
        <?php
            function status($id){
                   include('config.php');
                   $sql = "select * from tbl_room_configuration where component_id = $id";
                   $results=$mysqli->query($sql);
                    while($row=$results->fetch_array()){   
                        return $row["status"];
                    }
            }
        ?>
        <div class="tile-group double">
            <span class="tile-group-title">Living Room</span>
            <div class="tile-container">
                <div class="tile-wide" data-role="tile" data-effect="slideLeft">
                    <div class="tile-content">
                        <a href="#" class="live-slide"><img src="images/1.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="#" class="live-slide"><img src="images/2.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="#" class="live-slide"><img src="images/3.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="#" class="live-slide"><img src="images/4.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="#" class="live-slide"><img src="images/5.jpg" data-role="fitImage" data-format="fill"></a>
                    </div>
                    <div class="tile-label">Gallery</div>
                </div>
                <div class="tile bg-yellow fg-white" data-role="tile" id="ctrl_button12" 
                     onclick="check(12,'<?php echo status(12)?>')">
                    <div class="tile-content iconic">
                        <img src="images/cfl.png" class="icon">
                    </div>
                    <?php
                        if(status(12) == "ON")
                            echo '<span class="tile-badge bg-darkGreen">ON</span>';
                        else
                            echo '<span class="tile-badge bg-darkRed">OFF</span>';
                    ?>
                    <span class="tile-label">CFL Light</span>
                </div>
                <div class="tile-small bg-amber fg-white" data-role="tile" id="ctrl_button_camera1">
                    <div class="tile-content iconic">
                        <span class="icon mif-camera"></span>
                    </div>
                </div>
                <div class="tile-small bg-green fg-white" data-role="tile" id="ctrl_button41"
                     onclick="check(41,'<?php echo status(41)?>')">
                    <div class="tile-content iconic">
                        <span class="icon mif-thermometer2"></span>
                         <?php
                            if(status(41) == "ON")
                                echo '<span class="tile-badge bg-darkGreen"></span>';
                            else
                                echo '<span class="tile-badge bg-darkRed"></span>';
                            ?>
                    </div>
                </div>
                <div class="tile-small bg-pink fg-white" data-role="tile" id="ctrl_button44"
                    onclick="check(44,'<?php echo status(44)?>')">
                 
                    <div class="tile-content iconic">
                        <span class="icon mif-sun"></span>
			<?php
                            if(status(44) == "ON")
                                echo '<span class="tile-badge bg-darkGreen"></span>';
                            else
                                echo '<span class="tile-badge bg-darkRed"></span>';
                        ?>
                    </div>
					
                </div>
                <div class="tile-small bg-brown fg-white" data-role="tile" id="ctrl_button46"
                     onclick="check(46,'<?php echo status(46)?>')">
                 
                    <div class="tile-content iconic">
                        <span class="icon mif-lock"></span>
			   <?php
                                if(status(46) == "ON")
                                    echo '<span class="tile-badge bg-darkGreen"></span>';
                                else
                                    echo '<span class="tile-badge bg-darkRed"></span>';
                             ?>
                    </div>
                </div>

               <!-- <div class="tile-wide bg-orange fg-white" data-role="tile">
                    <div class="tile-content image-set">
                        <img src="images/jeki_chan.jpg">
                        <img src="images/shvarcenegger.jpg">
                        <img src="images/vin_d.jpg">
                        <img src="images/jolie.jpg">
                        <img src="images/jek_vorobey.jpg">
                    </div>
                </div> -->
             
                <div class="tile bg-darkOrange fg-white" data-role="tile" id="ctrl_button24"
                        onclick="check(24,'<?php echo status(24)?>')">
                 
                    <div class="tile-content iconic">
                        <img src="images/fan.png" class="icon">
                    </div>
                    <?php
                        if(status(24) == "ON")
                            echo '<span class="tile-badge bg-darkGreen">ON</span>';
                        else
                            echo '<span class="tile-badge bg-darkRed">OFF</span>';
                    ?>
                    <span class="tile-label">Fan</span>
                </div>
                <div class="tile bg-red fg-white" data-role="tile" id="ctrl_button3"
                        onclick="check(3,'<?php echo status(3)?>')">
                 
                    <div class="tile-content iconic">
                        <img src="images/television.png" class="icon">
                    </div>
                    <?php
                        if(status(3) == "ON")
                            echo '<span class="tile-badge bg-darkGreen">ON</span>';
                        else
                            echo '<span class="tile-badge bg-darkRed">OFF</span>';
                    ?>
                    <div class="tile-label">Television</div>
                </div>	
            </div>
        </div>

        <div class="tile-group double">
            <span class="tile-group-title">Master Bedroom</span>
              <div class="tile-wide" data-role="tile" data-effect="slideLeft">
                    <div class="tile-content">
                        <a href="#" class="live-slide"><img src="images/6.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="#" class="live-slide"><img src="images/7.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="#" class="live-slide"><img src="images/8.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="#" class="live-slide"><img src="images/9.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="#" class="live-slide"><img src="images/10.jpg" data-role="fitImage" data-format="fill"></a>
                    </div>
                    <div class="tile-label">Gallery</div>
                </div>
             
                <div class="tile-small bg-amber fg-white" data-role="tile" id="ctrl_button_camera3">
                    <div class="tile-content iconic">
                        <span class="icon mif-camera"></span>
                    </div>
                </div>
                <div class="tile-small bg-green fg-white" data-role="tile" id="ctrl_button44">
                    <div class="tile-content iconic">
                        <span class="icon mif-sun"></span>
                    </div>
                </div>
                <div class="tile-small bg-pink fg-white" data-role="tile" id="ctrl_button_camera2">
                    <div class="tile-content iconic">
                        <span class="icon mif-video-camera"></span>
			
                    </div>
					
                </div>
                <div class="tile-small bg-brown fg-white" data-role="tile" id="ctrl_button32"
                     onclick="check(32,'<?php echo status(32)?>')">
                 
                    <div class="tile-content iconic">
                        <span class="icon mif-lock"></span>
			   <?php
                                if(status(32) == "ON")
                                    echo '<span class="tile-badge bg-darkGreen"></span>';
                                else
                                    echo '<span class="tile-badge bg-darkRed"></span>';
                             ?>
                    </div>
                </div>
                
                <div class="tile bg-yellow fg-white" data-role="tile" id="ctrl_button10"
                        onclick="check(10,'<?php echo status(10)?>')">
                 
                    <div class="tile-content iconic">
                        <img src="images/cfl.png" class="icon">
                    </div>
                    <?php
                        if(status(10) == "ON")
                            echo '<span class="tile-badge bg-darkGreen">ON</span>';
                        else
                            echo '<span class="tile-badge bg-darkRed">OFF</span>';
                    ?>
                    <span class="tile-label">CFL Light</span>
                </div>
               
                <div class="tile bg-darkOrange fg-white" data-role="tile" id="ctrl_button22"
                        onclick="check(22,'<?php echo status(22)?>')">
                 
                    <div class="tile-content iconic">
                        <img src="images/fan.png" class="icon">
                    </div>
                    <?php
                        if(status(22) == "ON")
                            echo '<span class="tile-badge bg-darkGreen">ON</span>';
                        else
                            echo '<span class="tile-badge bg-darkRed">OFF</span>';
                    ?>
                    <span class="tile-label">Fan</span>
                </div>
        </div>

        <div class="tile-group double">
            <span class="tile-group-title">Bedroom 1</span>
              <div class="tile-wide" data-role="tile" data-effect="slideLeft">
                    <div class="tile-content">
                        <a href="#" class="live-slide"><img src="images/11.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="#" class="live-slide"><img src="images/12.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="#" class="live-slide"><img src="images/13.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="#" class="live-slide"><img src="images/14.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="#" class="live-slide"><img src="images/15.jpg" data-role="fitImage" data-format="fill"></a>
                    </div>
                    <div class="tile-label">Gallery</div>
                </div>
               
               <div class="tile bg-yellow fg-white" data-role="tile" id="ctrl_button1"
                       onclick="check(1,'<?php echo status(1)?>')">
                 
                    <div class="tile-content iconic">
                        <img src="images/cfl.png" class="icon">
                    </div>
                    <?php
                        if(status(1) == "ON")
                            echo '<span class="tile-badge bg-darkGreen">ON</span>';
                        else
                            echo '<span class="tile-badge bg-darkRed">OFF</span>';
                    ?>
                    <span class="tile-label">CFL Light</span>
                </div>
               
                <div class="tile bg-darkOrange fg-white" data-role="tile" id="ctrl_button7"
                        onclick="check(7,'<?php echo status(7)?>')">
                 
                    <div class="tile-content iconic">
                        <span class="icon mif-lock"></span>
                    </div>
                    <?php
                        if(status(7) == "ON")
                            echo '<span class="tile-badge bg-darkGreen">ON</span>';
                        else
                            echo '<span class="tile-badge bg-darkRed">OFF</span>';
                    ?>
                    <span class="tile-label">Lock</span>
                </div>
        </div>

        <div class="tile-group double">
            <span class="tile-group-title">Kitchen</span>
              <div class="tile-wide" data-role="tile" data-effect="slideLeft">
                    <div class="tile-content">
                        <a href="#" class="live-slide"><img src="images/21.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="#" class="live-slide"><img src="images/22.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="#" class="live-slide"><img src="images/23.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="#" class="live-slide"><img src="images/24.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="#" class="live-slide"><img src="images/25.jpg" data-role="fitImage" data-format="fill"></a>
                    </div>
                    <div class="tile-label">Gallery</div>
                </div>
              <div class="tile-small bg-amber fg-white" data-role="tile" id="ctrl_button">
                    <div class="tile-content iconic">
                        <span class="icon mif-camera"></span>
                    </div>
                </div>
                <div class="tile-small bg-green fg-white" data-role="tile" id="ctrl_button">
                    <div class="tile-content iconic">
                        <span class="icon mif-sun"></span>
                    </div>
                </div>
                <div class="tile-small bg-pink fg-white" data-role="tile" id="ctrl_button43"
                        onclick="check(43,'<?php echo status(43)?>')">
                 
                    <div class="tile-content iconic">
                        <img src="images/gas.png" class="icon">
			<?php
                            if(status(43) == "ON")
                                echo '<span class="tile-badge bg-darkGreen"></span>';
                            else
                                echo '<span class="tile-badge bg-darkRed"></span>';
                        ?>
                    </div>		
                </div>
                <div class="tile-small bg-brown fg-white" data-role="tile" id="ctrl_button">
                    <div class="tile-content iconic">
                        <span class="icon mif-lock"></span>
			<span class="tile-badge bg-darkRed"></span>
                    </div>
                </div>
                
                <div class="tile bg-yellow fg-white" data-role="tile" id="ctrl_button11"
                        onclick="check(11,'<?php echo status(11)?>')">
                 
                    <div class="tile-content iconic">
                        <img src="images/cfl.png" class="icon">
                    </div>
                    <?php
                        if(status(11) == "ON")
                            echo '<span class="tile-badge bg-darkGreen">ON</span>';
                        else
                            echo '<span class="tile-badge bg-darkRed">OFF</span>';
                    ?>
                    <span class="tile-label">CFL Light</span>
                </div>
               
                <div class="tile bg-darkOrange fg-white" data-role="tile" id="ctrl_button6"
                        onclick="check(6,'<?php echo status(6)?>')">
                 
                    <div class="tile-content iconic">
                        <img src="images/fridge.png" class="icon">
                    </div>
                    <?php
                        if(status(6) == "ON")
                            echo '<span class="tile-badge bg-darkGreen">ON</span>';
                        else
                            echo '<span class="tile-badge bg-darkRed">OFF</span>';
                    ?>
                    <span class="tile-label">Fridge</span>
                </div>
        </div>
    </div>
</body>
</html>