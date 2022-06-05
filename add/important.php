
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="home.css" />
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
        sticky-top
      "
    >
      <div>
        <h2>Hello,<span class="text-primary"><?php echo $showName[0]['email'] ?></span></h2>
      </div>
     <a href="" class="text-decoration-none">Logout<i class="fas fa-sign-out-alt"></i></a>
    </nav>

      <!-- NAVBAR SAGILID -->
    
    <div class="holders d-flex flex-wrap text-body bg-light fixed-top flex-column">
      
      <div class="links d-flex flex-wrap flex-column justify-content-between">
        <a href="home.php"><i class="fas fa-plus-square"></i>Today</a>
        <a href="important.php"><i class="fas fa-trash-alt"></i>Important</a>
        <a href=""><i class="fas fa-trash-alt"></i>Upcoming</a>
        <a href=""><i class="fas fa-trash-alt"></i>Trash</a>
      </div>


      <div class='classification d-flex flex-wrap flex-column justify-content-start'>
        <a href="">Felnard</a>
        <a href="">Felnard</a>   <a href="">Felnard</a>    <a href="">Felnard</a>
        <a href="">Felnard</a>   <a href="">Felnard</a>    <a href="">Felnard</a>
        
      </div>
     
    </div>

    <!-- COLLAB -->

    <div class="colab d-flex flex-column flex-wrap ">       
      <h1 class="text-center mt-5">Collaborations</h1>
      <div class="collabs d-flex justify-content-center">
        <section class="task-holder">
          <div class="info">
            <div>
              <p class="title"></p>
              
          <div class="time-collab"><?php echo $starquery ;?><p class="time-collab"></p></div>
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
      
      
    </div> 

    <!-- container -->
    
             

   
     <!-- <iframe src="https://open.spotify.com/embed/playlist/3xqcAMgjHGrv3ElA51zZRj?utm_source=generator" width="30%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture">Felnard</iframe> -->
    <!-- <footer class="mastfoot mt-auto text-center p-3 bg-dark mt-3 text-white ">
      <div class="inner">
        <p >Created by <a href="https://github.com/Felnard" class="text-decoration-none">Felnard </a></p>
      </div>
  </footer> -->
  </body>

  
</html>
