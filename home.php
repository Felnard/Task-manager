<?php

  
require('config/config.php');
require('config/db.php');
require('functions.php');

$userId =intval($_COOKIE['USERS']);
// //READ QUERY

$id = isset($_POST['id'])?$_POST['id']: '';



//  default
 $query = "SELECT * FROM task WHERE userId = '$userId' && trash = 0  && dateTask = '$finalDate' ORDER BY timeto, dateTask";
 $header = "Today's Task";

// GILID NAVS
if(isset($_POST['import'])){
   
  $query = 'SELECT * FROM task WHERE userId = '. $userId. '&& trash = 0  && important = 1 ORDER BY dateTask, timeto';
  $header = 'Important';

}
else if(isset($_POST['delete'])){
  $delete = "DELETE FROM task WHERE id = '$id' ORDER BY timeto, dateTask";
  mysqli_query($conn,$delete);
}
else if(isset($_POST['report'])){
  header('Location: reports.php');

}
else{
  $query = "SELECT * FROM task WHERE userId = '$userId' && trash = 0  && dateTask = '$finalDate' ORDER BY timeto, dateTask";
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
  }else if(isset($_POST['trashbin'])){
    $trashUpdate = "UPDATE task SET trash = 1 WHERE userId = $userId && id = $id ";
    mysqli_query($conn, $trashUpdate);
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
    <title>Document</title>
  </head>
  <body>
    
    <nav
      class="
        navbar navbar
        d-flex
        justify-content-around
        flex-wrap
        bg-light
        sticky-top">
        <div class="d-flex align-items-center">
      <img alt='pgiako'src="<?php echo "images\\".$showImage[0]["profilepic"]?>"><h2 class="d-block">Hello,<span class="text-primary"><?php echo $showName[0]['email'];?></span></h2>
      </div>
       <form method="POST" action="editprofile.php"><button type="submit" name="logout" class="border-0 bg-transparent"> <a  class="text-decoration-none">Logout<i class="fas fa-sign-out-alt"></i></a> </button> <button class="bg-danger border-0 text-white rounded-pill" type="submit" value="" name="editprofile">Edit profile</button></form> 
    
    </nav>

      <!-- NAVBAR SAGILID -->
    
    <div class="holders d-flex flex-wrap text-body bg-light fixed-top flex-column">
    <!-- ALL BUTTON -->
      <form method="POST" action="all.php" >
        <div id="kabila" class="position-absolute d-flex flex-wrap flex-column justify-content-between align-items-start ms-5 ">
        <button type="submit" name="all" class=" bg-transparent border-0 ">
        <i class="fas fa-calendar"></i><b>All</b> 
        </button>
        <button type="submit"name="upcoming" class=" bg-transparent border-0">
          <i class="far fa-calendar-alt"></i><b>Upcoming</b>
        </button>
        </div>
      </form>

    <form method="POST"  action='home.php'>
      
      <div id="links" class="links d-flex flex-wrap flex-column justify-content-between align-items-start ms-5 ">
      
      <button type="submit"name="today" class=" bg-transparent border-0 ">
      <i class="fas fa-calendar-day"></i><b>Today</b> 
      </button>

      <button type="submit"name="import" class=" bg-transparent border-0">
        <i name='important' class="fas fa-star"></i><b>Important</b> 
      </button>

      
      <button type="submit" name="report" class=" bg-transparent border-0">
      <i class="fas fa-chart-pie"></i><b>Reports</b>
      </button>

      
       </form>
       <form action="trash.php" method="POST">
       <button type="submit" name="trash" class=" bg-transparent border-0">
        <i class="fas fa-trash-alt " ></i><b>Trash</b>
      </button></form>
      </div>

      

      <!-- CLASSIFICATION -->
   
      <!-- <form method="POST" action="home.php">
    
      <h4 class='text-center text-primary'>Classification</h4>
        <div class='classification d-flex flex-wrap flex-column align-items-start'>
        <?php foreach ($showclassification as $classifications):?>
        <button type="submit" name='<?php echo $classifications['classification']?>' class=" bg-transparent border-0">
         <span name='<?php echo $classifications['classification']?>' ><?php 
          echo $classifications['classification'];
          
          ?></span> 
          
        </button>
        <?php endforeach;?>
        </div>
      </form> -->
    </div>

    <!-- COLLAB -->

    <div class="colab d-flex flex-column flex-wrap ">       
      <h1 class="text-center mt-4 text-primary">Collaborations</h1>
      <?php foreach($showcollab as $collabs) : ?>
      <div class="collabs d-flex justify-content-center " <?php  echo collabColor($collabs["color"]) ; ?>>
        <section class="task-holder">
          <div class="info">
            <div>
              <p class="title"><?php echo $collabs['groupname']?></p>
              <div class="time-collab"><?php echo $collabs['timefrom'].'-'.$collabs['timeto'] ?><p class="time-collab"></p></div>
            </div>
            <div>
              <div class="settings d-flex gap-2">
              <!-- DROPDOWN -->
              <form action="collab.php" method="POST"> 
                
                  <div class="dropdown-container" tabindex="-1">
                  <input type="hidden" value="<?php echo $collabs['collabId']?>" name='collabId'>
                  <input type="hidden" value="<?php echo $collabs['groupname']?>" name='groupname'>
                  <input type="hidden" value="<?php echo $collabs['groupcode'] ?>" name='groupcode'>
                  <input type="hidden" value="<?php echo $collabs['color'] ?>" name='color'>
                  <input type="hidden" value="<?php echo $collabs['timefrom'] ?>" name='timefrom'>
                  <input type="hidden" value="<?php echo $collabs['timeto'] ?>" name='timeto'>
                    <div class="three-dots"></div>
                    <div class="dropdown">
                      <button class="border-0 w-100" name= 'editgroup'> <a ><div>Edit</div></a></button>
                      <button class="border-0 w-100" name= 'leave'> <a ><div>Leave</div></a></button>
                      </div>
                </div>
                
              </form>
              </div>
            </div>
          </div>
          <div class="faces position-absolute">
              <?php
                    
              $allname = 'SELECT username FROM collab where groupcode = "'. $collabs['groupcode']. '"';
             
              $resultAllName =  mysqli_query($conn,$allname);
              $showAllName = mysqli_fetch_all($resultAllName, MYSQLI_ASSOC);

              foreach($showAllName as $names){

                $email= $names['username'];


                $photo = 'SELECT profilepic FROM data1 where email ='. "'$email'";
                
                $photoresult = mysqli_query($conn,$photo);
                $showImage = mysqli_fetch_all($photoresult, MYSQLI_ASSOC);
                
                $photolink =$showImage[0]["profilepic"];

                echo '<img src="images\\'. $photolink.'">';
              }

              ?>
          </div>
        </section>
      </div> 
        <?php endforeach; mysqli_close($conn);?>
        <!-- ?php print_r($showcollab )?> -->


       <form method="POST" action="collab.php">
      <section class=" w-50 mx-auto text-white text-center p-3 rounded-pill bg-danger">
             <input type="hidden" name = "id" value = ''>
             <button class ='bg-transparent text-white border-0'name="collab">Collaborate</button>
            
       <section>
       </form>      
    </div> 

    <!-- container -->
    <div class="holder d-flex justify-content-center flex-wrap text-body mt-5"> 
      <!-- ?php  var_dump($dates).'pogiako'; echo $dateAll;?> -->
   
      <h1 class="w-100 fw-bold text-center"><?php echo $header ?><?php ?></h1>
      <?php foreach($tasks as $task) : ?>
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
              <input type="hidden" name = "trashvalue" class="title" value = <?php echo $task['trash'];?>>
              
              <button class="star" type="submit" name="done"
              <?php  
                echo changeColor($task["progress"]) 
              ?> >
              <i class="fas fa-check-circle "></i>
            </button>

              <button class="star" type="submit" name="star" 
              <?php
              echo changeColor($task["important"]) ;
              ?>   >
              <i name='important' class="fas fa-star"></i>
            </button>
 
             <button class="star" type="submit" name="trashbin">
              <i class="fas fa-trash-alt"></i>
            </button>
             </form>
             <!-- EDIT -->
             <form method="POST" action="edit.php">
             <input type="hidden" name = "id" value = <?php echo $task['id'];?>>
             <button class="star" name="edit"><i class="fas fa-edit"></i></button>
            
             </form>
             
             </div>
          </div>
          <iframe src= "<?php echo spotify($task['spotify']) ?>" class=""  width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
          <div class="time"><p class="time"><?php echo $task['timefrom'];?>-<?php echo $task['timeto'];?></p></div>
          
        </section>
      </div> 
      <?php endforeach;?>  
     
             <!-- add task -->
            <?php
              echo addTasks($tasks);
             ?>
          
    </div>
  </body>
</html>
