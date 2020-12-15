<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Profile Siswa</h3>
          </div>
          <div class="box-body">
            <!-- Start Form -->
            <form action="<?= base_url(); ?>guru/profile" method="post">
              <div class="form-group">
                <label>NISN</label>
                <input type="text" name="nip" id="nip" class="form-control" value="<?= $user['nip']; ?>" readonly>
                <?= form_error('nip', '<small class="text-danger">', '</small>') ?>
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama']; ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
              </div>
              <div class="form-group">
                <label>No Telp</label>
                <input type="text" name="telepon" id="telepon" class="form-control" value="<?= $user['no_telp']; ?>">
                <?= form_error('telepon', '<small class="text-danger">', '</small>') ?>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Jenis Kelamin</label>
                  <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" value="<?= $user['jenis_kelamin']; ?>">
                  <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group col-md-6">
                  <label>Agama</label>
                  <input type="text" name="agama" id="agama" class="form-control" value="<?= $user['agama']; ?>">
                  <?= form_error('agama', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?= $user['tempat_lahir']; ?>">
                  <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group col-md-6">
                  <label>Tanggal Lahir</label>
                  <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= $user['tanggal_lahir']; ?>" readonly>
                  <?= form_error('agama', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $user['alamat']; ?>">
                <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
            </form>
            <!-- End Form -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper