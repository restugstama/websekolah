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
            <?php foreach($datahari as $hari) { ?>
              <!-- Start Form -->
              <form action="" method="post">
                <div class="form-group">
                  <label>Hari</label>
                  <input type="text" name="hari" id="hari" class="form-control" value="<?= $hari['hari']; ?>">
                  <?= form_error('hari', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                  <input type="text" name="id_hari" id="id_hari" class="form-control hidden" value="<?= $hari['id_hari']; ?>">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="<?= base_url(); ?>admin/hari" class="btn btn-warning">Kembali</a>
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