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
      	<div class="row">
      		<div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-primary">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Nadia Carmichael</h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li>
                	<a href="#">Mata Pelajaran</a>
                </li>
                <li>
                	<a href="#">Jam Pelajaran</a>
                </li>
                <li>
                	<a href="#"></a>
                </li>
              </ul>
              <button class="btn btn-primary" 
                	style="
                	padding: 10px 35px;
                	border-radius: 10px;">
                		Masuk
                	</button>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
      	</div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->