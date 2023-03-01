<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Pengguna</title>
    <!-- Favicons -->
    <link href="<?php echo base_url().'assets/images/logo/logo.png'?>" rel="icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <!-- Bootstrap 3.3.7 -->
 <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/bootstrap/dist/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/font-awesome/css/font-awesome.min.css'?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/Ionicons/css/ionicons.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/morris.js/morris.css'?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/jvectormap/jquery-jvectormap.css'?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/bootstrap-daterangepicker/daterangepicker.css'?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'?>">

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
  <!--Header-->
  <?php
            $this->load->view('header');
        ?>
  
  <!-- sidebar menu: : style can be found in sidebar.less -->
    <?php
        $this->load->view('menu');
    ?>
  <!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pengguna Administrator
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'home'?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Data Pengguna Administrator</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box-body">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#modalAdd"><span class="fa fa-user-plus"></span> Add Pengguna</a>
            </div>
            <table id="example1" class="table table-striped" style="font-size:12px;">
              <thead>
              <tr>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th style="text-align:right;">Aksi</th>
              </tr>
              </thead>
              <tbody>
              <?php
                  $no=0;
                    foreach ($data->result_array() as $i) :
                       $no++;
                     $pengguna_id=$i['pengguna_id'];
                     $pengguna_nama=$i['pengguna_nama'];
                     $pengguna_username=$i['pengguna_username'];
                     $pengguna_password=$i['pengguna_password'];
                     $pengguna_level=$i['pengguna_level']; 
                     $pengguna_photo=$i['pengguna_photo']; 
                  ?>
              <tr>
                <td><img width="40" height="40" class="img-circle" src="<?php echo base_url().'assets/images/'.$pengguna_photo;?>"></td>
                <td><?php echo $pengguna_nama;?></td>
                <td><?php echo $pengguna_username;?></td>
                <td><?php echo $pengguna_level;?></td>
                <td style="text-align:right;">
                      <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $pengguna_id;?>"><span class="fa fa-trash"></span></a>
                      <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $pengguna_id;?>"><span class="fa fa-pencil"></span></a>

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
    <strong>Copyright &copy; 2023 <a href="#">Kelompok 4</a>
  </footer>

 
</div>
<!-- ./wrapper -->

<!--Modal Add Pengguna-->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="modalAddLabel">Add Pengguna</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'pengguna/simpan_pengguna'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xnamaPengguna" class="form-control" id="inputUserName" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xusername" class="form-control" id="inputUserName" placeholder="Username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword" class="form-control" id="inputPassword3" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword2" class="form-control" id="inputPassword4" placeholder="Ulangi Password" required>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="xlevel" required>
                                                <option value="Admin">Admin</option>
                                                <option value="User">User</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Foto</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="filefoto" />
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


<!--Modal Edit Daftar-->
<?php
          $no=0;
          foreach ($data->result_array() as $i) :
                $no++;
                $pengguna_id=$i['pengguna_id'];
                $pengguna_nama=$i['pengguna_nama'];
                $pengguna_username=$i['pengguna_username'];
                $pengguna_password=$i['pengguna_password'];
                $pengguna_level=$i['pengguna_level'];
                $pengguna_photo=$i['pengguna_photo']; 

          ?>
        <div class="modal fade" id="ModalEdit<?php echo $pengguna_id;?>" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="modalAddLabel">Edit Data Pengguna</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'Pengguna/update_pengguna'?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                        <input type="hidden" name="xkode" value="<?php echo $pengguna_id;?>"/>
                        <div class="form-group">
                          <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                            <div class="col-sm-7">
                              <input type="text" name="xnamaPengguna" class="form-control" value="<?php echo $pengguna_nama;?>" id="inputUserName" required>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-7">
                              <input type="text" name="xusername" class="form-control" value="<?php echo $pengguna_username;?>" id="inputUserName" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="inputUserName" class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-7">
                              <input type="text" name="xpassword" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="inputUserName" class="col-sm-4 control-label">Konfirmasi Password</label>
                            <div class="col-sm-7">
                              <input type="text" name="xpassword2" class="form-control" id="inputPassword4" placeholder="Konfirmasi Password">
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                          <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                            <div class="col-sm-7">
                              <select class="form-control" name="xlevel" >
                                <option value="<?php echo $pengguna_level;?>"><?php echo $pengguna_level;?></option>
                                <?php if($pengguna_level == "Admin"): ?>
                                  <option value="User">User</option>
                                <?php else: ?>
                                  <option value="Admin">Admin</option>
                                <?php endif; ?>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="inputUserName" class="col-sm-4 control-label">Foto</label>
                            <div class="col-sm-7">
                            <input type="file" name="filefoto"/>
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


        <div class="modal fade" id="ModalHapus<?php echo $pengguna_id;?>" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="modalAddLabel">Hapus Data Peserta</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'Pengguna/hapus_pengguna'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="xkode" value="<?php echo $pengguna_id;?>"/>
                    

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

    <?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='warning'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Warning',
                    text: "Gambar yang Anda masukan terlalu besar.",
                    showHideTransition: 'slide',
                    icon: 'warning',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FFC017'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Pengguna Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Pengguna berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Pengguna Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='show-modal'):?>
        <script type="text/javascript">
                $('#ModalResetPassword').modal('show');
        </script>
    <?php else:?>

    <?php endif;?>

    
<!-- jQuery 3 -->
<script src="<?php echo base_url().'assets/bower_components/jquery/dist/jquery.min.js'?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url().'assets/bower_components/jquery-ui/jquery-ui.min.js'?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url().'assets/bower_components/bootstrap/dist/js/bootstrap.min.js'?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url().'assets/bower_components/raphael/raphael.min.js'?>"></script>
<script src="<?php echo base_url().'assets/bower_components/morris.js/morris.min.js'?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url().'assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js'?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url().'assets/bower_components/jquery-knob/dist/jquery.knob.min.js'?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url().'assets/bower_components/moment/min/moment.min.js'?>"></script>
<script src="<?php echo base_url().'assets/bower_components/bootstrap-daterangepicker/daterangepicker.js'?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url().'assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url().'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url().'assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/bower_components/fastclick/lib/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/adminlte.min.js'?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url().'assets/dist/js/pages/dashboard.js'?>"></script>
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