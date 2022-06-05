<?php

  
require('config/config.php');
require('config/db.php');
$i=0;  
// CURRENT DATE CHECKER
$date = new DateTime(date('Y-m-d h:i:s a', time()));
$date->sub(new DateInterval('P0DT9H0M'));
$finalDate = $date->format('Y-m-d');

$userId =intval($_COOKIE['USERS']);

// //READ QUERY

$id = isset($_POST['id'])?$_POST['id']: '';

// SHOW USERNAME
$name = 'SELECT email FROM data1 WHERE id = '. $userId;
$resultName =  mysqli_query($conn,$name);
$showName = mysqli_fetch_all($resultName, MYSQLI_ASSOC);


//  default
 $query = "SELECT * FROM task WHERE userId = '$userId' && dateTask = '$finalDate' ORDER BY timeto, dateTask";
 $header = "Today's Task";

// GILID NAVS
if(isset($_POST['import'])){
   
 
}
else if(isset($_POST['delete'])){
 
}
else if(isset($_POST['all'])){
  
  $dateAll = "SELECT DISTINCT dateTask FROM task WHERE userId = '$userId' order by dateTask ";
  $query = "SELECT * FROM task WHERE userId = '$userId' ";
    
  $showdate = mysqli_query($conn,$dateAll);
  $allDate = mysqli_fetch_all($showdate, MYSQLI_ASSOC);

}
else{

  $dateAll = "SELECT dateTask FROM task where dateTask = '$finalDate'";
  $query = "SELECT * FROM task WHERE userId = '$userId' && dateTask = '$finalDate' ORDER BY timeto, dateTask";
    
  $showdate = mysqli_query($conn,$dateAll);
  $allDate = mysqli_fetch_all($showdate, MYSQLI_ASSOC);

  $header = "Today's Task";

}


// TASK CHOICES

$updateImportant = "UPDATE task SET important = ";  
$updateProgress = "UPDATE task SET progress = ";  
   // mysqli_query($conn, $updateImportant);

  if(isset($_POST['star'])){
     if($_POST['starvalue'] == 1){
        mysqli_query($conn, $updateImportant.'0 WHERE userId = '.$userId.' && id ='.$id); 
     }else{
        mysqli_query($conn, $updateImportant.'1 WHERE userId = '.$userId.' && id ='.$id);
     }
  }else if(isset($_POST['done'])){
    if($_POST['donevalue'] == 1){
      mysqli_query($conn, $updateProgress.'0 WHERE userId = '.$userId.' && id ='.$id); 
   }else{
      mysqli_query($conn, $updateProgress.'1 WHERE userId = '.$userId.' && id ='.$id);
   }
  }
  


$result = mysqli_query($conn,$query);
// needed for outputss

