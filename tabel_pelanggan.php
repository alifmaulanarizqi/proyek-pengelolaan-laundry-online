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
