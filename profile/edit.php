<?php
session_start();
include("php/config.php");
if(!isset($_SESSION['valid'])){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Change Profile</title>
</head>
<body>
    <div class="card-header d-flex justify-content-between align-items-center p-3">
                  <h5 class="mb-0">Chat</h5>
                  <a href="edit.php"  data-mdb-ripple-color="dark">Change Profile</a>
                  <button type="button" class="btn btn-primary btn-sm" data-mdb-ripple-color="dark">Log out</button>
    </div>

    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
          <?php
             if(isset($_POST['submit'])){
              $username = $_POST['username'];
              $email = $_POST['email'];
              $age = $_POST['age'];

              $id = $_SESSION['id'];

              $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email='$email', Age='$age' WHERE Id=$id") or die("Error in update");

              if($edit_query){
                echo "<script>
                alert('Profile Updated Successfull');
                window.location.href='home.php';
                </script>";
              }
              
             }else{
          ?>
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <center>
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
      
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Change Profile</p>
      
                      <form class="mx-1 mx-md-4" method="post">
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" name="username" id="form3Example1c" class="form-control" />
                            <label class="form-label" for="form3Example1c">Your Name</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="email" name="email" id="form3Example3c" class="form-control" />
                            <label class="form-label" for="form3Example3c">Your Email</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="number" name="age" id="form3Example4c" class="form-control" />
                            <label class="form-label" for="form3Example4c">Age</label>
                          </div>
                        </div>
      
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button type="submit" name="submit" class="btn btn-primary btn-lg">Update</button>
                        </div>
      
                      </form>
      
                    </div>
                    </center>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
      
                     <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                        class="img-fluid" alt="Sample image">-->
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </section>

</body>
</html>