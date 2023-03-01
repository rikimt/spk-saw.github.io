<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saw extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('Saw_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Dashboard laptop';
        $data['kriteria'] = $this->Saw_model->get_kriteria();
        $data['laptop'] = $this->Saw_model->get_laptop();
        $data['riwayat'] = $this->Saw_model->get_riwayat();
        
        $this->load->view('saw', $data);
    }

    public function tambah_kriteria()
    {
        $this->form_validation->set_rules('nama_kriteria', 'nama_kriteria', 'required');
        $this->form_validation->set_rules('penjelasan_kriteria', 'penjelasan_kriteria', 'required');
        $this->form_validation->set_rules('bobot_kriteria', 'bobot_kriteria', 'required');
        $this->form_validation->set_rules('kategori_bobot', 'kategori_bobot', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('saw');
        } else {
            $this->Saw_model->tambah_kriteria();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menambah Kriteria
          </div>');
            redirect('saw');
        }
    }
    function update_kriteria(){
        $id_kriteria=$this->input->post('id');
        $nama_kriteria=strip_tags($this->input->post('nama_kriteria'));
        $penjelasan_kriteria=strip_tags($this->input->post('penjelasan_kriteria'));
        $bobot_kriteria=strip_tags($this->input->post('bobot_kriteria'));
        $kategori_bobot=strip_tags($this->input->post('kategori_bobot'));
		$this->Saw_model->update_kriteria($id_kriteria,$nama_kriteria,$penjelasan_kriteria,$bobot_kriteria,$kategori_bobot);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Mengubah Kriteria
          </div>');
            redirect('saw');      
    }

    public function tambah_laptop()
    {
        $this->form_validation->set_rules('nama_laptop', 'nama_laptop', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'SAW';
            $this->load->view('saw/tambah_laptop', $data);
        } else {
            $this->Saw_model->tambah_laptop();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menambah Laptop
          </div>');
            redirect('saw');
        }
    }

    public function hapus_laptop($id)
    {
        $this->Saw_model->hapus_laptop($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Sukses Hapus Data laptop
       </div>');
        redirect('saw');
    }
    public function hapus_kriteria($id)
    {
        $this->Saw_model->hapus_kriteria($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Sukses Hapus Data Kriteria
       </div>');
        redirect('saw');
    }
    public function hapus_riwayat($id)
    {
        $this->Saw_model->hapus_riwayat($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Sukses Hapus Riwayat
       </div>');
        redirect('saw');
    }

    public function hitung()
    {
        $data['title'] = 'SAW';
        $data['kriteria'] = $this->Saw_model->get_kriteria();
        $data['laptop'] = $this->Saw_model->get_laptop();

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/side');
        $this->load->view('admin/layout/side-header');
        $this->load->view('admin/saw/hitung');
        $this->load->view('admin/layout/footer');
    }

    public function simpan_hasil()
    {
        $this->form_validation->set_rules('laptop_terpilih', 'laptop_terpilih', 'required');
        if ($this->form_validation->run() != FALSE) {
            $this->Saw_model->tambah_hasil();
        }
    }
}
