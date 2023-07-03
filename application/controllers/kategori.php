<?php

class Kategori extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') != '2'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda belum login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('auth/login');
        }
    }
    public function elektronik(){
        $data['elektronik'] = $this->model_kategori->data_elektronik()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('elektronik', $data);
        $this->load->view('templates/footer');
    }
    public function fashion_pria(){
        $data['fashion_pria'] = $this->model_kategori->data_fashion_pria()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('fashion_pria', $data);
        $this->load->view('templates/footer');
    }
    public function fashion_wanita(){
        $data['fashion_wanita'] = $this->model_kategori->data_fashion_wanita()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('fashion_wanita', $data);
        $this->load->view('templates/footer');
    }
    public function fashion_anak(){
        $data['fashion_anak'] = $this->model_kategori->data_fashion_anak()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('fashion_anak', $data);
        $this->load->view('templates/footer');
    }
    public function kecantikan(){
        $data['kecantikan'] = $this->model_kategori->data_kecantikan()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kecantikan', $data);
        $this->load->view('templates/footer');
    }
}