<?php

class Databarang extends CI_Controller
{
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') != '1'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda belum login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('auth/login');
        }
    }

    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/databarang', $data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahaksi()
    {
        $nama_brg = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategory = $this->input->post('kategory');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './upload';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar gagal diupload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $data = array(
            'nama_brg' => $nama_brg,
            'keterangan' => $keterangan,
            'kategory' => $kategory,
            'harga' => $harga,
            'stok' => $stok,
            'gambar' => $gambar
        );
        $this->model_barang->tambah_barang($data, 'tb_barang');
        redirect('admin/databarang/index');
    }
    public function edit($id){
        $where = array('id_brg' => $id);
        $data['barang'] = $this->model_barang->editbarang($where, 'tb_barang')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/editbarang', $data);
        $this->load->view('templates_admin/footer');
    }
    public function update(){
        $id = $this->input->post('id_brg');
        $nama_brg = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategory');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');

        $data = array(
            'nama_brg' => $nama_brg,
            'keterangan' => $keterangan,
            'kategory' => $kategori,
            'harga' => $harga,
            'stok' => $stok
        );
        $where = array(
            'id_brg' => $id
        );
        $this->model_barang->update_data($where,$data,'tb_barang');
        redirect('admin/databarang/index');
    }
    public function hapus($id){
        $where = array('id_brg' => $id);
        $this->model_barang->hapusdata($where, 'tb_barang');
        redirect('admin/databarang/index');
    }
}
