<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
          <?php foreach($datakelas as $kelas) { ?>
            Jadwal Kelas <?= $kelas['nama_kelas']; ?> [<?= $kelas['jurusan']; ?>]
          <?php } ?>
        </h3>
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal">
          <i class="fa fa-user-plus"></i> Tambah Jadwal
        </button>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
         <thead>
          <tr>
            <th>Hari</th>
            <th>Jam</th>
            <th>Mata Pelajaran</th>
            <th>Guru Pengajar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($datajadwal as $jadwal) : ?>
            <tr>
              <td><?= $jadwal['hari']; ?></td>
              <td><?= $jadwal['jam_mulai']; ?> - <?= $jadwal['jam_berakhir']; ?></td>
              <td><?= $jadwal['mata_pelajaran']; ?></td>
              <td><?= $jadwal['nama']; ?></td>
              <td>
                <a href="<?=  base_url(); ?>admin/jadwal/hapusjadwal/<?= $jadwal['id_jadwal']; ?>" class="btn btn-danger btn-xs remove"><i class="fa fa-trash"></i></a>
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

<div class="modal fade" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Jadwal</h4>
        </div>
        <form action="<?= base_url(); ?>admin/jadwal/tambahjadwal" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="form-group col-md-6">
                <label>Hari</label>
                <select class="form-control select2" name="hari" style="width: 100%;">
                  <option selected="selected" disabled>Pilih Hari</option>
                  <?php foreach($datahari as $hari) : ?>
                    <option value="<?= $hari['id_hari']; ?>"><?= $hari['hari']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label>Mata Pelajaran</label>
                <select class="form-control select2" name="mata_pelajaran" style="width: 100%;">
                  <option selected="selected" disabled>Pilih Mata Pelajaran</option>
                  <?php foreach($datamatapelajaran as $matapelajaran) : ?>
                    <option value="<?= $matapelajaran['id_matapelajaran']; ?>"><?= $matapelajaran['mata_pelajaran']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label>Jam Mulai</label>
                <input type="text" name="jam_mulai" id="jam_mulai" class="form-control" value="<?= set_value('jam_mulai'); ?>" placeholder="Contoh : 08:00">
                <?= form_error('jam_mulai', '<small class="text-danger">', '</small>') ?> 
              </div>
              <div class="form-group col-md-6">
                <label>Jam Berakhir</label>
                <input type="text" name="jam_berakhir" id="jam_berakhir" class="form-control" value="<?= set_value('jam_berakhir'); ?>" placeholder="Contoh : 10:00">
                <?= form_error('jam_berakhir', '<small class="text-danger">', '</small>') ?>
              </div>
            </div>
            <div class="form-group">
              <label>Guru Pengajar</label>
              <select class="form-control select2" name="guru" style="width: 100%;">
                <option selected="selected" disabled>Pilih Mata Pelajaran</option>
                <?php foreach($dataguru as $guru) : ?>
                  <option value="<?= $guru['id_guru']; ?>"><?= $guru['nama']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <input type="text" name="kelas" id="kelas" class="form-control hidden" value="<?= $id_kelas; ?>">
            </div>
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