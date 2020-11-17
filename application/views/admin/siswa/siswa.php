<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data Siswa</h3>
        <a href="<?= base_url(); ?>admin/siswa/tambahsiswa" class="btn btn-primary pull-right"><i class="fa fa-user-plus"></i> Tambah Siswa</a>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered">
         <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NISN</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($datasiswa as $siswa ) : 
          	$nama = $siswa->nama;
          	$nisn = $siswa->nisn;
          	$id   = $siswa->id_siswa;
          	?>
            <tr id="<?= $siswa->id_siswa ?>">
              <td><?= $no++ ?></td>
              <td><?= $nama; ?></td>
              <td><?= $nisn ?></td>
              <td></td>
              <td>
                <?= anchor('admin/siswa/editsiswa/'.$siswa->id_siswa, '<div class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></div>') ?>
                <?= anchor('admin/siswa/hapussiswa/'.$siswa->id_siswa, '<div class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></div>') ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->