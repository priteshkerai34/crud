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

  <?php
   include "connection.php";
    if(isset($_POST['submit']))
   {    
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $sql = "INSERT INTO `users`(`name`, `email`, `number`) VALUES ('$name','$email','$number')";
        if(mysqli_query($conn, $sql)) {
           header("location:index.php");
        } else {
           echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
   }
    if(isset($_GET['id']))
   {
        $id = $_GET['id'];
        $sql = "DELETE FROM `users` WHERE `id` = $id";
        if(mysqli_query($conn, $sql)) {
          header("location:index.php");
       } else {
          echo "Error: " . $sql . ":-" . mysqli_error($conn);
       }
   }
   ?>

  <body>
  <div class="container">
  <form method="POST" action="index.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
    </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Number</label>
    <input type="number" class="form-control" id="number" name="number" id="exampleInputPassword1">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Number</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
          $sql = "SELECT * from `users`";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
            <th scope='row'>".$row['id']."</th>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['number']."</td>
            <td><a href='update.php?id=".$row['id']."&name=".$row['name']."&email=".$row['email']."&number=".$row['number']."'><button class='btn btn-success'>UPDATE</button></a>
            <a href='index.php?id=".$row['id']."'><button class='btn btn-danger'>DELETE</button></a></td>
          </tr>";
          }
        ?>
  </tbody>
</table>
</div>

  </body>
</html>