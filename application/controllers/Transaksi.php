<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        $this->load->model("Transaksi_model");
        $this->load->model("Sales_model");
    }

    public function index()
    {
        $data['judul'] = "Daftar Transaksi";
        $data['sales'] = $this->Sales_model->get2();
        $data['user'] = $this->db->get_where('sales', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $data['role'] = $this->db->get_where('user', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('transaksi/vw_transaksi_', $data);
        $this->load->view('layout/footer', $data);
    }
}
