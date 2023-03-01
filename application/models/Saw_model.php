<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Saw_model extends CI_Model
{
    public function get_kriteria()
    {
        $query = $this->db->query("SELECT * FROM saw_kriteria");
        return $query->result_array();
    }
    public function get_sub_kriteria()
    {
        $query = $this->db->query("SELECT * FROM saw_sub_kriteria");
        return $query->result_array();
    }

    public function get_laptop()
    {
        $query = $this->db->query("SELECT * FROM saw_laptop");
        return $query->result_array();
    }

    public function get_riwayat()
    {
        $query = $this->db->query("SELECT * FROM saw_hasil");
        return $query->result_array();
    }

    function tambah_kriteria()
    {
        $data = [
            'nama_kriteria' => htmlspecialchars($this->input->post('nama_kriteria', true)),
            'penjelasan_kriteria' => htmlspecialchars($this->input->post('penjelasan_kriteria', true)),
            'bobot_kriteria' => htmlspecialchars($this->input->post('bobot_kriteria', true)),
            'kategori_bobot' => htmlspecialchars($this->input->post('kategori_bobot', true)),
        ];
        $this->db->insert('saw_kriteria', $data);
    }
    function tambah_sub_kriteria()
    {
        $data = [
            'nama_kriteria' => htmlspecialchars($this->input->post('nama_kriteria', true)),
            'bobot_1' => htmlspecialchars($this->input->post('bobot_1', true)),
            'bobot_2' => htmlspecialchars($this->input->post('bobot_2', true)),
            'bobot_3' => htmlspecialchars($this->input->post('bobot_3', true)),
            'bobot_4' => htmlspecialchars($this->input->post('bobot_4', true)),
            'bobot_5' => htmlspecialchars($this->input->post('bobot_5', true)),

        ];
        $this->db->insert('saw_sub_kriteria', $data);
    }

    function update_sub_kriteria($id,$nama_kriteria,$bobot_1,$bobot_2,$bobot_3,$bobot_4,$bobot_5){
		$hsl=$this->db->query("UPDATE saw_sub_kriteria SET nama_kriteria='$nama_kriteria',bobot_1='$bobot_1',bobot_2='$bobot_2',bobot_3='$bobot_3',bobot_4='$bobot_4',bobot_5='$bobot_5' WHERE id='$id'");
		return $hsl;
	}

    function update_kriteria($id_kriteria,$nama_kriteria,$penjelasan_kriteria,$bobot_kriteria,$kategori_bobot){
		$hsl=$this->db->query("UPDATE saw_kriteria SET nama_kriteria='$nama_kriteria',penjelasan_kriteria='$penjelasan_kriteria',bobot_kriteria='$bobot_kriteria',kategori_bobot='$kategori_bobot' WHERE id='$id_kriteria'");
		return $hsl;
	}

    function tambah_laptop()
    {
        $data = [
            'nama_laptop' => htmlspecialchars($this->input->post('nama_laptop', true)),
        ];
        $this->db->insert('saw_laptop', $data);
    }

    function tambah_hasil()
    {
        $data = [
            'tanggal_penghitungan' => date('Y-m-d'),
            'laptop_terpilih' => htmlspecialchars($this->input->post('laptop_terpilih', true)),
        ];
        $this->db->insert('saw_hasil', $data);
    }

    public function hapus_laptop($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('saw_laptop');
    }
    public function hapus_kriteria($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('saw_kriteria');
    }
    public function hapus_sub_kriteria($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('saw_sub_kriteria');
    }
    public function hapus_riwayat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('saw_hasil');
    }
}
