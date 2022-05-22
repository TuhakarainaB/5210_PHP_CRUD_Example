<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Kenworth Trucks</title>
  </head>
  <body class="container">
      
   <?php include 'connection.php'; ?>
 
  <div>
      <ul class="nav navbar-dark bg-dark">
          
          <!-- run php loop through table and display model field here-->
          <?php foreach($result as $link): ?>
          
          <li class="nav-item active"><a href="index.php?link='<?php echo $link['model']; ?>'" class="nav-link text-light"><?php echo $link['model']; ?></a></li>
          
          <?php endforeach; ?>
          
          <li class="nav-item active"><a href="form.php" class="nav-link text-light">Add a new Kenworth Model</a></li>
      </ul>
  </div>
  
   <h1>Welcome to Kenworth Trucks</h1>
   
   <div>
       <?php
       
            if(isset($_GET['link']))
            {
                $model = trim($_GET['link'], "'");
                
                // run sql command to retrieve record based on GET value
                $record = $connection->query("select * from truck where model='$model'");
                
                // turn record into an associative array
                $array = $record->fetch_assoc();
                
                 // variables to hold our update and delete url strings
                $id = $array['id'];
                $update = "update.php?update=" . $id;
                $delete = "connection.php?delete=" . $id;
                
                echo "
                <div class='card card-body shadow mb-3'>
                    <h2 class='card-title'>{$array['model']}</h2>
                    <h4>{$array['heading']}</h3>
                    <h4>{$array['tagline']}</h3>
                    <div class='card card-body shadow mb-3'>
                    <p class='text-center'><img src='{$array['image']}'></p>
                    </div>
                    <p class='card-text'>{$array['description']}</p>
                    <p>
                        <a href='{$update}' class='btn btn-warning'>Update Record</a>
                        <a href='{$delete}' class='btn btn-danger'>Delete Record</a>
                    </p>
                </div>
                
                
                ";
            }
            else
            {
                //default view that the user sees when visiting for the first time
                echo "
                
                <p><img src='images/logo.png'></p>
                <p>Click on the links above to view our latest models.</p>
                
                ";
            }
       
       ?>
   </div>
    

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