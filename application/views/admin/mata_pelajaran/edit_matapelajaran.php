<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Data Siswa</h3>
          </div>
          <div class="box-body">
            <!-- Start foreach -->
            <?php foreach($datapelajaran as $pelajaran) { ?>
              <!-- Start Form -->
              <form action="" method="post">
                <div class="form-group">
                  <input type="text" name="id_matapelajaran" id="id_matapelajaran" class="form-control" value="<?= $pelajaran['id_matapelajaran']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="mata_pelajaran" id="mata_pelajaran" class="form-control" value="<?= $pelajaran['mata_pelajaran']; ?>">
                  <?= form_error('mata_pelajaran', '<small class="text-danger">', '</small>') ?>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="<?= base_url(); ?>admin/mata_pelajaran" class="btn btn-warning">Kembali</a>
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