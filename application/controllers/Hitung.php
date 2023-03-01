<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hitung extends CI_Controller
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
        $data['sub_kriteria'] = $this->Saw_model->get_sub_kriteria();
        $data['laptop'] = $this->Saw_model->get_laptop();
        
        $this->load->view('hitung', $data);
    }

    public function tambah_sub_kriteria()
    {
        $this->form_validation->set_rules('nama_kriteria', 'nama_kriteria', 'required');
        $this->form_validation->set_rules('bobot_1', 'bobot_1', 'required');
        $this->form_validation->set_rules('bobot_2', 'bobot_2', 'required');
        $this->form_validation->set_rules('bobot_3', 'bobot_3', 'required');
        $this->form_validation->set_rules('bobot_4', 'bobot_4', 'required');
        $this->form_validation->set_rules('bobot_5', 'bobot_5', 'required');


        if ($this->form_validation->run() == FALSE) {
            redirect('hitung');
        } else {
            $this->Saw_model->tambah_sub_kriteria();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menambah Sub Kriteria
          </div>');
            redirect('hitung');
        }
    }

    function update_sub_kriteria(){
        $id=$this->input->post('id');
        $nama_kriteria=strip_tags($this->input->post('nama_kriteria'));
        $bobot_1=strip_tags($this->input->post('bobot_1'));
        $bobot_2=strip_tags($this->input->post('bobot_2'));
        $bobot_3=strip_tags($this->input->post('bobot_3'));
        $bobot_4=strip_tags($this->input->post('bobot_4'));
        $bobot_5=strip_tags($this->input->post('bobot_5')); 
		$this->Saw_model->update_sub_kriteria($id,$nama_kriteria,$bobot_1,$bobot_2,$bobot_3,$bobot_4,$bobot_5);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Mengubah Sub Kriteria
          </div>');
            redirect('hitung');      
    }

    public function hapus_sub_kriteria($id)
    {
        $this->Saw_model->hapus_sub_kriteria($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Sukses Hapus Data Sub Kriteria
       </div>');
        redirect('hitung');
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
