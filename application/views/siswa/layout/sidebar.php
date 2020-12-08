<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url(); ?>assets/img/profile/<?= $user['image']; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?= $user['nama']; ?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Main</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="<?= base_url(); ?>admin/dashboard"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
      <li><a href="<?= base_url(); ?>siswa/profile"><i class="fa fa-user"></i> <span>Profile</span></a></li>
      <li class="header">Menu</li>
      <li><a href="<?= base_url(); ?>admin/jadwal"><i class="fa fa-home"></i> <span>Kelas</span></a></li>
      <li><a href="<?= base_url(); ?>admin/user"><i class="fa fa-calendar"></i> <span>Jadwal</span></a></li>
      <li><a href="<?= base_url(); ?>login/logout"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>