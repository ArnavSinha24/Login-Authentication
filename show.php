<?php
$login = false;
$showError = false;
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Show Details</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4">
     <h1 class="text-center">Show User Details</h1>
     <form action="/project/show.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"><br>
            <h5>OR</h5><br>
            <label for="email">E-Mail</label>
            <input type="text" maxlength="50" class="form-control" id="email" name="email" aria-describedby="emailHelp"><br>
            <label for="phone">Mobile No.</label>
            <input type="number" maxlength="10" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Show Details</button><br><br>
        <h4 class="alert-heading">
        <?php
            if($_POST)
            {
                include 'partials/_dbconnect.php';
                $username = $_POST['username'];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $sql = "Select * from users where username='$username' AND phone='$phone' OR email='$email' AND phone='$phone'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                $row = mysqli_fetch_array($result);
                if($num>0)
                {
                    echo " <strong><u>Users Data:-</u></strong> ";
                    echo "<br>";
                    echo "<br>";
                    echo " Name = ";
                    echo $row['name'];
                    echo "<br>";
                    echo " E-Mail = ";
                    echo $row['email'];
                    echo "<br>";
                    echo " Username = ";
                    echo $row['username'];
                    echo "<br>";
                    echo " Password = ";
                    echo $row['password'];
                }
                else {
                    echo "Data not matched ";
                }
            }
        ?>
        </h4>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>