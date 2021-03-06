<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Data User</h3>
          </div>
          <div class="box-body">
            <!-- Start Foreach -->
            <?php foreach($datauser as $user) { ?>
              <!-- Start Form -->
              <form action="" method="post">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama']; ?>">
                  <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                  <label>username</label>
                  <input type="text" name="username" id="username" class="form-control" value="<?= $user['username']; ?>">
                  <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 col-sm-12">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                  </div>
                  <div class="form-group col-md-6 col-sm-12">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="passwordconf" id="passwordconf">
                    <?= form_error('passwordconf', '<small class="text-danger">', '</small>') ?>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="id" id="id" class="form-control hidden" value="<?= $user['id_user']; ?>">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="<?= base_url(); ?>admin/user" class="btn btn-warning">Kembali</a>
              </form>
              <!-- End Form -->
            <?php } ?>
            <!-- End Foreach -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper