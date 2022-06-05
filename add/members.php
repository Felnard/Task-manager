<?php

    require('config/config.php'); 
    require('config/db.php');
    require('functions.php');
 
    $groupcode = isset($_POST['groupcode'])?$_POST['groupcode']: '';
    //para maprint sa webpage
    $allname = 'SELECT * FROM collab where groupcode = "'. $groupcode. '"';
    $resultAllName =  mysqli_query($conn,$allname);
    $showAllName = mysqli_fetch_all($resultAllName, MYSQLI_ASSOC);

    print_r($showAllName);
    echo $allname;
    mysqli_free_result($result);
    mysqli_close($conn);


?>

	<div class="container">
    <br/>
		<h2>Person's Log</h2>
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Username</th>
                    
                    </tr>
                </thead>
		
			<div class="well">
                <tbody>
                <?php foreach($showAllName as $person) : ?>
                    <tr>
                    <th scope="row"><?php echo $person['username'];?></th>
                    <!-- <td>?php echo '<img src="images\\'. $photolink.'">'?></td> -->
                   
                    </tr>
                <?php endforeach; ?>   
                </tbody>
            </div>
        </table>
        <br/>

            <button type="button" class="btn btn-dark btn-sm" onclick="document.location='guestbook-login.php'">Logout</button>
            <button type="button" class="btn btn-success btn-sm" onclick="document.location='index.php'">Register</button>

        </div>