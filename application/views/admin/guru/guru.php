<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data Siswa</h3>
        <a href="<?= base_url(); ?>admin/guru/tambahguru" class="btn btn-primary pull-right"><i class="fa fa-user-plus"></i> Tambah Siswa</a>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered">
         <thead>
          <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>No Telepon</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach($dataguru as $guru) :
            ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $guru['nama']; ?></td>
              <td><?= $guru['nip']; ?></td>
              <td><?= $guru['no_telp']; ?></td>
              <td><?= $guru['status']; ?></td>
              <td>
                <a href="<?=  base_url(); ?>admin/guru/editguru/<?= $guru['id_guru']; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
                <a href="<?=  base_url(); ?>admin/guru/hapusguru/<?= $guru['id_guru']; ?>" class="btn btn-danger btn-xs remove"><i class="fa fa-trash"></i></a>
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