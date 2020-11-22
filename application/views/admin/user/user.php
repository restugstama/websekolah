<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data Siswa</h3>
        <a href="<?= base_url(); ?>admin/user/tambahuser/" class="btn btn-primary pull-right"><i class="fa fa-user-plus"></i> Tambah User</a>
      </div>
      <div class="box-body">
        <table id="example2" class="table table-bordered">
         <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($datauser as $user) :
           ?>
           <tr>
            <td><?= $no++; ?></td>
            <td><?= $user['username']; ?></td>
            <td><?= $user['nama']; ?></td>
            <td>
              <a href="<?= base_url(); ?>admin/user/edituser/<?= $user['id_user']; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
             <a href="<?= base_url(); ?>admin/user/hapususer/<?= $user['id_user']; ?>" class="btn btn-danger btn-xs remove"><i class="fa fa-trash"></i></a> 
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