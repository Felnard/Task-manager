<?php
  
  require('config/config.php');
  require('config/db.php');

  $check = 'SELECT * FROM data1';
  $result = mysqli_query($conn,$check);
  

  if(isset($_POST['submit'])){
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $passwordConfirm = mysqli_real_escape_string($conn,$_POST['passwordConfirm']);

  $query = "INSERT INTO data1(email, password) VALUES('$username', '$password')";

 

if($password != $passwordConfirm){
    echo '<div class="p-3 mb-2 bg-warning text-dark text-center position-absolute w-100"><h2>Password Not Match</h2></div>';
  } 
  else if(mysqli_query($conn, $query)){

     // IDChecking
    $check = 'SELECT * FROM data1';
    $result = mysqli_query($conn,$check);
    $admins = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $userid = $admins[sizeOf($admins)- 1]['id'];

    setcookie('USERS',$userid, time() + (86400 * 30));

    header('Location: home.php');
    }
  else {
     echo '<div class="p-3 mb-2 bg-warning text-dark text-center position-absolute w-100"><h2>Username is taken</h2></div>' ;
  
  }
}
  mysqli_free_result($result);
  mysqli_close($conn);
// $check = 'SELECT * FROM data1';
// $result = mysqli_query($conn,$check);
// $admins = mysqli_fetch_all($result, MYSQLI_ASSOC);
// mysqli_free_result($result);
// mysqli_close($conn);

// echo  $admins[sizeOf($admins) -1]['id'];
// var_dump($admins);
 
// foreach($admins as $admin){
//   if($admin['email'] == $username && $admin['password'] == $password){
  
//     header('Location: dashboard.php');
//   }
//   else if(isset($_POST['submit'])){
//     if($admin['email'] != $username || $admin['password'] != $password ){
//       echo '<script> alert("Mali ka") </script>';
//     }
//   }
 
  
// }
// $date = date('y-m-d h:i:s a', time());
// echo $date;


// $date = new DateTime(date('h:i:s a', time()));
// $date->sub(new DateInterval('P0DT9H0M'));
// $finalDate = $date->format('h:i:s a');

// echo $finalDate;


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
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
 
    <title>Document</title>
  </head>
  <body>
  <main class="container">
      <section class="right">
      <form
        method="POST"
        action="<?php $_SERVER['PHP_SELF']; ?>"
        class="form-signin"
      >

        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
       
        <input type="text" id="username" name="username" placeholder="Username" required="" autofocus="" />
        <br /><br />
        <input  type="password" id="password" name="password" placeholder="Password" required=""/>
         <br /><br />
        <input type="password" id="password" name="passwordConfirm" placeholder="Password" required=""/>
        
        <button
          type="submit"
          name="submit"
          value="Submit"
        >
          Sign up
        </button>
        <button type="button" onclick="document.location='index.php'"> Sign in</button>
      
         
      </form>
      </section>
    </main>
  </body>
</html>
