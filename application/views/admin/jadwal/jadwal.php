<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data Kelas</h3>
        <a href="<?= base_url(); ?>admin/kelas/tambahkelas" class="btn btn-primary pull-right"><i class="fa fa-user-plus"></i> Tambah Kelas</a>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered">
         <thead>
          <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Wali Kelas</th>
            <th>Tahun Ajaran</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; 
          foreach ($datakelas as $kelas) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $kelas['nama_kelas']; ?></td>
              <td><?= $kelas['jurusan']; ?></td>
              <td><?= $kelas['nama']; ?></td>
              <td><?= $kelas['tahun_ajaran']; ?></td>
              <td>
                <a href="<?=  base_url(); ?>admin/kelas/detailkelas/<?= $kelas['id_kelas']; ?>" class="btn btn-success btn-xs"><i class="fa fa-search"></i></a>
                <a href="<?=  base_url(); ?>admin/kelas/hapuskelas/<?= $kelas['id_kelas']; ?>" class="btn btn-danger btn-xs remove"><i class="fa fa-trash"></i></a>
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
<!-- /.content-wrapper