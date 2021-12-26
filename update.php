<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Users Records!</title>
  </head>
  <body>
      <?php
      include "connection.php";
      if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $name = $_GET['name'];
        $email = $_GET['email'];
        $number = $_GET['number'];
      }
        if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $sql = "update `users` set name='$name', email='$email', number='$number' where id = $id";
        if(mysqli_query($conn, $sql)) {
          header("location:index.php");
        } 
        else {
          echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
      }
      ?>
  <div class="container">
  <form method="post" action="update.php">
  <div class="mb-3">
    <!-- <label for="exampleInputEmail1" class="form-label">Id</label> -->
    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo "$id"?>">
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo "$name"?>">
    </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo "$email"?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Number</label>
    <input type="number" class="form-control" id="number" name="number" value="<?php echo "$number"?>">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
  </body>
</html>