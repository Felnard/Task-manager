<?php
  
  require('config/config.php');
  require('config/db.php');

  $username = isset($_POST['username'])? $_POST['username']: '';
  $password = isset($_POST['password'])? $_POST['password']: '';

  $query = 'SELECT * FROM data1';
  $result = mysqli_query($conn,$query);
  $admins = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);
 
  $count = 0;



foreach($admins as $admin){
  $count++;
  if($admin['email'] == $username && $admin['password'] == $password){
   
    $userid = $admins[$count - 1]['id'];

    setcookie('USERS',$userid, time() + (86400 * 30));
    header('Location: home.php');
  }
  else if(isset($_POST['submit'])){
    if($admin['email'] != $username || $admin['password'] != $password ){
      echo '<div class="p-3 mb-2 bg-warning text-dark text-center position-absolute w-100"><h1>Wrong</h1></div>' ;
    }
  }
}


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
    <link rel="stylesheet"  href="index.css?v=<?php echo time();?>">
    <title>Document</title>
  </head>
  <body>
  <main class="container">
      <section class="right">
      <form
        method="POST"
        action="<?php $_SERVER['PHP_SELF']; ?>" 
        
      >
          <h1>Login</h1>
          <input
            type="test"
            name="username"
            placeholder="Email Address"
            required
          />
          <br /><br />
          <input
            type="password"
            name="password"
            placeholder="Password"
            required
          />
          <br />

          <button type="submit" name="submit"> Submit</button><br>
        <button type="button" onclick="document.location='signup.php'"> Create Account</button>
        </form>
      </section>
    </main>
  </body>
</html>