$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_free_result($resultName);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <!-- JavaScript Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/5cc457458b.js"
      crossorigin="anonymous"
    ></script>

 
    
    <link rel="stylesheet" href="home.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <!-- <link rel="stylesheet" href="insert.css"> -->
    <title>Document</title>
  </head>
  <body>
    <!-- <style>
      #links  button:hover {color: red;
}

    </style> -->
    <nav
      class="
        navbar navbar
        d-flex
        justify-content-around
        flex-wrap
        bg-light
        sticky-top"
    >
      <div>
        <h2>Hello,<span class="text-primary"><?php echo $showName[0]['email'] ?></span></h2>
      </div>
     <a href="" class="text-decoration-none">Logout<i class="fas fa-sign-out-alt"></i></a>
    </nav>

      <!-- NAVBAR SAGILID -->
    
    <div class="holders d-flex flex-wrap text-body bg-light fixed-top flex-column">
    <form method="POST"  action="<?php $_SERVER['PHP_SELF']; ?>">
    
      <div id="links" class="links d-flex flex-wrap flex-column justify-content-between align-items-start ms-5 ">
      <button type="submit"name="all" class= "bg-transparent border-0 ">
      <i class="fas fa-calendar"></i><b>All</b> 
      </button>
      <button type="submit"name="today" class=" bg-transparent border-0 ">
      <i class="fas fa-calendar-day"></i><b>Today</b> 
      </button>

      <button type="submit"name="import" class=" bg-transparent border-0">
        <i name='important' class="fas fa-star"></i><b>Important</b> 
      </button>

      <button type="submit"name="upcoming" class=" bg-transparent border-0">
        <i class="far fa-calendar-alt"></i><b>Upcoming</b>
      </button>
      <button type="submit"name="report" class=" bg-transparent border-0">
      <i class="fas fa-chart-pie"></i><b>Reports</b>
      </button>

      <button type="submit"name="trash" class=" bg-transparent border-0">
        <i class="fas fa-trash-alt " ></i><b>Trash</b>
      </button>
       
      </div>

      <h4 class='text-center text-primary'>Classification</h4>
      <div class='classification d-flex flex-wrap flex-column align-items-start'>
      <button type="submit" class=" bg-transparent border-0">
       Work
      </button>
      <button type="submit" class=" bg-transparent border-0">Subject Sched
      </button>
      <button type="submit"class=" bg-transparent border-0">
      Assignment
      </button>
      <button type="submit"class=" bg-transparent border-0">
      Outing
      </button>
       
      </div>
      </form>
    </div>

    <!-- COLLAB -->

    <div class="colab d-flex flex-column flex-wrap ">       
      <h1 class="text-center mt-4 text-primary">Collaborations</h1>
      <div class="collabs d-flex justify-content-center ">
        <section class="task-holder">
          <div class="info">
            <div>
              <p class="title">Group 7 Nlp</p>
              
           <div class="time-collab">10:30 am - 11:30pm<p class="time-collab"></p></div>
            </div>
            <div>
              <div class="settings d-flex gap-2">
              <!-- DROPDOWN -->
                  <div class="dropdown-container" tabindex="-1">
                    <div class="three-dots"></div>
                    <div class="dropdown">
                      <a href="#"><div>Add People</div></a>
                      <a href="#"><div>Edit</div></a>
                      <a href="#"><div>Leave</div></a>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="faces position-absolute">

            <img src="dp\1.jpg" alt="">
            <img src="dp\3.jpg" alt="">
            <img src="dp\2.jpg" alt="">
          </div>
        </section>
      </div> 
      <div class="collabs d-flex justify-content-center ">
        <section class="task-holder">
          <div class="info">
            <div>
              <p class="title">Title</p>
              
          <div class="time-collab"><p class="time-collab">time</p></div>
            </div>
            <div>
              <div class="settings d-flex gap-2">
                <i class="fas fa-check-circle"></i><i class="fas fa-trash-alt"></i><i class="fas fa-edit"></i></i>
              </div>
            </div>
          </div>
          <p class="description">mukha nila</p>
        </section>
      </div> 
      <section class=" w-50 mx-auto text-white text-center p-3 rounded-pill bg-danger">
                        <span>Collaborate</span>
       <section>
      
    </div> 

    <!-- container -->
    <div class="holder d-flex justify-content-center flex-wrap text-body mt-5"> 
      
    <?php  foreach ($allDate as $pastdate) :?>
      <h1 class="w-100"><?php echo $pastdate['dateTask'] ?><?php ?></h1>

      <?php foreach($tasks as $task) : ?>
        <?php if($pastdate['dateTask'] == $tasks[$i]['dateTask']) :
        // var_dump($tasks); 
        echo $tasks[$i]['dateTask']?> 
      
        <?php echo $i; $i++; echo sizeof($tasks)?>
      <div class="task d-flex justify-content-center w-45">
        <section class="task-holder">
          <div class="info">
            <div>
           
              <p class="title"><?php echo $task['title'];?></p>
              <p class="description"><?php echo $task['description']; ?></p>
            </div>
              <!-- TASK CHOICES -->
              <div class="settings d-flex gap-2">
                <form method="POST"  action="home.php">
                  <!-- HIDDEN ID FOR IMPORTANT -->
              <input type="hidden" name = "id" class="title" value = <?php echo $task['id'];?>>
              <input type="hidden" name = "starvalue" class="title" value = <?php echo $task['important'];?>>
              <input type="hidden" name = "donevalue" class="title" value = <?php echo $task['progress'];?>>
              <button class="star" type="submit" name="done"
              <?php
              
              //  UNANG KULAY
              if($task['progress'] == 1){
                echo 'style="color:#0D6EFD;background-color:#eafff5;"';
              }
              ?>   >
              <i class="fas fa-check-circle "></i></button>
              <button class="star" type="submit" name="star" 
              <?php
              
                //  UNANG KULAY
              if($task["important"] == 1){
                echo 'style="color:#0D6EFD;background-color:#eafff5;"';
              } //  echo $updateImportant.'0 WHERE userId = '.$userId; echo $id; 
              ?>   >

              <i name='important' class="fas fa-star"></i>
             </button>
             <button class="star" type="submit" name="delete"><i class="fas fa-trash-alt"></i></button>
             </form>
             <!-- EDIT -->
             <form method="POST" action="edit.php">
             <input type="hidden" name = "id" value = <?php echo $task['id'];?>>
             <button class="star" name="edit"><i class="fas fa-edit"></i></button>
            
             </form>
             
             </div>
          </div>
          
          <div class="time"><p class="time"><?php echo $task['timefrom'];?>-<?php echo $task['timeto'];?></p></div>
          
          
        </section>
      </div> 
      <?php endif;if(sizeof($tasks) == $i)break;?>  
      <?php endforeach;?>  
      <?php endforeach;?>  
      <!-- add task -->
     
              <?php
             
              if(isset($_POST['import'])){ 
                if($tasks == null){
                  echo '<section class="add w-25 text-muted text-center p-3 ">
                          <span>Nothing Important</span>
                        <section>';
                }
            }else{
              echo '<section class="add w-25 text-muted text-center p-3 ">
                      <form method="POST"  action="insert.php">
                        <button type="submit" name="add" class=" bg-transparent border-0">
                        <i class="fas fa-plus-square"></i> <a>Add New Task</a>
                        </button>
                      <form>
                    </section>';
                
                   
            }
             ?>
          
    </div>
  </body>
</html>
