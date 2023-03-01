<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url().'home'?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>K</b>4</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Kelompok</b> 4</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <?php
            $id_admin=$this->session->userdata('idadmin');
            $q=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
            $c=$q->row_array();
          ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url().'assets/images/'.$c['pengguna_photo']?>" class="user-image" alt="User Image">
              <span class="hidden-xs"> <?php echo $c['pengguna_nama'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().'assets/images/'.$c['pengguna_photo']?>" class="img-circle" alt="User Image">

                <p>
                    <?php echo $c['pengguna_nama'];?>
                    <small> <?php echo $c['pengguna_level'];?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                    <a href="<?php echo base_url().'login/logout'?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> <span> Sign out</span></a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>