  <div class="login-box">
    <div class="login-box-body">
      <div class="login-logo">
        <a href="<?= base_url(''); ?>"><b>Login </b>Admin</a>
      </div>
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('admin'); ?>" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <?= form_error('username', '<small class="text-danger">', '</small>') ?>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <?= form_error('password', '<small class="text-danger">', '</small>') ?>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
      </form>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->