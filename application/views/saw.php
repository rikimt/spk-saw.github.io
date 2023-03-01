<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pemilihan Laptop</title>
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
        SAW
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'home'?>"><i class="active fa fa-home"></i> Home</a></li>
        <li class="active">Simple Additive Weighting</li>
      </ol>
    </section>

    <!-- Main content -->
      <?php
        $id_admin=$this->session->userdata('idadmin');
        $q=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
        $c=$q->row_array();
      ?>
    <section class="content">
        <div>
                    <?= $this->session->flashdata('message'); ?>
                    <?php if ($this->session->flashdata('error')) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $this->session->flashdata('error') ?>
                        </div>
                    <?php
                    } ?>
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahkriteriamodal"><i class="fa fa-list-ul"></i> Tambah Kriteria</button>
                    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahlaptopmodal"><i class="fa fa-laptop"></i> Tambah Laptop</button>
                    <a href="<?= base_url() ?>hitung" class="btn btn-warning mb-3"><i class="fa fa-trophy"></i> Pilih Laptop Terbaik</a><br>
                    <?php
                    if (!empty($kriteria)) {
                    ?>
                        <h3>Tabel Kriteria</h3>
                        <div class="table-responsive mb-5">
                            <table class="table table-striped" style="font-size:12px;" id="datatable-id" role="grid" aria-describedby="datatable-basic_info">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Kriteria</th>
                                        <th scope="col">Penjelasan Kriteria</th>
                                        <th scope="col">Bobot Kriteria</th>
                                        <th scope="col">Kategori Bobot</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kriteria as $k) {
                                        $id_kriteria = $k['id'];
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $k['nama_kriteria'] ?></td>
                                            <td><?= $k['penjelasan_kriteria'] ?></td>
                                            <td><?= $k['bobot_kriteria'] ?></td>
                                            <td><?= $k['kategori_bobot'] ?></td>
                                            <td style="text-align:right;">
                                            <a class="btn" data-toggle="modal" href="<?= base_url() ?>saw/hapus_kriteria/<?= $id_kriteria ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Kriteria <?= $k['nama_kriteria'] ?>?');"><span class="fa fa-trash"></span></a>
                                                <a class="btn" data-toggle="modal" data-target="#editkriteriamodal<?php echo $id_kriteria;?>"><span class="fa fa-pencil"></span></a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    } else {
                    ?>
                        <h3>Kriteria masih kosong, silahkan tambah kriteria</h3>
                    <?php
                    }
                    if (!empty($laptop)) {
                    ?>
                        <h3>Tabel Laptop</h3>
                        <div class="table-responsive mb-5">
                            <table class="table table-striped" style="font-size:12px;" id="datatable-id2" role="grid" aria-describedby="datatable-basic_info">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Laptop</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($laptop as $p) {
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $p['nama_laptop'] ?></td>
                                            <td>
                                                <a class="btn" data-toggle="modal" href="<?= base_url() ?>saw/hapus_laptop/<?= $p['id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Laptop <?= $p['nama_laptop'] ?>?');"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    } else {
                    ?>
                        <h3>Data Laptop masih kosong, silahkan tambah laptop</h3>
                    <?php
                    }
                    ?>
                    <h3>Tabel Riwayat Laptop Terbaik</h3>
                    <div class="table-responsive mb-5">
                        <table class="table table-striped" style="font-size:12px;" id="datatable-id3" role="grid" aria-describedby="datatable-basic_info">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal Penentuan</th>
                                    <th scope="col">Laptop Terpilih</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($riwayat as $r) {
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= date("d-m-Y", strtotime($r['tanggal_penghitungan'])) ?></td>
                                        <td><?= $r['laptop_terpilih'] ?></td>
                                        <td><a class="btn" data-toggle="modal" href="<?= base_url() ?>saw/hapus_riwayat/<?= $r['id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Riwayat? <?= $r['laptop_terpilih'] ?>?');"><span class="fa fa-trash"></span></a></td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="#">Kelompok 4</a>
  </footer>

</div>
<!-- ./wrapper -->

<!--Modal Add Kriteria-->
    <div class="modal fade" id="tambahkriteriamodal" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="modalAddLabel">Tambah Kriteria</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'saw/tambah_kriteria'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label">Nama Kriteria</label>
                            <div class="col-sm-7">
                                <input type="text" required name="nama_kriteria" class="form-control" placeholder="Masukan Kriteria">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label">Penjelasan Kriteria</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" name="penjelasan_kriteria" rows="4" placeholder="Masukan Penjelasan Mengenai Kriteria Kriteria"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label">Bobot Kriteria</label>
                            <div class="col-sm-7">
                                <input type="number" required name="bobot_kriteria" class="form-control" placeholder="Masukan Bobot Kriteria" min="10" max="100">
                                <small id="deskripsi" class="form-text text-muted">Masukkan nilai bobot dalam rentang 10 sampai 100</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Kategori Bobot(Cost/Benefit)</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="kategori_bobot" id="exampleFormControlSelect1" required>
                                    <option selected disabled value="">Pilih Kategori Bobot</option>
                                    <option>Cost</option>
                                    <option>Benefit</option>
                                </select>
                                <small id="deskripsi" class="form-text text-muted">Jika cost maka semakin kecil nilai semakin bagus, jika benefit maka semakin besar nilai semakin bagus.</small>
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
<!--Modal Edit Kriteria-->
    <div class="modal fade" id="editkriteriamodal<?php echo $id_kriteria;?>" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="modalAddLabel">Edit Kriteria</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'saw/update_kriteria'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $id_kriteria;?>"/>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label" >Nama Kriteria</label>
                            <div class="col-sm-7">
                                <input type="text" required name="nama_kriteria" class="form-control" placeholder="Masukan Kriteria" value="<?php echo $k['nama_kriteria'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label">Penjelasan Kriteria</label>
                            <div class="col-sm-7">
                            <input type="text" class="form-control" name="penjelasan_kriteria" rows="4" placeholder="Masukan Penjelasan Mengenai Kriteria Kriteria" value="<?php echo $k['penjelasan_kriteria'];?>"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label">Bobot Kriteria</label>
                            <div class="col-sm-7">
                                <input type="number" required name="bobot_kriteria" class="form-control" placeholder="Masukan Bobot Kriteria" value="<?php echo $k['bobot_kriteria'];?>" min="10" max="100">
                                <small id="deskripsi" class="form-text text-muted">Masukkan nilai bobot dalam rentang 10 sampai 100</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Kategori Bobot(Cost/Benefit)</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="kategori_bobot" id="exampleFormControlSelect1" required>
                                    <option value="<?php echo $k['kategori_bobot'];?>"><?php echo $k['kategori_bobot'];?></option>
                                    <?php if($k['kategori_bobot'] == "Benefit"): ?>
                                        <option value="Cost">Cost</option>
                                    <?php else: ?>
                                        <option value="Benefit">Benefit</option>
                                    <?php endif; ?>
                                </select>
                                <small id="deskripsi" class="form-text text-muted">Jika cost maka semakin kecil nilai semakin bagus, jika benefit maka semakin besar nilai semakin bagus.</small>
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
        
<!--Modal Add Laptop-->
    <div class="modal fade" id="tambahlaptopmodal" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="modalAddLabel">Tambah Kriteria</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'saw/tambah_laptop'?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-4 control-label">Nama Laptop</label>
                                <div class="col-sm-7">
                                    <input type="text" required name="nama_laptop" class="form-control" placeholder="Masukan Nama Laptop">
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
<script src="<?php echo base_url().'bower_components/morris.js/morris.min.js'?>"></script>
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
</body>
</html>
