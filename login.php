<!-- header -->
<?php include "includes/header.php"; ?>

    <div class="container" style="height: 100vh;">
      <div class="row" style="height: 100vh;">
        <div class="col-xl-7 col-lg-8 col-md-10 mx-auto my-auto">
          <div class="card shadow">
            <div class="card-header bg-info py-3">
              <h5 class="m-0 font-weight-bold text-white text-center">Login</h5>
            </div>
            <div class="card-body">
              <form class="text-center border border-light p-5" action="">
                  <input type="email" class="form-control mb-4 py-4" placeholder="Email">
                  <input type="password" class="form-control mb-4 py-4" placeholder="Password">
                  <div class="d-flex justify-content-around">
                    <div>
                        <a href="">Lupa password?</a>
                    </div>
                  </div>
                  <div class="container w-50">
                    <button class="btn btn-primary btn-block mt-4" type="submit"><a href="index.php" class="text-white link-style-none">Login</a></button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- footer  -->
<?php include "includes/footer.php"; ?>
