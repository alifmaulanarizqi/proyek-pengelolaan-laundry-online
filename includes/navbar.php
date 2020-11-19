<!-- database connection -->
<?php include "dbConnection.php"; ?>

<!-- navbar -->
<nav class="navbar navbar-expand-md navbar-light">
  <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="myNavbar">
    <div class="container-fluid">
      <div class="row">

        <!-- sidebar -->
        <?php
          $pageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

          $query = "SELECT * FROM user";
          $user_query = mysqli_query($connection, $query);
          $row = mysqli_fetch_assoc($user_query);
          $laundry_name = $row["nama_laundry"];
          $display_name = $row["nama_display"];
        ?>
        <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
          <a href="index.php" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border"><?php echo $laundry_name; ?></a>
          <div class="bottom-border pb-3">
            <img src="images/admin.png" width="35" class="rounded-circle mr-3">
            <div class="text-white d-inline"><?php echo $display_name; ?></div>
          </div>
          <ul class="navbar-nav flex-column mt-3">
            <li class="nav-item"><a href="index.php" class="nav-link text-white p-3 mb-2 sidebar-link <?php if($pageName == "index.php") {echo "current";} ?>"><i class="fas fa-home text-light fa-lg mr-3"></i>Dashboard</a></li>
            <li class="nav-item"><a href="transaksi.php" class="nav-link text-white p-3 mb-2 sidebar-link <?php if($pageName == "transaksi.php") {echo "current";} ?>"><i class="fas fa-credit-card text-light fa-lg mr-3"></i>Transaksi</a></li>
            <li class="nav-item"><a href="produk.php" class="nav-link text-white p-3 mb-2 sidebar-link <?php if($pageName == "produk.php") {echo "current";} ?>"><i class="fas fa-edit text-light fa-lg mr-3"></i>Produk</a></li>
            <li class="nav-item"><a href="pegawai.php" class="nav-link text-white p-3 mb-2 sidebar-link <?php if($pageName == "pegawai.php") {echo "current";} ?>"><i class="fas fa-user text-light fa-lg mr-3"></i>Pegawai</a></li>
            <li class="nav-item"><a href="pelanggan.php" class="nav-link text-white p-3 mb-2 sidebar-link <?php if($pageName == "pelanggan.php") {echo "current";} ?>"><i class="fas fa-users text-light fa-lg mr-3"></i>Pelanggan</a></li>
            <li class="nav-item"><a href="laporan.php" class="nav-link text-white p-3 mb-2 sidebar-link <?php if($pageName == "laporan.php") {echo "current";} ?>"><i class="fas fa-chart-bar text-light fa-lg mr-3"></i>Laporan</a></li>
            <li class="nav-item"><a href="pengaturan.php" class="nav-link text-white p-3 mb-2 sidebar-link <?php if($pageName == "pengaturan.php") {echo "current";} ?>"><i class="fas fa-wrench text-light fa-lg mr-3"></i>Pengaturan</a></li>s
          </ul>
        </div>
        <!-- end of sidebar -->

        <!-- top-nav -->
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top pt-2 pb-3 top-navbar">
          <div class="row align-items-center">
            <div class="col-md-9">
              <h4 class="text-light text-uppercase mb-0">
                <?php
                  if($pageName == "index.php") {
                    echo "Dashboard";
                  } else if($pageName == "transaksi.php") {
                    echo "Transaksi";
                  } else if($pageName == "produk.php") {
                    echo "Produk";
                  } else if($pageName == "pegawai.php") {
                    echo "Pegawai";
                  } else if($pageName == "pelanggan.php") {
                    echo "Pelanggan";
                  } else if($pageName == "laporan.php") {
                    echo "Laporan";
                  } else if($pageName == "pengaturan.php") {
                    echo "Pengaturan";
                  }
                ?>
              </h4>
            </div>
            <div class="col-md-3">
              <ul class="navbar-nav">
                <li class="nav-item ml-md-auto"><a href="#" class="nav-link text-danger" data-toggle="modal" data-target="#modalSignOut">Log Out<i class="fas fa-sign-out-alt fa-lg text-danger py-10 ml-3"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- end of top-nav -->

      </div>
    </div>
  </div>
</nav>
<!-- end of navbar -->
