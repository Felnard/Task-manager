
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="report.css?v=<?php echo time(); ?>">
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
        <img src="background.jpg" alt=""><h2 class="d-block ">Hello,<span class="text-primary">Felnard</span></h2>
      </div>
     <form action=""><a href="" class="text-decoration-none">Logout<i class="fas fa-sign-out-alt"></i></a> <button class="bg-danger border-0 text-white rounded-pill" type="submit" value="" name="star">Edit profile</button></form> 
    </nav>

      <!-- NAVBAR SAGILID -->
    
    <div class="holders d-flex flex-wrap text-body bg-light fixed-top flex-column">
    <form method="POST"  action="">
    
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
      <section class=" w-50 mx-auto text-white text-center p-3 rounded-pill bg-danger">
                        <span>Collaborate</span>
       <section>
      
    </div>  

    <!-- container -->
    <div class="holder d-flex justify-content-center flex-wrap text-body mt-5">
        <h1 class="">Reports</h1>
            <div class="reports d-flex flex-row w-100">
              <div class="column">
                <h2>Total Task</h2>
                <p>100</p>
              </div>
              <div class="column" >
                <h2>Skipped</h2>
                <p>20</p>
              </div>
              <div class="column">
                <h2>Finished Tasks</h2>
                <p>50</p>
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
        var xValues = ["Done", "In Progress", "Pending"];
        var yValues = [1, 3, 2];
        var barColors = ["#0D6EFD", "yellow", "gray"];
  
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
        
        // var xValues = [?php print_r(implode(',', $array))?>];
        var xValues = ["Nov 20","Nov 20","Nov 20","Nov 20","Nov 20","Nov 20","Nov 20","Nov 20"]
       
        var yValues = [7, 0, 8, 9, 9, 9, 10, 11,10, 11];
        
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
