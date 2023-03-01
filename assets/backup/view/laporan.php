<h2><center>Data Pendaftaran</center></h2>
<hr/>
<table  border="1" cellpadding="10" cellspacing="0" >
<tr>
	<th style="width:70px;">#Tanggal</th>
	<th>No Peserta</th>
	<th>NISN</th>
	<th>Nama Peserta</th>
	<th>Tempat Lahir</th>
	<th>Tanggal Lahir</th>
	<th>Jenis Kelamin</th>
	<th>Alamat Rumah</th>
	<th>Tingkat Sekolah</th>
</tr>
	<?php 
	$no = 1;
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
	 $asal_sekolah=$i['asal_sekolah']; 
	 $sekolah_tujuan=$i['sekolah_tujuan'];
  ?>
		<tr>
                <td><?php echo $tanggal_daftar;?></td>
                <td><?php echo $no_peserta;?></td>
                <td><?php echo $nisn;?></td>
                <td><?php echo $nama_peserta;?></td>
                <td><?php echo $tempat_lahir;?></td>
                <td><?php echo $tanggal_lahir;?></td>
                <td><?php echo $jenis_kelamin;?></td>
                <td><?php echo $alamat_rumah;?></td>
                <td><?php echo $sekolah_tujuan;?></td>
		</tr>
		<?php
	endforeach;
	?>
</table>