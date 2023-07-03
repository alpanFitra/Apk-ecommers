<?php

class Model_kategori extends CI_Model{
    public function data_elektronik(){
        return $this->db->get_where("tb_barang",array('kategory' => 'elektronik'));
    }

    public function data_fashion_pria(){
        return $this->db->get_where("tb_barang",array('kategory' => 'fashion pria'));
    }
    public function data_fashion_wanita(){
        return $this->db->get_where("tb_barang",array('kategory' => 'fashion wanita'));
    }
    public function data_fashion_anak(){
        return $this->db->get_where("tb_barang",array('kategory' => 'fashion anak'));
    }
    public function data_kecantikan(){
        return $this->db->get_where("tb_barang",array('kategory' => 'kecantikan'));
    }
}