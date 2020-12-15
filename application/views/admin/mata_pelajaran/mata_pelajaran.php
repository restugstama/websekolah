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
             <i class="fa fa-user-plus"></i> Tambah Mata Pelajaran
           </button>
         </div>
         <div class="box-body">
          <table id="example2" class="table table-boredered">
            <thead>
              <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($datapelajaran as $matapelajaran) :
               ?>
               <tr>
                <td><?= $no++ ?></td>
                <td><?= $matapelajaran['mata_pelajaran']; ?></td>
                <td>
                  <a href="<?= base_url(); ?>admin/mata_pelajaran/editmatapelajaran/<?= $matapelajaran['id_matapelajaran']; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
                  <a href="<?= base_url(); ?>admin/mata_pelajaran/hapusmatapelajaran/<?= $matapelajaran['id_matapelajaran']; ?>" class="btn btn-danger btn-xs remove"><i class="fa fa-trash"></i></a>
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
          <h4 class="modal-title">Tambah Mata Pelajaran</h4>
        </div>
        <form action="<?= base_url(); ?>admin/mata_pelajaran/tambahmatapelajaran" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label>Mata Pelajaran</label>
              <input type="text" class="form-control" name="mata_pelajaran" id="mata_pelajaran">
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