<?php 
 
 require('config/config.php');
 require('config/db.php');
 require('functions.php');

$name = 'SELECT * FROM data1 WHERE id = '. $userId;
$resultName =  mysqli_query($conn,$name);
$showName = mysqli_fetch_all($resultName, MYSQLI_ASSOC);



if(isset($_POST['saveprofile'])){

    $profilepic = time().'_'.$_FILES['photo']['name'];

    $target = 'images/'.$profilepic;

    $email = $_POST['username'];
    // echo $profilepic.'space'.$target.'space'. $_FILES['photo']['name'].'fsfa';
    if (empty($error)) {
        if(!empty($_FILES['photo']['name'])){
           
            if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target)) {
                $sql = "UPDATE data1 SET profilepic ='$profilepic' , email = '$email'  where id= $userId";
                if(mysqli_query($conn, $sql)){
                
                  echo $sql.'tammmmmmmmaaa';
                  header('Location: home.php');
                } else {
                 
                  echo $sql.'maliiiiiiii';
                }
              
            }
          
          }  else {
            $sql = "UPDATE data1 SET email = '$email'  where id= $userId";
            if(mysqli_query($conn, $sql)){
                
                
                header('Location: home.php');
              } else {
               
                echo '<div class="p-3 mb-2 bg-warning text-dark text-center position-absolute w-100"><h2>'. mysqli_error($conn).'</h2></div>' ;
  
              }
      }
        }

       
   }else if(isset($_POST['logout'])){
 
    header('Location: index.php');
  
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- displays site properly based on user's device -->

    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="./images/favicon-32x32.png"
    />
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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <title>Document</title>
  </head>
  <body>
 
    <main class="container">
      <section class="right">
        <form method="POST" action="editprofile.php" enctype = 'multipart/form-data'>
          <h1>Edit Profile</h1>
          <div class="photo">
          
          <!-- <img src=" ?php echo isset($_POST["saveprofile"])?$showName[0]["email"]:'images\default.png' ?>" alt="" /> -->
            
          <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Update image</h4>
              </div>
              <img src="<?php echo "images\\".$showName[0]["profilepic"]?>" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="photo" onChange="displayImage(this)" id="profileImage" class="form-control" value="images\default.png" style="display:none;">
           
          </div><br />
           
          <input
            type="username"
            name="username"
            placeholder="Username"
            required
            value=<?php echo $showName[0]["email"]?> >

          <br /><br />
          <!-- <input type="file" name="photo" required /><br /> -->
          <button type="submit" name="saveprofile" >
              Save
              </button>
        </form>
      </section>
    </main>
    <script src="script.js">

    </script>
  </body>
</html>
