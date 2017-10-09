<?php
     if($_GET['city']){
    $queryString = 'http://api.openweathermap.org/data/2.5/weather?q='.$_GET['city'].'&appid=7907a4fd42dd459a5446d8eb3b649047';
    $input = @file_get_contents($queryString);
    if($input == FALSE) {
} else {
     $weather = json_decode($input, true);
}
       
    
     }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
<div class="bg">
    <div class='container'>
        <div class="row">
            
            
            <div class="col-xs-12">
                <h1>What's the Weather?</h1>
                <p>Enter the name of a city: </p>
<form>
  <div class="form-row align-items-center">
      <label class="sr-only" for="inlineFormInput">Name</label>
      <input type="text" class='form-control' name='city' id="city" placeholder="Eg. Longon, New York">
      <button type="submit" class="btn btn-basic">Submit</button>
  </div>
</form>
            </div>
            
            <?php
            if($_GET['city'] && $input != FALSE){
        echo ' <div class="section">';
           
          echo '<p><strong>'.$_GET['city'].'</strong></p>';
          echo '<p>The weather in '.$_GET['city'].' is "'. $weather['weather'][0]['description'].'".</p>';
          echo 'The humidity is  '. $weather['main']['humidity'].'%.<br>';
          echo 'The temperature is '. ($weather['main']['temp']-273.15).'°C.<br>';
          echo 'The amount of clouds is '. $weather['clouds']['all'].'%.<br>';
          
          echo 'The speed of the wind is  '. $weather['wind']['speed'].'m/s.<br><br>';
         
		
    	echo '</div>';
            }
	 ?>
        </div>
    </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>