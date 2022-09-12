<?php
     
    $weather = "";
    $error = "";
     
    if (isset($_GET['city'])) {
         
     $urlContents = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city'])."&appid=0108a7d8f69d088b1ebec9ff586da82a");
         
        $weatherArray = json_decode($urlContents, true);
         
        if ($weatherArray['cod'] == 200) {
         
            $weather = "The weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'. ";
 
            $tempInCelcius = floatval($weatherArray['main']['temp'] - 273.15);
 
            $weather .= " The temperature is ".$tempInCelcius."&deg;C and the wind speed is ".$weatherArray['wind']['speed']."m/s.";
             
        } else {
             
            $error = "Could not find city - please try again.";
             
        }
         
    } 
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
     <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  <title>Weather App</title>

</head>
<style>
    html { 
          background: url(background1.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
          }
         
          body {
               display: flex;
  				justify-content: center;
  				align-items: center;
 				 height: 100vh;
 				 margin: 0;
 				 font-family: 'Open Sans', sans-serif;
  				background: #222;
 				 background-image: url('https://source.unsplash.com/1920x1080/?landscape');
 				 font-size: 120%;
              
               
          }
		
		.card{
				
				background: #000000d0;
   				 color: white;
    				padding: 2em;
   				 border-radius: 30px;
   				 width: 100%;
   				 max-width: 420px;
   				 margin: 1em;
           }

          .container {
               
              text-align: center;
              margin-top: 100px;
              width: 450px;
               
          }
           
          input.search-bar {
               
                  border: none;
    		outline: none;
    		padding: 0.4em 1em;
    		border-radius: 24px;
    		background: #0000008c;
    		color: white;
    		font-family: inherit;
    		font-size: 105%;
    		width: calc(100% - 100px);
		}
          
	button {
		margin: 0.5em;
   	 border-radius: 50%;
   	 border: none;
   	 height: 44px;
   	 width: 44px;
  	  outline: none;
  	  background: #7c7c7c2b;
  	  color: white;
   	 cursor: pointer;
   	 transition: 0.2s ease-in-out;
		}
           
	.search{
		display: flex;
    align-items: center;
    justify-content: center;
	}

	.box {
		
				background: #000000d0;
   				 color: white;
    				padding: 2em;
   				 border-radius: 30px;
   				 width: 100%;
   				 max-width: 420px;
   				 margin: 1em;
		}

          #weather {
               
              margin-top:15px;
               
          }
  </style>
<body>
    <div class="container">
	<div class="box">
       
          <h1>What's The Weather?</h1>
        
          <form>
  <fieldset class="form-group">
    <label for="city">Enter the name of a city.</label>
	

	<div>
	<div class="search">
	
    <input type="text" class="search-bar" name="city" id="city"  value = "">
    <!--<button onclick="getLocation()">Try It</button>-->

<p id="demo"></p>
  </fieldset>
   
  <button type="submit">
	 <svg
            stroke="currentColor"
            fill="currentColor"
            stroke-width="0"
            viewBox="0 0 1024 1024"
            height="1.5em"
            width="1.5em"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M909.6 854.5L649.9 594.8C690.2 542.7 712 479 712 412c0-80.2-31.3-155.4-87.9-212.1-56.6-56.7-132-87.9-212.1-87.9s-155.5 31.3-212.1 87.9C143.2 256.5 112 331.8 112 412c0 80.1 31.3 155.5 87.9 212.1C256.5 680.8 331.8 712 412 712c67 0 130.6-21.8 182.7-62l259.7 259.6a8.2 8.2 0 0 0 11.6 0l43.6-43.5a8.2 8.2 0 0 0 0-11.6zM570.4 570.4C528 612.7 471.8 636 412 636s-116-23.3-158.4-65.6C211.3 528 188 471.8 188 412s23.3-116.1 65.6-158.4C296 211.3 352.2 188 412 188s116.1 23.2 158.4 65.6S636 352.2 636 412s-23.3 116.1-65.6 158.4z"
            ></path>
          </svg>	
</button>
</div>
</form>
       
          <div id="weather"><?php
               
              if ($weather) {
                   
                  echo '<div class="card">
  '.$weather.'
</div>';
                   
              } else if ($error) {
                   
                  echo '<div class="card">
  '.$error.'
</div>';
                   
              }
               
              ?></div>
      </div>
	
    <!-- jQuery first, then Bootstrap JS.--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>-->
    <!--<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}
</script>-->
</body>
</html>