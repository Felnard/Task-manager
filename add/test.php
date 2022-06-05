<!-- ?php
function generateRandomString($length = 7) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

echo  generateRandomString();
  


if(isset($_POST['done'])){
   echo $trylang = 'pogiako ahahhaha';
  }
  
  $array = [];
  for($i=0;$i <10;$i++){
    array_push($array,rand(1,30));
    
  }
 
print_r($array);

$array = [];
  for($i=0;$i <10;$i++){
    array_push($array,substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(7/strlen($x)) )),1,7));
  }

  foreach($array as $date){
    $resultstr[] = $date;
  }

  var_dump($resultstr)."<br>";

?> -->
<!-- <html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
   JavaScript Bundle with Popper
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="insert.css?v=<?php echo time(); ?>">
<body>

 <button onclick="editTask()" class="w3-button w3-black">Open Animated Modal</button>

  <div id="id01" class=" w3-modal">

    <div class="holder w3-modal-content w3-animate-top ">

      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2 class="">INSERT</h2>
      </header>

      <form method="POST" action="" class="">
      
       <div class="label d-flex flex-column justify-content-center  align-items-center">
         
          <label for="title" class="sr-only">Title</label>
          <input type="text" name="title" placeholder="Title" required />
          <label for="description" class="sr-only">Description</label>
          <textarea 
          type="textarea"
          name="description"
          placeholder="Description"
          required></textarea>

          <label for="classification" class="sr-only">Classification</label >
          <input type="text"name="classification"placeholder="Classification"required/>
          <label for="spotify">Spotify</label>
          <input
          type="text"
          name="spotify"
          placeholder="Copy and paste your playlist here"
          required
        />
        </div>

        <div class='time mt-4'>
        <label for="timefrom" class="sr-only">From</label>
        <input type="time" id="timefrom" name="timefrom" required />

        <label for="timeto" class="sr-only">To</label>
        <input type="time" id="timeto" name="timeto" required />

        <label for="birthday">Date</label>
        <input type="date" id="birthday" name="birthday" />
        </div>
      
        <button type="submit" name="submit" value="Submit">Save</button>
      </form>
    </div>
  </div>

  <script>
    function editTask(){
     return document.getElementById('id01').style.display='block'
    }

  </script>
</body>
</html> -->


<?php  

require('config/config.php');
require('config/db.php');


$arr = array();
if(isset($_POST['all'])){
  
  $dateAll = "SELECT DISTINCT dateTask FROM task WHERE userId = 1 order by dateTask ";
  $query = "SELECT * FROM task WHERE userId = 1 && dateTask = ";
    
  $showdate = mysqli_query($conn,$dateAll);
  $allDate = mysqli_fetch_all($showdate, MYSQLI_ASSOC);


  
//   var_dump($allDate);
// foreach($allDate as $recent)

//   foreach($tasks as $task){

//     if($recent['dateTask'] == $task['dateTask']){
//       var_dump($task).'pogiako';
//     }
//     echo '</br>';
//   }
$date = new DateTime(date('Y-m-d h:i:s a', time()));
$date->sub(new DateInterval('P0DT9H0M'));

for($i =0; $i <10; $i++){

  $date->modify("-1 day");
  $finalDate = $date->format('Y-m-d');

  array_push($arr, $finalDate); 
}

echo $sting = implode(",", $arr);
}

?>
</br>
<form action="test.php" method="POST">

<button type="submit"name="all" class= "bg-transparent border-0 " >Button</button>

</form>

<?php foreach($allDate as $recent) : ?>

  <h1>Different time</h1>
  <?php
    
  $holder = $recent["dateTask"];

  $result = mysqli_query($conn,$query."'$holder'");
  $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

    ?>
    
    <?php foreach($tasks as $task) : ?>
      
      <div class="well">
        
                      <tbody>
                          <tr> 
                          <td><b><?php echo $task['dateTask'];?></b></td>
                          <th scope="row"><?php echo $task['title'];?></th>
                          <td><?php echo $task['description'];?></td>
                          <td><?php echo $task['timeto'];?></td>
                          <td><?php echo $task['timefrom'];?></td>
                        
                          </tr>
                      
                      </tbody>
      </div>
      
      <?php endforeach; ?>
      
    <?php endforeach; ?>
   