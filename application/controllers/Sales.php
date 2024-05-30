<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        $this->load->model("Sales_model");
        $this->load->model("User_model");
    }

    public function index()
    {
        $data['judul'] = "Halaman Sales";
        $data['sales'] = $this->Sales_model->get2();
        $data['user'] = $this->db->get_where('sales', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $data['role'] = $this->db->get_where('user', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('sales/vw_sales', $data);
        $this->load->view('layout/footer', $data);
    }
    public function upload()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
        ];
        $this->Sales_model->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
        role="alert">Data Sales Berhasil Ditambah!</div>');
        redirect('Sales');
    }
    public function hapus($id)
    {
        $this->Sales_model->delete($id);
        $eror = $this->db->error();
        if ($eror['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data Sales Sedang Digunakan, tidak bisa dihapus!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-info-circle"></i>Data Sales berhasil di hapus!</div>');
        }
        redirect('Sales');
    }
    public function edit()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
        ];
        $id = $this->input->post('id');
        $this->Sales_model->update(['id_sales' => $id], $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data sembako Berhasil Diubah!</div>');
        redirect('Sales');
    }
    public function adduser()
    {
        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'id_sales' => $this->input->post('id_sales'),
            'date_created' => date('Y-m-d H:i:s'),
        ];
        $this->User_model->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
        role=" alert">Akun Sales Berhasil Ditambah!</div>');
        redirect('Sales');
    }
}
