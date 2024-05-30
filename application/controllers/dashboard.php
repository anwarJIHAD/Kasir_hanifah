<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        is_logged_in();
        $this->load->model("Transaksi_model");
        $this->load->model("Sales_model");
        $this->load->model("Detail_model");
        $this->load->model("Barang_model");
    }

    public function index()
    {
        $data['judul'] = "Dashboard";
        $data['sales'] = $this->Sales_model->get2();
        $data['jtransaksi'] = $this->Transaksi_model->jtransaksi();
        $data['tkembali'] = $this->Transaksi_model->tkembali();
        $data['tbarang'] = $this->Barang_model->tbarang();
        $data['tpinjam'] = $this->Detail_model->tpinjamb()->result();
        $data['jkembali'] = $this->Detail_model->tkembalib()->result();
        $data['thpinjam'] = $this->Detail_model->thpinjam()->result();
        $data['thkembali'] = $this->Detail_model->thkembali()->result();
        $data['totalb'] = $this->Detail_model->charts();
        $data['tsales'] = $this->Sales_model->tsales();
        $data['user'] = $this->db->get_where('sales', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $data['role'] = $this->db->get_where('user', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/vw_dashboard', $data);
        $this->load->view('layout/footer', $data);
    }
}
