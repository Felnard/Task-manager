<?php

$page = $_SERVER['PHP_SELF'];
$sec = "10";

$date = new DateTime(date('H:i:s', time()));
$date->sub(new DateInterval('P0DT9H0M'));
$finalDate = $date->format('H:i:s');


session_start();

$_SESSION['count'] += 1;
$num_visits = $_SESSION['count'];
$meta = 'http-equiv="refresh"';
var_dump($num_visits);
?>
<html>
    <head>
    <meta  <?php 
               
                    if($finalDate > '08:28:31'){
                        if($num_visits <= 5){
                            
                        $audio =  '<audio controls autoplay> <source src="alarm.mp3" type="audio/mpeg"></audio>';
                    }
                    else{
                        // $finalDate > '17:42:51';
                       
                        $_SESSION['count'] = 0;
                        
                    }
        }
  
     ?> <?php  echo $meta ?>content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>


    <body>
    
    <?php

        if($num_visits > 5){
            session_destroy(); 
        } 
        echo $audio;
        echo $finalDate;

        $link = 'https://open.spotify.com/playlist/37i9dQZF1DXbYM3nMM0oPk';
        $una = substr($link, 0, 25);
        
        $result = $una.'embed/' .substr($link, 25);
        echo $result ;
    ?>  
    
    </body>
</html>