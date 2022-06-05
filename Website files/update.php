<?php

    $var_value = $_POST['id'];
    var_dump($var_value); 
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
    <div style="width: 30%; margin: auto; text-align: center">
      <form
        method="POST"
        action="<?php $_SERVER['PHP_SELF']; ?>"
        class="form-signin"
      >

        <h1 class="h3 mb-3 font-weight-normal">INSERT</h1>
        <input
          type="text"
          id="title"
          name="title"
          class="form-control"
          placeholder="Title"
          required=""
          autofocus=""
        />
        <br />
        <input
          type="text"
          id="description"
          name="description"
          class="form-control"
          placeholder="Description"
          required=""
        /> <br />
        <label for="timefrom" class="sr-only">From</label>
        <input
          type="time"
          id="timefrom"
          name="timefrom"
          class="form-control"
          required=""
        /> <br />
        <label for="timeto" class="sr-only">To</label>
        <input
          type="time"
          id="timeto"
          name="timeto"
          class="form-control"
          required=""
        />
        <label for="birthday">Birthday:</label>
<input type="date" id="birthday" name="birthday">

        <!-- <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me" /> Remember me
          </label>
        </div> -->
        <button
          type="submit"
          name="submit"
          value="Submit"
          class="btn btn-lg btn-primary btn-block"
        >
         Create
        </button>
       
         
      </form>
    </div>
  </body>
</html>
