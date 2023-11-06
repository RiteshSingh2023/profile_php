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
    <title>Document</title>
</head>
<body>
    <section style="background-color: #eee;">
        <div class="container py-5">
      
          <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
      
              <div class="card" id="chat2">
                <div class="card-header d-flex justify-content-between align-items-center p-3">
                    <?php

                    $id = $_SESSION['id'];
                    $query = mysqli_query($con,"SELECT * FROM users WHERE Id=$id");

                    while($result = mysqli_fetch_assoc($query)){
                         $res_Uname = $result['Username'];
                         $res_Email = $result['Email'];
                         $res_Age = $result['Age'];
                         $res_id = $result['Id'];
                    }

                    echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
                    ?>
                  <h5 class="mb-0">Chat</h5>
                 <!-- <a href="edit.php"  data-mdb-ripple-color="dark">Change Profile</a>-->
                 <a href="php/logout.php"><button type="submit" class="btn btn-primary btn-sm" data-mdb-ripple-color="dark">Log out</button></a>
                </div>
                <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">
      
                  <div class="d-flex flex-row justify-content-start">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                      alt="avatar 1" style="width: 45px; height: 100%;">
                    <div>
                      <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Hi <?php echo $res_Uname ?></p>
                      <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">And you are <?php echo $res_Age ?>years old
                      </p>
                      <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Your email is <?php echo $res_Email ?></p>
                      <p class="small ms-3 mb-3 rounded-3 text-muted">23:58</p>
                    </div>
                  </div>
      
                  <div class="divider d-flex align-items-center mb-4">
                    <p class="text-center mx-3 mb-0" style="color: #a2aab7;">Today</p>
                  </div>

                  
      
                </div>
              </div>
      
            </div>
          </div>
      
        </div>
      </section>
</body>
</html>