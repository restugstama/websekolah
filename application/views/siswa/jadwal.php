<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
          Jadwal Siswa
        </h3>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover">
         <thead>
          <tr>
            <th>Hari</th>
            <th>Jam</th>
            <th>Mata Pelajaran</th>
            <th>Guru Pengajar</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($datajadwal as $jadwal) : ?>
            <tr>
              <td><?= $jadwal['hari']; ?></td>
              <td><?= $jadwal['jam_mulai']; ?> - <?= $jadwal['jam_berakhir']; ?></td>
              <td><?= $jadwal['mata_pelajaran']; ?></td>
              <td><?= $jadwal['nama']; ?></td>
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