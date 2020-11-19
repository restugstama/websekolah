<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data Siswa</h3>
        <a href="#" class="btn btn-primary pull-right"><i class="fa fa-user-plus"></i> Tambah Siswa</a>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered">
         <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->