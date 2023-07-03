<?php

class Dashboard extends CI_Controller
{
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

    public function tambahkeranjang($id){
        $barang = $this->model_barang->find($id);
        $data = array(
            'id' => $barang->id_brg,
            'qty' => 1,
            'price' => $barang->harga,
            'name' => $barang->nama_brg 
        );
        $this->cart->insert($data);
        redirect('Welcome');
    }
    public function detailkeranjang(){
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }
    public function hapuskeranjang(){
        $this->cart->destroy();
        redirect('Welcome');
    }
    public function pembayaran(){
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }
    public function prosespesanan(){
        $is_processed = $this->model_invoice->index();
        if($is_processed){
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('prosespesanan');
        $this->load->view('templates/footer');
        }else{
            echo "Maaf, Pesanan Anda Gagal diprose!";
        }
    }
    public function detail($id_brg){
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detailbarang', $data);
        $this->load->view('templates/footer');
    }
}
