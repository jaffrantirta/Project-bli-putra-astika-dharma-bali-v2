  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List Foto</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <p hidden id='link'>edit/get_foto</p>
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lisensi Foto</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Foto</th>
                    <th>Foto</th>
                    <th>Tanggal Upload</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
<script src="<?php echo base_url() ?>assets/admin/build/js/customer/Jquery3Offline.js"></script>
<script>
    $(document).ready(function() {
        var link = document.getElementById('base_url').innerHTML + document.getElementById('link').innerHTML;
        console.log(link);
        table = $('#table').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": link,
            "bSort":true,
            "bPaginate": true,
            "iDisplayLength": 10,
            "order": [[ 2, "desc" ]],
            "language": {
                "searchPlaceholder": "Search...",
                "search":""
            },
            "fnInitComplete": function(oSettings, json) {
                $('#table_filter :input').addClass('form-control').css({'width':'10em'});
            }
        });
    });
</script>