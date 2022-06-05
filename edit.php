<?php

require('config/config.php');
require('config/db.php');

  
$id = $_POST['id'];

$query = 'SELECT * FROM task WHERE id ='. $id;

if(isset($_POST['submit'])){ 
  $title = mysqli_real_escape_string($conn,$_POST['title']);
  $description = mysqli_real_escape_string($conn,$_POST['description']);
  $spotify = mysqli_real_escape_string($conn,$_POST['spotify']);
  $timefrom =  date('h:i a', strtotime(mysqli_real_escape_string($conn,$_POST['timefrom'])));
  $timeto = date('h:i a', strtotime(mysqli_real_escape_string($conn,$_POST['timeto'])));
  $date = date('Y-m-d', strtotime(mysqli_real_escape_string($conn,$_POST['birthday'])));
  
  $update = "UPDATE task SET title = '$title', description = '$description', spotify = '$spotify', timefrom = '$timefrom', timeto = '$timeto', dateTask = '$date' WHERE id = '$id'";

  mysqli_query($conn,$update);
  header('Location: home.php');
}


$result = mysqli_query($conn,$query);
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);  



?>
<html>
  <title>W3.CSS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
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

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
  <link rel="stylesheet" href="insert.css?v=<?php echo time(); ?>" />
  <body>
    <div id="id01" class="w3-modal" style="display: block">
      <div class="holder w3-modal-content w3-animate-top">
        <header class="w3-container w3-teal">
          <h2 class="">INSERT</h2>
        </header>

        <form method="POST" action="edit.php" class="">
          <div
            class="
              label
              d-flex
              flex-column
              justify-content-center
              align-items-center
            "
          > <?php foreach($tasks as $task) : ?>
            <input type="hidden" name = "id" class="title" value = <?php echo $task['id'];?>>
              
            <label for="title" class="sr-only">Title</label>
            <input type="text" name="title" placeholder="Title" value ="<?php echo $task['title']?>" required />
            <label for="description" class="sr-only" >Description</label>
            <textarea
              type="textarea"
              name="description"
              placeholder="Description"
              required
            ><?php echo $task['description']?> </textarea>
            <label for="spotify">Spotify</label>
            <input
              type="text"
              name="spotify"
              placeholder="Copy and paste your playlist here"
              value ="<?php echo isset($task['spotify'])?$task['spotify']:'' ?>"
              
            />
          </div>

          <div class="time mt-4">
            <label for="timefrom" class="sr-only">From</label>
            <input type="time" id="timefrom" name="timefrom" value =<?php echo date("H:i", strtotime($task['timefrom']));?>  required />

            <label for="timeto" class="sr-only">To</label>
            <input type="time" id="timeto" name="timeto" value =<?php echo $task['timeto']?>  required />

            <label for="birthday">Date</label>
            <input type="date" id="birthday"value ="<?php echo $task['dateTask']?>"  name="birthday" />
          </div>
          <?php endforeach;?> 
          <button type="submit" name="submit" value="Submit">Save</button>
        </form>
      </div>
    </div>
  </body>
</html>