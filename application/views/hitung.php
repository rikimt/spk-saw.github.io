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
        Pemilihan Laptop Menggunakan SAW
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'home'?>"><i class="active fa fa-home"></i> Home</a></li>
        <li>Simple Additive Weighting</li>
        <li class="active">Hitung SAW</li>
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
                    <div class="row">
                        <div class="col-lg-10">
                            <h3>Tabel Kriteria</h3>
                            <table class="table table-striped" style="font-size:12px;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nama Kriteria</th>
                                        <th scope="col">Penjelasan Kriteria</th>
                                        <th scope="col">Bobot Kriteria</th>
                                        <th scope="col">Kategori Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                        var bobot = [];
                                        var kategori_bobot = [];
                                        var nama_laptop = [];
                                    </script>
                                    <?php
                                    $no = 1;
                                    foreach ($kriteria as $k) {
                                    ?>
                                        <script>
                                            bobot.push(<?= $k['bobot_kriteria'] ?>);
                                            kategori_bobot.push('<?= $k['kategori_bobot'] ?>');
                                        </script>
                                        <tr>
                                            <td><?= $k['nama_kriteria'] ?> - C<?= $no ?></td>
                                            <td><?= $k['penjelasan_kriteria'] ?></td>
                                            <td><?= $k['bobot_kriteria'] ?></td>
                                            <td><?= $k['kategori_bobot'] ?></td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <h3>Tabel Sub Kriteria</h3>
                            <?= $this->session->flashdata('message'); ?>
                            <?php if ($this->session->flashdata('error')) {
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $this->session->flashdata('error') ?>
                                </div>
                            <?php
                            } ?>
                            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahsubkriteriamodal"><i class="fa fa-list-ul"></i> Tambah Sub Kriteria</button>
                            <?php
                                if (!empty($sub_kriteria)) {
                                ?>
                                    <div class="table-responsive mb-5">
                                        <table class="table table-striped" style="font-size:12px;" id="datatable-id" role="grid" aria-describedby="datatable-basic_info">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama Kriteria / Bobot</th>
                                                    <th scope="col" class="text-center">1</th>
                                                    <th scope="col" class="text-center">2</th>
                                                    <th scope="col" class="text-center">3</th>
                                                    <th scope="col" class="text-center">4</th>
                                                    <th scope="col" class="text-center">5</th>
                                                    <th scope="col" style="text-align:right;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($sub_kriteria as $s) {
                                                    $id_sub_kriteria = $s['id'];
                                                ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $s['nama_kriteria'] ?></td>
                                                        <td class="text-center"><?= $s['bobot_1'] ?></td>
                                                        <td class="text-center"><?= $s['bobot_2'] ?></td>
                                                        <td class="text-center"><?= $s['bobot_3'] ?></td>
                                                        <td class="text-center"><?= $s['bobot_4'] ?></td>
                                                        <td class="text-center"><?= $s['bobot_5'] ?></td>
                                                        <td style="text-align:right;">
                                                        <a class="btn" data-toggle="modal" href="<?= base_url() ?>hitung/hapus_sub_kriteria/<?= $id_sub_kriteria ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Sub Kriteria <?= $s['nama_kriteria'] ?>?');"><span class="fa fa-trash"></span></a>
                                                            <a class="btn" data-toggle="modal" data-target="#editsubkriteriamodal<?php echo $id_sub_kriteria;?>"><span class="fa fa-pencil"></span></a>
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
                                    <h3>Sub Kriteria masih kosong, silahkan tambah sub kriteria</h3>
                                <?php
                                }?>
                        </div>
                        <div class="col-lg-12">
                            <?php
                            if (!empty($kriteria) && $laptop > 1) {
                            ?>
                                <h3>Tabel Pengisian Data</h3>
                                <table class="table table-striped" style="font-size:12px;">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Laptop</th>
                                            <?php for ($i = 1; $i <= count($kriteria); $i++) {
                                            ?>
                                                <th class="text-center">C<?= $i ?></th>
                                            <?php
                                            } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($laptop as $p) {
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <script>
                                                    nama_laptop.push('<?= $p['nama_laptop'] ?>');
                                                </script>
                                                <td><?= $p['nama_laptop'] ?></td>
                                                <?php for ($i = 1; $i <= count($kriteria); $i++) {
                                                ?>
                                                    <th>
                                                        <select required id="P<?= $no ?>C<?= $i ?>" class="form-control text-center" style="font-size:12px;">
                                                            <option selected > Bobot 1 - 5</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </th>
                                                <?php
                                                } ?>
                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <input type="submit" value="Hitung Data" id="hitung_data" class="btn btn-info" onclick="return hitungData();" />
                        </div>
                        <div class="col-lg-12" id="tabel_normalisasi">

                        </div>

                        <div class="col-lg-12" id="tabel_faktor_ternormalisasi">

                        </div>
                        <div class="col-lg-12 m-5" id="finishing_div">

                        </div>
                    <?php }
                    ?>
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

<!--Modal Add Sub Kriteria-->
<div class="modal fade" id="tambahsubkriteriamodal" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="modalAddLabel">Tambah Sub Kriteria</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'hitung/tambah_sub_kriteria'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label">Nama Kriteria</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="nama_kriteria" id="exampleFormControlSelect1" required>
                                    <option selected disabled value="">Pilih Kategori Bobot</option>
                                    <?php
                                        foreach ($kriteria as $k) {
                                            $nama_kriteria = $k['nama_kriteria'];
                                        ?>
                                            <option value="<?php echo $nama_kriteria; ?>"><?php echo $nama_kriteria; ?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label">1</label>
                            <div class="col-sm-7">
                                <input type="text" required name="bobot_1" class="form-control" placeholder="Masukan Keterangan Bobot">
                                <small id="deskripsi" class="form-text text-muted">Keterangan seperti apa yang akan bernilai 1</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label">2</label>
                            <div class="col-sm-7">
                                <input type="text" required name="bobot_2" class="form-control" placeholder="Masukan Keterangan Bobot">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label">3</label>
                            <div class="col-sm-7">
                                <input type="text" required name="bobot_3" class="form-control" placeholder="Masukan Keterangan Bobot">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label">4</label>
                            <div class="col-sm-7">
                                <input type="text" required name="bobot_4" class="form-control" placeholder="Masukan Keterangan Bobot">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label">5</label>
                            <div class="col-sm-7">
                                <input type="text" required name="bobot_5" class="form-control" placeholder="Masukan Keterangan Bobot">
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

<!--Modal Edit Sub Kriteria-->
<div class="modal fade" id="editsubkriteriamodal<?php echo $id_sub_kriteria;?>" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="modalAddLabel">Edit Kriteria</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'hitung/update_sub_kriteria'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $id_sub_kriteria;?>"/>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label" >Nama Kriteria</label>
                            <div class="col-sm-7">
                                <input type="text" required name="nama_kriteria" class="form-control" placeholder="Masukan Kriteria" value="<?php echo $s['nama_kriteria'];?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label">1</label>
                            <div class="col-sm-7">
                                <input type="text" required name="bobot_1" class="form-control" placeholder="Masukan Keterangan Bobot" value="<?php echo $s['bobot_1'];?>">
                                <small id="deskripsi" class="form-text text-muted">Keterangan seperti apa yang akan bernilai 1</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label">2</label>
                            <div class="col-sm-7">
                                <input type="text" required name="bobot_2" class="form-control" placeholder="Masukan Keterangan Bobot" value="<?php echo $s['bobot_2'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label">3</label>
                            <div class="col-sm-7">
                                <input type="text" required name="bobot_3" class="form-control" placeholder="Masukan Keterangan Bobot" value="<?php echo $s['bobot_3'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label">4</label>
                            <div class="col-sm-7">
                                <input type="text" required name="bobot_4" class="form-control" placeholder="Masukan Keterangan Bobot" value="<?php echo $s['bobot_4'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="col-sm-4 control-label">5</label>
                            <div class="col-sm-7">
                                <input type="text" required name="bobot_5" class="form-control" placeholder="Masukan Keterangan Bobot" value="<?php echo $s['bobot_5'];?>">
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

<script>
    var base_url = '<?php echo base_url() ?>';
</script>
<script>
    function hitungData() {

        var element = document.getElementById("hitung_data"); // notice the change
        element.parentNode.removeChild(element);

        let jumlahlaptop = <?= count($laptop) ?>;
        let jumlahKriteria = <?= count($kriteria) ?>;

        //set bobot
        var noBobot = 1;
        for (let i = 0; i < bobot.length; i++) {
            window['B' + noBobot] = bobot[i];
            noBobot++;
        }
        // print bobot
        for (let i = 1; i <= bobot.length; i++) {
            console.log(window['B' + i]);
        }

        // get value inputan
        var noUrut = 1;
        for (let i = 1; i <= jumlahlaptop; i++) {
            for (let j = 1; j <= jumlahKriteria; j++) {
                window['P' + noUrut + 'C' + j] = document.getElementById('P' + noUrut + 'C' + j).value;
            }
            noUrut++;
        }

        noUrut -= noUrut;

        console.log(kategori_bobot);

        var noUntukKategori = 0;
        window['minmaxcategory'] = [];
        // find max min depends on benefit
        for (let i = 1; i <= jumlahKriteria; i++) {
            window['category' + i] = [];
            for (let j = 1; j <= jumlahlaptop; j++) {
                window['category' + i].push(window['P' + j + 'C' + i]);
            }
            if (kategori_bobot[noUntukKategori] == "Benefit") {
                console.log(window['category' + i])
                window['minmaxcategory'].push(Math.max.apply(Math, window['category' + i]));
            } else if (kategori_bobot[noUntukKategori] == "Cost") {
                console.log(window['category' + i])
                window['minmaxcategory'].push(Math.min.apply(Math, window['category' + i]));
            }
            noUntukKategori++;
        }

        noUntukKategori -= noUntukKategori;

        console.log(minmaxcategory);

        // normalisasi
        var urutanMinMax = 0;
        for (let j = 1; j <= jumlahKriteria; j++) {
            for (let i = 1; i <= jumlahlaptop; i++) {
                // console.log(kategori_bobot[noUntukKategori]);
                if (kategori_bobot[j - 1] == "Benefit") {
                    window['NP' + i + 'NC' + j] = window['P' + i + 'C' + j] / minmaxcategory[urutanMinMax];
                } else if (kategori_bobot[j - 1] == "Cost") {
                    window['NP' + i + 'NC' + j] = minmaxcategory[urutanMinMax] / window['P' + i + 'C' + j];
                }
            }
            urutanMinMax++;
        }

        // Add hasil normalisasi to array
        var noUrut = 1;
        for (let i = 1; i <= jumlahlaptop; i++) {
            window['dataNormalisasiPerlaptop' + i] = [];
            for (let j = 1; j <= jumlahKriteria; j++) {
                window['dataNormalisasiPerlaptop' + i].push(window['NP' + noUrut + 'NC' + j]);
            }
            noUrut++;
        }
        noUrut -= noUrut;


        var html = `<br><h3>Tabel Normalisasi</h3><table class="table table-bordered">`;
        for (let i = 1; i <= jumlahlaptop; i++) {
            html += `<tr>`;
            html += `<td>C${i}</td>`;
            for (let j = 0; j < window['dataNormalisasiPerlaptop' + i].length; j++) {
                html += `<td>`;
                html += window['dataNormalisasiPerlaptop' + i][j];
                html += `</td>`;
            }
            html += `</tr>`;
        }
        html += `</table>`;
        document.getElementById("tabel_normalisasi").innerHTML = html;

        var html = ``;

        // final penghitungan tabel ternormalisasi
        var backToZero = 0;
        var hasilKali = [];
        var finalData = [];
        var hitungTabelFaktor;
        for (let i = 1; i <= jumlahlaptop; i++) {
            for (let j = 1; j <= jumlahKriteria; j++) {
                // console.log(window['dataNormalisasiPerlaptop' + i][backToZero] + '*' + window['B' + j]);
                hitungTabelFaktor = window['dataNormalisasiPerlaptop' + i][backToZero] * window['B' + j];
                // console.log(window['dataNormalisasiPerlaptop' + i]);
                hasilKali.push(hitungTabelFaktor);
                // console.log("Hasilnya : " + hitungTabelFaktor);
                hitungTabelFaktor = 0;
                backToZero++;
            }
            var sum = hasilKali.reduce(function(a, b) {
                return a + b;
            }, 0);

            // console.log(hitungTabelFaktor);
            finalData.push(sum);
            hasilKali = [];
            backToZero -= backToZero;
        }

        var terpilih = Math.max.apply(Math, finalData);
        var laptopTerpilih;
        var html = `<br><h3>Tabel Faktor Ternormalisasi & Hasil Laptop Terpilih</h3><table class="table table-bordered">`;
        for (let i = 0; i < finalData.length; i++) {
            html += `<tr>
            <td>${nama_laptop[i]}</td>
            `;
            if (finalData[i] == terpilih) {
                data = finalData[i] + ' <span style="color:red">(laptop Terpilih)</span>';
                laptopTerpilih = nama_laptop[i];
            } else {
                data = finalData[i];
            }
            html += `<td>${data}</td>
            </tr>`
        }
        console.log(laptopTerpilih);
        $.ajax({
            url: "<?= base_url() ?>saw/simpan_hasil",
            type: "POST",
            data: {
                laptop_terpilih: laptopTerpilih
            },
            cache: false,
            success: function(dataResult) {
                console.log("Sukses Kirim");
            }
        });
        html += `</table>`;
        isifinishing = `
        <a href="${base_url}saw" class="btn btn-primary">Back to SAW Dashboard</a>
        `;
        document.getElementById("tabel_faktor_ternormalisasi").innerHTML = html;
        document.getElementById("finishing_div").innerHTML = isifinishing;
    }
</script>


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
