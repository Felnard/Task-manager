<?php 
 
 require('config/config.php');
 require('config/db.php');
 require('functions.php');

 $groupcode = isset($_POST['groupcode'])?$_POST['groupcode']: '';
 $collabId = isset($_POST['collabId'])?$_POST['collabId']: '';
 $groupname = isset($_POST['groupname'])?$_POST['groupname']: '';
 $timefrom =  isset ($conn,$_POST['timefrom'])?date('h:i a', strtotime(mysqli_real_escape_string($conn,$_POST['timefrom']))):'';
  $timeto = isset ($conn,$_POST['timeto'])?date('h:i a', strtotime(mysqli_real_escape_string($conn,$_POST['timeto']))):'';
$color = isset($_POST['color'])?$_POST['color']: '';


 $allname = 'SELECT email FROM data1';
 $resultAllName =  mysqli_query($conn,$allname);
 $showAllName = mysqli_fetch_all($resultAllName, MYSQLI_ASSOC);


//  foreach($showAllName as $usernames){
//    echo $usernames['email'];
//  }

//EDIT
if(isset($_POST['submit']) && !empty($groupcode)){
     $sql = "UPDATE collab SET groupname = '$groupname',color = '$color',timefrom = '$timefrom',timeto = '$timeto' where groupcode= '$groupcode'";
     if(mysqli_query($conn, $sql)){
       echo 'NAPALITAN NA';
      
      //  header('Location: home.php');
       }
       // ADD MEMBERS
       $string =mysqli_real_escape_string($conn,$_POST['member']);
       $arr = explode(",",$string);
       foreach($arr as $name){
      $query = "INSERT INTO collab(groupname, color,groupcode,username,timefrom,timeto) VALUES('$groupname', '$color','$groupcode','$name','$timefrom','$timeto')";

        foreach($showAllName as $usernames){
          if($usernames['email'] !=  $name){
            echo 'wala siya dito';
          }
          else{
          if(mysqli_query($conn, $query)){
           
            }
          }
        }
      }
      header('Location: home.php');
   }
   //NEW GROUP
else if(isset($_POST['submit'])){
  $groupname = mysqli_real_escape_string($conn,$_POST['groupname']);
  $color = mysqli_real_escape_string($conn,$_POST['color']);
  $groupcode = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(1/strlen($x)) )),1,10);
  $timefrom =  date('h:i a', strtotime(mysqli_real_escape_string($conn,$_POST['timefrom'])));
  $timeto = date('h:i a', strtotime(mysqli_real_escape_string($conn,$_POST['timeto'])));
  
  $string =mysqli_real_escape_string($conn,$_POST['member'] . ','. $showName[0]['email']);
  $arr = explode(",",$string);

  // USERNAMELIST
  
  // echo $string.'sobrgagag';
  foreach($arr as $name){
    $query = "INSERT INTO collab(groupname, color,groupcode,username,timefrom,timeto) VALUES('$groupname', '$color','$groupcode','$name','$timefrom','$timeto')";

    foreach($showAllName as $usernames){
      if($usernames['email'] !=  $name){
        echo 'wala siya dito';
      }
      else{
      if(mysqli_query($conn, $query)){

        
        }
      }
    }
    header('Location: home.php');
  }
}
else if(isset($_POST['cancel'])){
  header('Location: home.php');
}
else if(isset($_POST['leave'])){

  $delete = "DELETE FROM collab WHERE collabId = '$collabId'";
  mysqli_query($conn,$delete);
  header('Location: home.php');
}
else if(isset($_POST['members'])){
  
  header('Location: members.php');

}



 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet"  href="index.css?v=<?php echo time();?>">
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

    <title>Document</title>
  </head>
  <body>
    <main class="container">
      <section class="right">
        <form method="POST" action="collab.php">
          <h1>Collaborate</h1>
          
          <input type="hidden" value="<?php echo $collabs['groupcode'] ?>" name='groupcode'>
          <input type="hidden" value="<?php echo  $groupcode?>" name='groupcode'>
          
          <input type="text" name="groupname" placeholder="Group Name" required value="<?php echo $groupname;?>"/>
          <br /><br /><label for="favcolor">Background Color</label>
          <input
            type="color"
            id="favcolor"
            name="color"
            value="<?php echo $_POST['color'];?>"
          /><br /><br />
          
          <label for="timefrom" >From</label><br />
          <input type="time" id="timefrom" name="timefrom" value =<?php echo date("H:i", strtotime( $timefrom))?>  required />

          <br /><br />

          <label for="timeto" class="sr-only">To</label><br />
          <input type="time" id="timeto" name="timeto" value =<?php echo $timeto;?>  required />
          <br /><br />

          <input type="text" name="member" placeholder="Add members"/>
          <br /><br />

          <button  type="submit" name="submit" value="Submit">Save</button>
          <br /><br />
          <button type="submit" name="cancel" >Cancel</button>
        </form>
      </section>
    </main>
  </body>
</html>