// pegawai.html - tabel pegawai - pagination and search
$(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "searching": true
  });
  $('.dataTables_length').addClass('bs-select');
});

// pegawai.html - form pegawai - datepicker
$(function(){
  $(".datepicker").datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    todayHighlight: true,
  });
});
