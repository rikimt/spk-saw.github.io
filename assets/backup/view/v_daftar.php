<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/bootstrap/dist/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/font-awesome/css/font-awesome.min.css'?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/Ionicons/css/ionicons.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Administrator</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Administrator</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
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
              <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- <span class="hidden-xs">Alexander Pierce</span> -->
              <span class="hidden-xs"><?php echo $c['pengguna_nama'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <!-- Alexander Pierce - Web Developer -->
                  <?php echo $c['pengguna_nama'];?>
                  <small>Administrator</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <!-- <p>Alexander Pierce</p> -->
          <p><?php echo $c['pengguna_nama'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li> -->
        <li><a href="<?php echo base_url().'admin/Data'?>"><i class="fa fa-book"></i> <span>DATA</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box-body">
            <table id="example1" class="table table-striped" style="font-size:12px;">
              <thead>
              <tr>
                  <th style="width:70px;">#Tanggal</th>
                  <th>No Peserta</th>
                  <th>NISN</th>
                  <th>Nama Peserta</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Warga Negara</th>
                  <th>Alamat Rumah</th>
                  <th>RT</th>
                  <th>RW</th>
                  <th>Kode Pos</th>
                  <th>Kelurahan</th>
                  <th>Kecamatan</th>
                  <th>Kabupaten</th>
                  <th>Provinsi</th>
                  <th>Berat Badan</th>
                  <th>Tinggi Badan</th>
                  <th style="text-align:right;">Aksi</th>
              </tr>
              </thead>
              <tbody>
              <?php
                  $no=0;
                    foreach ($data->result_array() as $i) :
                       $no++;
                     $id_peserta=$i['id_peserta'];
                     $no_peserta=$i['no_peserta'];
                     $nisn=$i['nisn'];
                     $nama_peserta=$i['nama_peserta'];
                     $tanggal_daftar=$i['tanggal_daftar'];
                     $tempat_lahir=$i['tempat_lahir']; 
                     $tanggal_lahir=$i['tanggal_lahir']; 
                     $jenis_kelamin=$i['jenis_kelamin']; 
                     $warga_negara=$i['warga_negara']; 
                     $alamat_rumah=$i['alamat_rumah']; 
                     $rt=$i['rt']; 
                     $rw=$i['rw']; 
                     $kode_pos=$i['kode_pos']; 
                     $kelurahan=$i['kelurahan']; 
                     $kecamatan=$i['kecamatan']; 
                     $kabupaten=$i['kabupaten']; 
                     $provinsi=$i['provinsi']; 
                     $berat_badan=$i['berat_badan']; 
                     $tinggi_badan=$i['tinggi_badan']; 
                  ?>
              <tr>
                <td><?php echo $tanggal_daftar;?></td>
                <td><?php echo $no_peserta;?></td>
                <td><?php echo $nisn;?></td>
                <td><?php echo $nama_peserta;?></td>
                <td><?php echo $tempat_lahir;?></td>
                <td><?php echo $tanggal_lahir;?></td>
                <td><?php echo $jenis_kelamin;?></td>
                <td><?php echo $warga_negara;?></td>
                <td><?php echo $alamat_rumah;?></td>
                <td><?php echo $rt;?></td>
                <td><?php echo $rw;?></td>
                <td><?php echo $kode_pos;?></td>
                <td><?php echo $kelurahan;?></td>
                <td><?php echo $kecamatan;?></td>
                <td><?php echo $kabupaten;?></td>
                <td><?php echo $provinsi;?></td>
                <td><?php echo $berat_badan;?></td>
                <td><?php echo $tinggi_badan;?></td>
                <td style="text-align:right;">
                      <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id_peserta;?>"><span class="fa fa-trash"></span></a>
                      <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id_peserta;?>"><span class="fa fa-pencil"></span></a>

                </td>
              </tr>
              <?php endforeach;?>
              </tbody>
            </table>
            </div
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Tamrinuttulab &copy; 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!--Modal Edit Daftar-->
<?php
          $no=0;
          foreach ($data->result_array() as $i) :
              $no++;
              $id_peserta=$i['id_peserta'];
              $no_peserta=$i['no_peserta'];
              $nisn=$i['nisn'];
              $nama_peserta=$i['nama_peserta'];
              $tanggal_daftar=$i['tanggal_daftar'];
              $tempat_lahir=$i['tempat_lahir'];
              $tanggal_lahir=$i['tanggal_lahir']; 
              $jenis_kelamin=$i['jenis_kelamin']; 
              $warga_negara=$i['warga_negara']; 
              $alamat_rumah=$i['alamat_rumah']; 
              $rt=$i['rt']; 
              $rw=$i['rw']; 
              $kode_pos=$i['kode_pos']; 
              $kelurahan=$i['kelurahan']; 
              $kecamatan=$i['kecamatan']; 
              $kabupaten=$i['kabupaten']; 
              $provinsi=$i['provinsi']; 
              $berat_badan=$i['berat_badan']; 
              $tinggi_badan=$i['tinggi_badan'];  
          ?>
        <div class="modal fade" id="ModalEdit<?php echo $id_peserta;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Data Peserta</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/Data/update_daftar'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <input type="hidden" name="xkode" value="<?php echo $id_peserta;?>"/>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">No Peserta</label>
                          <div class="col-sm-7">
                            <input type="text" name="xnoPeserta" class="form-control" value="<?php echo $no_peserta;?>" id="inputUserName" disabled required>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">NISN</label>
                          <div class="col-sm-7">
                            <input type="text" name="xnisn" class="form-control" value="<?php echo $nisn;?>" id="inputUserName" placeholder="NISN" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Nama Peserta</label>
                          <div class="col-sm-7">
                            <input type="text" name="xnamaPeserta" class="form-control" value="<?php echo $nama_peserta;?>" id="inputUserName" placeholder="Nama Peserta" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Tempat Lahir</label>
                          <div class="col-sm-7">
                            <input type="text" name="xtempatLahir" class="form-control" value="<?php echo $tempat_lahir;?>" id="inputUserName" placeholder="Tempat Lahir" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Tanggal Lahir</label>
                          <div class="col-sm-7">
                            <input type="date" name="xtanggalLahir" class="form-control" value="<?php echo $tanggal_lahir;?>" id="inputUserName" placeholder="Tanggal Lahir" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                          <div class="col-sm-7">
                            <select class="form-control" name="xjenisKelamin" >
                              <option value="<?php echo $jenis_kelamin;?>"><?php echo $jenis_kelamin;?></option>
                              <?php if($jenis_kelamin == "Perempuan"): ?>
                                <option value="Laki-Laki">Laki-Laki</option>
                              <?php else: ?>
                                <option value="Perempuan">Perempuan</option>
                              <?php endif; ?>
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Warga Negara</label>
                          <div class="col-sm-7">
                          <select class="form-control" name="xwargaNegara" >
                              <option value="<?php echo $warga_negara;?>"><?php echo $warga_negara;?></option>
                              <?php if($jenis_kelamin == "WNI"): ?>
                                <option value="WNA">WNA</option>
                              <?php else: ?>
                                <option value="WNI">WNI</option>
                              <?php endif; ?>
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Alamat Rumah</label>
                          <div class="col-sm-7">
                            <input type="text" name="xalamatRumah" class="form-control" value="<?php echo $alamat_rumah;?>" id="inputUserName" placeholder="Alamat Rumah" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">RT</label>
                          <div class="col-sm-7">
                            <input type="text" name="xrt" class="form-control" value="<?php echo $rt;?>" id="inputUserName" placeholder="RT" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">RW</label>
                          <div class="col-sm-7">
                            <input type="text" name="xrw" class="form-control" value="<?php echo $rw;?>" id="inputUserName" placeholder="RW" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Kode Pos</label>
                          <div class="col-sm-7">
                            <input type="text" name="xkodePos" class="form-control" value="<?php echo $kode_pos;?>" id="inputUserName" placeholder="Kode Pos" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Kelurahan</label>
                          <div class="col-sm-7">
                            <input type="text" name="xkelurahan" class="form-control" value="<?php echo $kelurahan;?>" id="inputUserName" placeholder="Kelurahan" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Kecamatan</label>
                          <div class="col-sm-7">
                            <input type="text" name="xkecamatan" class="form-control" value="<?php echo $kecamatan;?>" id="inputUserName" placeholder="Kecamatan" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Kabupaten</label>
                          <div class="col-sm-7">
                            <input type="text" name="xkabupaten" class="form-control" value="<?php echo $kabupaten;?>" id="inputUserName" placeholder="Kabupaten" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Provinsi</label>
                          <div class="col-sm-7">
                            <input type="text" name="xprovinsi" class="form-control" value="<?php echo $provinsi;?>" id="inputUserName" placeholder="Provinsi" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Berat Badan</label>
                          <div class="col-sm-7">
                            <input type="text" name="xberatBadan" class="form-control" value="<?php echo $berat_badan;?>" id="inputUserName" placeholder="Berat Badan" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputUserName" class="col-sm-4 control-label">Tinggi Badan</label>
                          <div class="col-sm-7">
                            <input type="text" name="xtinggiBadan" class="form-control" value="<?php echo $tinggi_badan;?>" id="inputUserName" placeholder="Tinggi Badan" required>
                          </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ModalHapus<?php echo $id_peserta;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Data Peserta</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/Data/hapus_inbox'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="kode" value="<?php echo $id_peserta;?>"/>
                    

                            <p>Apakah Anda yakin mau menghapus</b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    <?php endforeach;?>

    
<!-- jQuery 3 -->
<script src="<?php echo base_url().'assets/bower_components/jquery/dist/jquery.min.js'?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url().'assets/bower_components/bootstrap/dist/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/bower_components/datatables.net/js/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/bower_components/fastclick/lib/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src=".<?php echo base_url().'assets/dist/js/adminlte.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>