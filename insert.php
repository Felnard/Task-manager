<?php
  
  require('config/config.php');
  require('config/db.php');

  if(isset($_POST['submit'])){
  $title = mysqli_real_escape_string($conn,$_POST['title']);
  $description = mysqli_real_escape_string($conn,$_POST['description']);
  $spotify = mysqli_real_escape_string($conn,$_POST['spotify']);
  $timefrom =  date('h:i a', strtotime(mysqli_real_escape_string($conn,$_POST['timefrom'])));
  $timeto = date('h:i a', strtotime(mysqli_real_escape_string($conn,$_POST['timeto'])));
  $date = date('Y-m-d', strtotime(mysqli_real_escape_string($conn,$_POST['birthday'])));
  
  // $date = mysqli_real_escape_string($conn,$_POST['birthday']);

  $userId =intval($_COOKIE['USERS']);

  $query = "INSERT INTO task(title, description,spotify,timefrom,timeto,userId,dateTask) VALUES('$title', '$description','$spotify','$timefrom','$timeto','$userId', '$date')";

  if(mysqli_query($conn, $query)){
    header('Location: home.php');
    }
  else {
     echo '<div class="p-3 mb-2 bg-warning text-dark">'. mysqli_error($conn).'</div>' ;
  }
    echo $date;
    var_dump($date) ;
  
}
echo isset($_COOKIE['USERS'])?'fsafaf':'pogiako';
echo $_COOKIE['USERS'];

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
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
    <link rel="stylesheet" href="insert.css?v=<?php echo time(); ?>" />
    <title>Document</title>
  </head>
  <body style='background-image: url("background.jpg");'>
  <div id="id01" class="d-flex justify-content-center w-100 ">
        <form method="POST" action="insert.php" class="bg-white ">
          <div
            class="
              label
              d-flex
              flex-column
              justify-content-center
              align-items-center
            "
          > 
            <input type="hidden" name = "id" class="title">
              
            <label for="title" class="sr-only">Title</label>
            <input type="text" name="title" placeholder="Title" required />
            <label for="description" class="sr-only" >Description</label>
            <textarea 
              type="textarea"
              name="description"
              placeholder="Description"
              required
            ></textarea>

            <label for="spotify">Spotify</label>
            <input
              type="text"
              name="spotify"
              placeholder="Copy and paste your playlist here"
             
              
              
            />
          </div>

          <div class="time mt-4">
            <label for="timefrom" class="sr-only">From</label>
            <input type="time" id="timefrom" name="timefrom"  required />

            <label for="timeto" class="sr-only">To</label>
            <input type="time" id="timeto" name="timeto"   required />

            <label for="birthday">Date</label>
            <input type="date" id="birthday"  name="birthday" />
          </div>
          <button type="submit" name="submit" value="Submit">Save</button>
        </form>
      </div>
    </div>
    
  </body>
</html>
