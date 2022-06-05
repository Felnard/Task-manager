<?php

require('config/config.php');
require('config/db.php');

$userId =intval($_COOKIE['USERS']);


$query = 'SELECT * FROM task WHERE userId = '. $userId. ' ORDER BY timeto, dateTask';
$result = mysqli_query($conn,$query);
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);

echo $userId;
echo $query;
?>


<!DOCTYPE html>
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
    <title>Document</title>
  </head>
  <body>
	<div class="container">
    <br/>
		<h2>Person's Log</h2>
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Title</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Address</th>
                    </tr>
                </thead>
		
			<div class="well">
                <tbody>
                <?php foreach($tasks as $task) : ?>
                    <tr>
                    <td><?php echo $task['title'];?></td>
                    <td><?php echo $task['description'];?></td>
                    <td><?php echo $task['timefrom'];?></td>
                    <td><?php echo $task['timeto'];?></td>
                    <td><?php echo $task['userId'];?></td>
                    </tr>
                <?php endforeach; ?>   
                </tbody>
            </div>
        </table>
        <br/>
        <button type="button" class="btn btn-lg btn-warning btn-block" onclick="document.location='insert.php'"> Create Account</button>
      
  </body>
</html>
