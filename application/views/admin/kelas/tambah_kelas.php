<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Guru</h3>
          </div>
          <div class="box-body">
            <!-- Start Form -->
            <form action="<?= base_url().'admin/kelas/tambahkelas' ?>" method="post">
              <div class="form-group">
                <label>Nama Kelas</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?= set_value('nama'); ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
              </div>
              <div class="form-group">
                <label>Jurusan</label>
                <select name="jurusan" class="form-control">
                  <option disabled selected>Pilih Jurusan</option>
                  <option value="Ilmu Pengetahuan Alam">Ilmu Pengetahuan Alam</option>
                  <option value="Ilmu Pengetahuan Sosial">Ilmu Pengetahuan Sosial</option>
                </select>
                <?= form_error('jurusan', '<small class="text-danger">', '</small>') ?>
              </div>
              <div class="form-group">
                <label>Wali Kelas</label>
                <select name="wali_kelas" class="form-control select2">
                  <option disabled selected>Pilih Wali Kelas</option>
                  <?php foreach ($dataguru as $guru) : ?>
                    <option value="<?= $guru['id_guru']; ?>"><?= $guru['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('wali_kelas', '<small class="text-danger">', '</small>') ?>
              </div>
              <div class="form-group">
                <label>Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control" value="<?= set_value('tahun_ajaran'); ?>">
                <?= form_error('tahun_ajaran', '<small class="text-danger">', '</small>') ?>
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
              <a href="<?= base_url(); ?>admin/kelas" class="btn btn-warning">Kembali</a>
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