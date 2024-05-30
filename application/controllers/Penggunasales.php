<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penggunasales extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        $this->load->model("Transaksi_model");
        $this->load->model("Sales_model");
        $this->load->model("Detail_model");
        $this->load->model("Barang_model");
    }

    public function index()
    {
        $data['judul'] = "Data Peminjaman";
        $data['sales'] = $this->Sales_model->get2();
        $data['user'] = $this->db->get_where('sales', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $data['role'] = $this->db->get_where('user', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('user/vw_user', $data);
        $this->load->view('layout/footer', $data);
    }

    public function transaksi1()
    {

        $data['judul'] = "Data Pengembalian";

        $data['user'] = $this->db->get_where('sales', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $data['role'] = $this->db->get_where('user', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $id = $this->db->get_where('user', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $data['transaksi'] = $this->Transaksi_model->get($id['id_sales']);
        $data['transaksi1'] = $this->Sales_model->getById($id['id_sales']);

        $this->load->view('layout/header', $data);
        $this->load->view('user/vw_user', $data);
        $this->load->view('layout/footer', $data);
    }
    public function KembaliTransaksi()
    {
        $data = [
            'tgl_pengembalian' => $this->input->post('tgl_pengembalian'),



        ];
        $it = $this->input->post('id_sales');
        $id = $this->input->post('id_transaksi');

        $this->Transaksi_model->update(['id_Transaksi' => $id], $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data sembako Berhasil Diubah!</div>');
        redirect('Kembali1/transaksi1/' . $it);
    }
    public function transaksi2($id)
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
        $this->load->view('user/vw_user2', $data);
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
    public function edit()
    {
        $data['judul'] = "Halaman Edit detail transaksi";
        $id = $this->input->post('id_detail_transaksi');
        $idt = $this->input->post('id_transaksi');
        $it = $this->input->post('barang');
        $jlh = $this->input->post('jlh_kembali');
        $harga = $this->Barang_model->getHarga($it);
        $total = $jlh * (int)$harga['harga'];

        $data = [
            'id_barang' => $this->input->post('barang'),
            'jlh_kembali' => $jlh,
            'total_harga_kembali' => $total,
        ];


        $this->Detail_model->update(['id_detail_transaksi' => $id], $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Detail Transaksi Berhasil Diubah!</div>');
        redirect('Kembali1/transaksi2/' . $idt);
    }
}
