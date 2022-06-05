<?php

  
require('config/config.php');
require('config/db.php');
require('functions.php');


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
        sticky-top"
    >
    <div class="d-flex align-items-center">
    <img src="<?php echo "images\\".$showImage[0]["profilepic"]?>"><h2 class="d-block">Hello,<span class="text-primary"><?php echo $showName[0]['email'];?></span></h2>
      </div>
      <form method="POST" action="editprofile.php"><a href="" class="text-decoration-none">Logout<i class="fas fa-sign-out-alt"></i></a> <button class="bg-danger border-0 text-white rounded-pill" type="submit" value="" name="editprofile">Edit profile</button></form> 
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

      
      <button type="submit"name="report" class=" bg-transparent border-0">
      <i class="fas fa-chart-pie"></i><b>Reports</b>
      </button>

    </form>
     <form action="trash.php" method="POST">
       <button type="submit" name="trash" class=" bg-transparent border-0">
        <i class="fas fa-trash-alt " ></i><b>Trash</b>
      </button>
    </form>
      
    </div>

      <!-- CLASSIFICATION -->
    <!-- <form >
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
    <h1 class="fw-bold">Reports</h1>
            <div class="reports d-flex flex-row w-100">
              <div class="column">
                <h2>All Task</h2>
                <p><?php echo $showall[0]['Total']?></p>
              </div>
              <div class="column" >
              <h2>Finished Tasks</h2>
                <p><?php echo $allfinished[0]['Finished']?></p>
              </div>
              <div class="column"><h2>Skipped</h2>
                <p><?php echo $showpending[0]['Today']?></p>
              </div>
            </div>
          
            <div class="d-flex flex-column flex-wrap align-items-center mt-5 w-100">
              <canvas id="myChart"></canvas>
              <h1 class="w-100 border-top mt-5 p-3">Task Per Day</h1>
              <canvas class="border" id="myChart2" ></canvas>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    </div>

    <script>

        var xValues = ["Finished", "Pending"];
        var yValues = [<?php echo $showfinished[0]['Finished']?>, <?php echo $showtoday[0]['Today']?>];
        var barColors = ["#0D81FD", "gray"];
  
        new Chart("myChart", {
          type: "doughnut",
          data: {
            labels: xValues,
            datasets: [
              {
                backgroundColor: barColors,
                data: yValues,
              },
            ],
          },
          options: {
            title: {
              display: true,
              text: "Your tasks Today",
            },
          },
        });
       
        var xValues = [<?php listDate();?>];
        var yValues = [<?php taskPerDay();?>];
        
        new Chart("myChart2", {
          type: "line",
          data: {
            labels: xValues,
            datasets: [
              {
                fill: false,
                lineTension: 0,
                backgroundColor: "rgba(0,0,255,1.0)",
                borderColor: "rgba(0,0,255,0.1)",
                data: yValues,
              },
            ],
          },
          options: {
            legend: { display: false },
            scales: {
              yAxes: [{ ticks: { min: 0, max: 16 } }],
            },
          },
        });
      </script>
  
  </body>
</html>
