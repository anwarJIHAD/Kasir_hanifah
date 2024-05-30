<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi1 extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        $this->load->model("Transaksi_model");
        $this->load->model("Sales_model");
    }


    public function detail($id)
    {
        $data['judul'] = "Daftar Transaksi";
        $data['transaksi'] = $this->Transaksi_model->get($id);
        $data['transaksi1'] = $this->Sales_model->getById($id);
        $data['user'] = $this->db->get_where('sales', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $data['role'] = $this->db->get_where('user', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('transaksi/vw_transaksi1', $data);
        $this->load->view('layout/footer', $data);
    }
    public function upload()
    {
        $data = [
            'id_sales' => $this->input->post('id_sales'),
            'tgl_peminjaman' => $this->input->post('tgl_peminjaman'),
        ];


        $this->Transaksi_model->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
        role="alert">Data Transaksi Berhasil Ditambah!</div>');
        redirect('Transaksi1/detail/' . $data['id_sales']);
    }
    public function hapus($id)
    {
        $this->Transaksi_model->delete($id);
        // $this->Session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-info-circle"></i>Data Transaksi berhasil di hapus!</div>');
        redirect('Transaksi');
    }
    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Transaksi";
        $data['Transaksi'] = $this->Transaksi_model->getById($id);


        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required', [
            'required' => 'Nama Transaksi Wajib di isi'
        ]);
        $this->form_validation->set_rules('harga', 'harga', 'required', [
            'required' => 'harga Transaksi  Wajib di isi'
        ]);
        $this->form_validation->set_rules('satuan', 'satuan', 'required', [
            'required' => 'satuan Transaksi Wajib di isi'
        ]);
        $this->form_validation->set_rules('gambar', 'gambar', 'required', [
            'required' => 'gambar Transaksi  Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("Transaksi/vw_edit_Transaksi", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama_Transaksi' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
                'satuan' => $this->input->post('satuan'),

            ];

            $id = $this->input->post('id');
            $this->Transaksi_model->update(['id_Transaksi' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data sembako Berhasil Diubah!</div>');
            redirect('Transaksi');
        }
    }
}
