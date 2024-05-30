<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi2 extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        $this->load->model("Detail_model");
        $this->load->model("Barang_model");
        $this->load->model("Transaksi_model");
    }

    public function detail($id)
    {
        $data['judul'] = "tambah barang yang mau di pinjam";
        $data['transaksi2'] = $this->Detail_model->get($id);
        $data['barang'] = $this->Barang_model->get();
        $data['id_transaksi'] = $this->Transaksi_model->getById($id);
        $data['sales'] = $this->Detail_model->getSales($id);
        $data['tgl'] = $this->Transaksi_model->getById($id);
        $data['edtran'] = $this->Detail_model->getById($id);
        $data['user'] = $this->db->get_where('sales', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $data['role'] = $this->db->get_where('user', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('transaksi/vw_detail_transaksi', $data);
        $this->load->view('layout/footer', $data);
    }
    public function report($id)
    {
        $data['judul'] = "Laporan Peminjaman Barang Berdasarkan Sales";
        $data['transaksi2'] = $this->Detail_model->get($id);
        $data['barang'] = $this->Barang_model->get();
        $data['id_transaksi'] = $this->Transaksi_model->getById($id);
        $data['sales'] = $this->Detail_model->getSales($id);
        $data['tgl'] = $this->Transaksi_model->getById($id);
        $data['edtran'] = $this->Detail_model->getById($id);
        $data['user'] = $this->db->get_where('sales', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $data['role'] = $this->db->get_where('user', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('transaksi/vw_detail_transaksi', $data);
        $this->load->view('layout/footer', $data);
    }
    public function upload()
    {
        $id = $this->input->post('barang');
        $jlh = $this->input->post('jlh_pinjam');

        $harga = $this->Barang_model->getHarga($id);
        $total = $jlh * (int)$harga['harga'];

        $data = [
            'id_sales' => $this->input->post('id_sales'),
            'id_barang' => $this->input->post('barang'),
            'id_transaksi' => $this->input->post('id_transaksi'),
            'jlh_pinjam' => $this->input->post('jlh_pinjam'),
            'total_harga_pinjam' => $total,
        ];


        $this->Detail_model->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
        role="alert">Data Transaksi Berhasil Ditambah!</div>');

        redirect('Transaksi2/detail/' . $data['id_transaksi']);
    }
    public function hapus($id)
    {
        $dad = $this->input->post('id_transaksi');
        $this->Detail_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-info-circle"></i>Data Transaksi berhasil di hapus!</div>');
        redirect('Transaksi2/detail/' . $dad);
    }
    public function edit()
    {
        $data['judul'] = "Halaman Edit detail transaksi";
        $data['user'] = $this->db->get_where('sales', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $data['role'] = $this->db->get_where('user', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $id = $this->input->post('id_detail_transaksi');
        $idt = $this->input->post('id_transaksi');
        $it = $this->input->post('barang');
        $jlh = $this->input->post('jlh_pinjam');
        $harga = $this->Barang_model->getHarga($it);
        $total = $jlh * (int)$harga['harga'];

        $data = [
            'id_barang' => $this->input->post('barang'),
            'jlh_pinjam' => $jlh,
            'total_harga_pinjam' => $total,
        ];


        $this->Detail_model->update(['id_detail_transaksi' => $id], $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Detail Transaksi Berhasil Diubah!</div>');
        redirect('Transaksi2/detail/' . $idt);
    }
}
