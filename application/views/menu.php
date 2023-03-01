<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <?php
            $id_admin=$this->session->userdata('idadmin');
            $q=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
            $c=$q->row_array();
          ?>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().'assets/images/'.$c['pengguna_photo']?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <?php echo $c['pengguna_nama'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url().'home'?>">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
          
        </li>
        <li><a href="<?php echo base_url().'saw'?>"><i class="fa fa-laptop"></i> <span>Pemilihan Laptop</span></a></li>
        <li class="header">ADMIN</li>
        <li><a href="<?php echo base_url().'Pengguna'?>"><i class="fa fa-users"></i> <span>Pengguna</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>