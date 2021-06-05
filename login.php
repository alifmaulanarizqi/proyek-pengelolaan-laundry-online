<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="title icon" href="images/title-img.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="css/datatables.min.css" rel="stylesheet">
    <link href="css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Laundry Dong Dashboard</title>
  </head>
  <body>

    <div class="container" style="height: 100vh;">
      <div class="row" style="height: 100vh;">
        <div class="col-xl-7 col-lg-8 col-md-10 mx-auto my-auto">
          <div class="card shadow">
            <div class="card-header bg-info py-3">
              <h5 class="m-0 font-weight-bold text-white text-center">Login</h5>
            </div>
            <div class="card-body">
              <form class="text-center border border-light p-5" action="includes/login.php" method="post">
                <div class="form-group">
                  <input type="email" class="form-control mb-4 py-4" name="emailuser" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control mb-4 py-4" name="password" placeholder="Password">
                </div>
                <div class="d-flex justify-content-around">
                  <div>
                      <a href="">Lupa password?</a>
                  </div>
                </div>
                <div class="container w-50">
                  <button class="btn btn-primary btn-block mt-4" type="submit" name="login">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- footer  -->
<?php include "includes/footer.php"; ?>
