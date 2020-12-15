<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Mata Pelajaran</h3>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal">
              <i class="fa fa-user-plus"></i> Tambah Hari
            </button>
          </div>
          <div class="box-body">
            <table id="example2" class="table table-boredered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Hari</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($datahari as $hari) :
                 ?>
                 <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $hari['hari']; ?></td>
                  <td>
                    <a href="<?= base_url(); ?>admin/hari/edithari/<?= $hari['id_hari']; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
                    <a href="<?= base_url(); ?>admin/hari/hapushari/<?= $hari['id_hari']; ?>" class="btn btn-danger btn-xs remove"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
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
          <h4 class="modal-title">Tambah hari</h4>
        </div>
        <form action="<?= base_url(); ?>admin/hari/tambahhari" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label>Hari</label>
              <input type="text" class="form-control" name="hari" id="hari">
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