<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Create a Record</title>
  </head>
  <body class="container">
    <h1>Update Kenworth Record</h1>
    <p><a href="index.php" class="btn btn-primary">Back to index page</a></p>
    
    <?php
    
        include "connection.php";
        
        $id = $_GET['update'];
        $record = $connection->query("select * from truck where id=$id");
        $row = $record->fetch_assoc();
    
    ?>
    
    <form method="post" action="connection.php" class="form-group">
        
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"
        
        <label>Kenworth Model</label>
        <br>
        <input type="text" name="model" placeholder="Model" class="form-control" value="<?php echo $row['model']; ?>">
        <br><br>
        <label>Heading</label>
        <br>
        <input type="text" name="heading" placeholder="Heading" class="form-control" value="<?php echo $row['heading']; ?>">
        <br><br>
        <label>Tagline</label>
        <br>
        <input type="text" name="tagline" placeholder="Tagline" class="form-control" value="<?php echo $row['tagline']; ?>">
        <br><br>
        <label>Description</label>
        <br>
        <input type="text" name="description" placeholder="Description" class="form-control" value="<?php echo $row['description']; ?>">
        <br><br>
        <label>Image Address</label>
        <br>
        <input type="text" name="image" placeholder="images/nameOfImage.jpg or similar" class="form-control" value="<?php echo $row['image']; ?>">
        <br><br>
        <input type="submit" name="update" value="Update record" class="btn btn-dark">
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>