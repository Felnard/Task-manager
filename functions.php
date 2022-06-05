<?php 

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

// show collab

$username = $showName[0]['email'];
    
$collab = 'SELECT * FROM collab WHERE username ='. "'$username'";
$resultcollab =  mysqli_query($conn,$collab);
$showcollab = mysqli_fetch_all($resultcollab, MYSQLI_ASSOC);


// SHOW PROFILE PIC
$photoquery = "SELECT profilepic FROM data1 WHERE id = $userId";
$photoresult = mysqli_query($conn,$photoquery);
$showImage = mysqli_fetch_all($photoresult, MYSQLI_ASSOC);

function addTasks($params){

  if(isset($_POST['import'])){ 
    if($params == null){
      return '<section class="add w-25 text-muted text-center  fs-5 ">
              <span>Nothing Important Here</span>
            <section>';
    }
  } 
  else if(isset($_POST['upcoming'])){ 
    if($params == null){
      return '<section class="add w-25 text-muted text-center  fs-5 ">
              <span>Nothing Upcoming</span>
            <section>';
    }
  } 
  else if(isset($_POST['trash'])){ 
    if($params == null){
      return '<section class="add w-25 text-muted text-center  fs-5 ">
              <span>Trash Is Empty</span>
            <section>';
    }
  }else{
    return '<section class="add w-25 text-muted text-center p-3 ">
            <form method="POST"  action="insert.php">
              <button type="submit" name="add" class=" bg-transparent border-0">
              <i class="fas fa-plus-square"></i> <a>Add New Task</a>
              </button>
            <form>
          </section>';
      
        
  }
}

function upcomingChecker($params){
  if(isset($_POST['upcoming'])){ 
    if($params == null){
      return '<section class="add w-25 text-muted text-center  fs-5 ">
              <span>Nothing Upcoming</span>
            <section>';
    }
  }
}

function changeColor($progress){
  if($progress == 1){
    return 'style="color:#0D6EFD;background-color:#eafff5;"';
  }
}

function collabColor($color){
    return 'style="background-color:'. $color.'"';
    
}



//COUNT

//All
$allquery = "SELECT COUNT(id) AS Total FROM task WHERE userId = '$userId'";
$allfinished = "SELECT COUNT(id) AS Finished FROM task WHERE userId = $userId" . " && progress = 1 ";
$allpending = "SELECT COUNT(id) AS Today FROM task WHERE userId = '$userId' && progress = 0" ; 

$all = mysqli_query($conn,$allquery);
$showall = mysqli_fetch_all($all, MYSQLI_ASSOC);
 
$finishedresult = mysqli_query($conn,$allfinished);
$allfinished = mysqli_fetch_all($finishedresult, MYSQLI_ASSOC);

$pendingresult = mysqli_query($conn,$allpending);
$showpending = mysqli_fetch_all($pendingresult, MYSQLI_ASSOC);


//Today

$Todaytask = "SELECT COUNT(id) AS Total FROM task WHERE userId = '$userId' && dateTask = '$finalDate'";
$Todayfinished = "SELECT COUNT(id) AS Finished FROM task WHERE userId = $userId && progress = 1  && dateTask = '$finalDate' ";
$Todaypending = "SELECT COUNT(id) AS Today FROM task WHERE userId = '$userId' && dateTask = '$finalDate' && progress = 0" ; 

$result = mysqli_query($conn,$Todaytask);
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

$finishedresult = mysqli_query($conn,$Todayfinished);
$showfinished = mysqli_fetch_all($finishedresult, MYSQLI_ASSOC);

$todayresult = mysqli_query($conn,$Todaypending);
$showtoday = mysqli_fetch_all($todayresult, MYSQLI_ASSOC);

$date = new DateTime(date('Y-m-d h:i:s a', time()));
$date->sub(new DateInterval('P0DT9H0M'));

// REPORTS

function listDate(){
  $arr = array();
 
  $date = new DateTime(date('Y-m-d h:i:s a', time()));
  $date->sub(new DateInterval('P0DT9H0M'));
  
    for($i =0; $i <10; $i++){

     
      $finalDate = $date->format('Y-m-d');
      $try = date("'M jS'", strtotime($finalDate));
      array_unshift($arr, strval($try)); 
      $date->modify("-1 day");
    }
  
    echo $sting = implode(",", $arr);

}



function taskPerDay(){
  
  $conn = mysqli_connect('localhost', 'root', 'dendi1234', 'info');
  $arr = array();
  $userId =intval($_COOKIE['USERS']);

  $Todaytask = "SELECT COUNT(id) AS Total FROM task WHERE userId = '$userId' && dateTask = ";
  $date = new DateTime(date('Y-m-d h:i:s a', time()));
  $date->sub(new DateInterval('P0DT9H0M'));
 
  
  for($i =0; $i <10; $i++){
  $finalDate = $date->format('Y-m-d');
    
  $todayresult = mysqli_query($conn,$Todaytask."'$finalDate'");
  $showtoday = mysqli_fetch_all($todayresult, MYSQLI_ASSOC);

  array_unshift($arr, $showtoday[0]['Total']); 
  $date->modify("-1 day");
  }

  echo implode(",", $arr);
}

// EDIT PROFILE
 if(isset($_POST['editprofile'])){

  echo 'pogako';
 }


 // SPOTIFY

 function spotify($link){

  if(empty($link)){
    $link = '';

    return $link;
  }
  $link;
  $una = substr($link, 0, 25);
  
  $result = $una.'embed/'.substr($link, 25);
  return $result ;
}

// CLASSIFICATION

// $queryClassification = 'SELECT DISTINCT classification FROM task';
 
// $allClassifications = mysqli_query($conn,$queryClassification);
// $showclassification = mysqli_fetch_all($allClassifications, MYSQLI_ASSOC);
 

// if(isset($_POST['work'])){
//   $query = 'SELECT * FROM task WHERE userId = '. $userId. '&& trash = 0'. '&& classification = "work"';
//   $header = 'Trash';
// }


?>


