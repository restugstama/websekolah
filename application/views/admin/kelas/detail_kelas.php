<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Detail Kelas</h3>
          </div>
          <div class="box-body"> 
            <!-- Start Form -->
            <form action="" method="post">
              <?php foreach($datakelas as $kelas) { ?>
                <div class="form-group">
                  <label>Nama Kelas</label>
                  <input type="text" name="nama" id="nama" class="form-control" value="<?= $kelas['nama_kelas']; ?>">
                  <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                  <label>Jurusan</label>
                  <select name="jurusan" class="form-control">
                    <option disabled selected>Pilih Jurusan</option>
                    <option value="Ilmu Pengetahuan Alam" <?php if($kelas['jurusan'] == 'Ilmu Pengetahuan Alam'){ echo 'selected';} ?>>Ilmu Pengetahuan Alam</option>
                    <option value="Ilmu Pengetahuan Sosial" <?php if($kelas['jurusan'] == 'Ilmu Pengetahuan Sosial'){ echo 'selected';} ?>>Ilmu Pengetahuan Sosial</option>
                  </select>
                  <?= form_error('jurusan', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                  <label>Wali Kelas</label>
                  <select name="wali_kelas" class="form-control">
                    <option disabled selected>Pilih Wali Kelas</option>
                    <?php foreach ($dataguru as $guru) : ?>
                      <option value="<?= $guru['id_guru']; ?>" <?php if($guru['nama'] == true){ echo 'selected';} ?>><?= $guru['nama']; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?= form_error('wali_kelas', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                  <label>Tahun Ajaran</label>
                  <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control" value="<?= $kelas['tahun_ajaran']; ?>">
                  <?= form_error('tahun_ajaran', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                  <input type="text" name="id_kelas" id="id_kelas" class="form-control hidden" value="<?= $kelas['id_kelas']; ?>">
                  <?= form_error('id_kelas', '<small class="text-danger">', '</small>') ?>
                </div>
              <?php } ?>
              <button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#modal">
                <i class="fa fa-user-plus"></i> Tambah Siswa
              </button>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Siswa</td>
                    <td>Aksi</td>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach($datasiswaby_id as $s_id) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $s_id['nama']; ?></td>
                    <td>
                      <a href="<?=  base_url(); ?>admin/kelas/hapussiswa/<?= $s_id['id_detail_kelas']; ?>" class="btn btn-danger btn-xs remove"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>           
              </tbody>
            </table>
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
<!-- /.content-wrapper -->

<div class="modal fade" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Siswa</h4>
        </div>
        <form action="<?= base_url(); ?>admin/kelas/tambahsiswa" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label>Siswa</label>
              <select class="form-control select2" name="id_siswa" style="width: 100%;">
                <option selected="selected" disabled>Pilih Siswa</option>
                <?php foreach($datasiswa as $siswa) : ?>
                  <option value="<?= $siswa['id_siswa']; ?>"><?= $siswa['nama']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <?php foreach($datakelas as $kelas) { ?>
              <div class="form-group">
                <input type="text" class="form-control hidden" name="id_kelas" id="id_kelas" value="<?= $kelas['id_kelas']; ?>">
              </div>
            <?php } ?>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
        <!-- /.modal -->