<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/bpn/img/load.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datepicker/datepicker3.css'?>">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/iCheck/all.css'?>">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/colorpicker/bootstrap-colorpicker.min.css'?>">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.css'?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2/select2.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  </head>
  <body>
      <form action="<?php echo site_url('daftar/kirim_pesan');?>" method="POST" class="contactForm">
        <table width="400px">
          <tr>
            <td>No Peserta</td>
            <td>
              <div class="form-group">
                <input type="text" name="xnoPeserta" class="form-control" placeholder="No Peserta" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>NISN</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="xnisn" placeholder="NISN" data-rule="minlen:4" data-msg="Please enter a valid NISN" />
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>Nama Peserta</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="xnamaPeserta" placeholder="Nama Peserta" data-rule="minlen:4" data-msg="Please fill the text field" />
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>Tempat Lahir</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="xtempatLahir" placeholder="Tempat Lahir" data-rule="minlen:4" data-msg="Please fill the text field" />
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>Tanggal Lahir</td>
            <td>
              <div class="form-group">
                <input type="date" class="form-control" name="xtanggalLahir" placeholder="Tanggal Lahir" data-rule="minlen:4" data-msg="Please fill the text field" />
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>
              <div class="form-group">
                <select class="form-select" name="xjenisKelamin">
                  <option value="">--- Jenis Kelamin ---</option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>Warga Negara</td>
            <td>
              <div class="form-group">
                <select class="form-select" name="xwargaNegara">
                  <option value="">--- Warga Negara ---</option>
                  <option value="WNI">WNI</option>
                  <option value="WNA">WNA</option>
                </select>
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>Alamat Rumah</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="xalamatRumah" placeholder="Alamat Rumah" data-rule="minlen:4" data-msg="Please fill the text field" />
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>RT</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="xrt" placeholder="RT" data-rule="minlen:4" data-msg="Please fill the text field" />
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>RW</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="xrw" placeholder="RW" data-rule="minlen:4" data-msg="Please fill the text field" />
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>Kode Pos</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="xkodePos" placeholder="Kode Pos" data-rule="minlen:4" data-msg="Please fill the text field" />
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>Kelurahan</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="xkelurahan" placeholder="Kelurahan" data-rule="minlen:4" data-msg="Please fill the text field" />
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>Kecamatan</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="xkecamatan" placeholder="Kecamatan" data-rule="minlen:4" data-msg="Please fill the text field" />
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>Kabupaten</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="xkabupaten" placeholder="Kabupaten" data-rule="minlen:4" data-msg="Please fill the text field" />
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>Provinsi</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="xprovinsi" placeholder="Provinsi" data-rule="minlen:4" data-msg="Please fill the text field" />
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>Berat Badan</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="xberatBadan" placeholder="Berat Badan" data-rule="minlen:4" data-msg="Please fill the text field" />
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>Tinggi Badan</td>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="xtinggiBadan" placeholder="Tinggi Badan" data-rule="minlen:4" data-msg="Please fill the text field" />
                <div class="validation"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="text-center"><button type="submit">Kirim</button></div>
            </td>
          </tr>
        </table>
        <!-- <div class="form-group">
          <textarea class="form-control" name="xtempatLahir" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
          <div class="validation"></div>
        </div> -->
        
      </form>
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
  </body>
</html>