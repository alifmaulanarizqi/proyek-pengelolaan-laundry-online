<div id="page-container">

  <!-- table -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
        <div class="row pt-md-5 mt-md-4 mb-5">
          <div class="col-sm-12 mb-0">
            <div class="card shadow">
              <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-muted">Data Pelanggan</h5>
              </div>
              <div class="card-body pb-0">
                <table id="dtBasicExample" class="table table-striped table-bordered table-style-css" style="width:100%">
                  <thead>
                    <tr>
                      <th class="th-sm font-weight-bold">ID</th>
                      <th class="th-sm font-weight-bold">Nama</th>
                      <th class="th-sm font-weight-bold">Jml Transaksi</th>
                      <th class="th-sm font-weight-bold">Email</th>
                      <th class="th-sm font-weight-bold">Edit</th>
                      <th class="th-sm font-weight-bold">Delete</th>
                    </tr>
                  </thead>
                  <tbody>

                    <!-- display customers -->
                    <?php
                      displayCustomers();
                    ?>

                    <!-- edit customer -->
                    <?php
                      editCustomer();
                    ?>

                    <!-- delete customer -->
                    <?php
                      deleteCustomer();
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end of table -->

  <!-- footer -->
  <footer id="footerPelanggan">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-white pt-3">
          <div class="row">
            <div class="col-lg-6 footer-font-size footer-center">
              <ul class="list-inline">
                <li class="list-inline-item mr-2">
                  <a href="#" class="text-dark link-style-none">About</a>
                </li>
                <li class="list-inline-item mr-2">
                  <a href="#" class="text-dark link-style-none">Contact</a>
                </li>
                <li class="list-inline-item mr-2">
                  <a href="#" class="text-dark link-style-none">Support</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-6 footer-font-size d-flex justify-content-end footer-center delete-display-flex">
              <p>Copyright &copy; 2020 <a href="#" class="link-style-none">Kelompok5</a>. All Rights Reserved</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- end of footer -->

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<script src="js/datatables.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>

</body>
</html>
