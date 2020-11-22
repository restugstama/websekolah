<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Siswa</h3>
          </div>
          <div class="box-body">
            <!-- Start Form -->
            <form action="<?= base_url().'admin/siswa/tambahsiswa' ?>" method="post">
              <div class="form-group">
                <label>NISN</label>
                <input type="text" name="nisn" id="nisn" class="form-control" value="<?= set_value('nisn'); ?>">
                <?= form_error('nisn', '<small class="text-danger">', '</small>') ?>
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?= set_value('nama'); ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Jenis Kelamin</label>
                  <select name="jenis_kelamin" class="form-control">
                    <option disabled selected>Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                  <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group col-md-6">
                  <label>Agama</label>
                  <input type="text" name="agama" id="agama" class="form-control" value="<?= set_value('agama'); ?>">
                  <?= form_error('agama', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?= set_value('tempat_lahir'); ?>">
                  <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group col-md-6">
                  <label>Tanggal Lahir</label>
                  <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control datepicker" value="<?= set_value('tanggal_lahir'); ?>">
                  <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="<?= set_value('alamat'); ?>">
                <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
              <a href="<?= base_url(); ?>admin/siswa" class="btn btn-warning">Kembali</a>
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