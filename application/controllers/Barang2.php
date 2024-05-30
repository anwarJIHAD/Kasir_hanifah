<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang2 extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        is_logged_in2();
        $this->load->model("Barang_model");
        $this->load->model("Sales_model");
    }

    public function index()
    {
        $data['judul'] = "Halaman Barang";
        $data['barang'] = $this->Barang_model->get();
        $data['user'] = $this->db->get_where('sales', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $data['role'] = $this->db->get_where('user', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('barang2/vw_barang', $data);
        $this->load->view('layout/footer', $data);
    }
    public function upload()
    {
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'harga' => $this->input->post('harga'),
            'satuan' => $this->input->post('satuan'),
        ];

        $upload_image = $_FILES['gambar']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/dist/barang/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->Barang_model->insert($data, $upload_image);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
        role="alert">Data Barang Berhasil Ditambah!</div>');
        redirect('Barang');
    }
    public function hapus($id)
    {
        $this->Barang_model->delete($id);
        $eror = $this->db->error();
        if ($eror['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-info-circle"></i>Data Barang Sedang Digunakan, tidak bisa dihapus!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fas fa-info-circle"></i>Data Barang berhasil di hapus!</div>');
        }
        redirect('Barang');
    }
    public function edit($id)
    {
        $data['judul'] = "Halaman Edit barang";
        $data['barang'] = $this->Barang_model->getById($id);


        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required', [
            'required' => 'Nama barang Wajib di isi'
        ]);
        $this->form_validation->set_rules('harga', 'harga', 'required', [
            'required' => 'harga barang  Wajib di isi'
        ]);
        $this->form_validation->set_rules('satuan', 'satuan', 'required', [
            'required' => 'satuan Barang Wajib di isi'
        ]);
        $data['user'] = $this->db->get_where('sales', ['id_sales' => $this->session->userdata('id_sales')])->row_array();
        $data['role'] = $this->db->get_where('user', ['id_sales' => $this->session->userdata('id_sales')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("barang/vw_edit_barang", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama_barang' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
                'satuan' => $this->input->post('satuan'),

            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/dist/barang/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['barang']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/dist/barang/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->Barang_model->update(['id_barang' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Barang Berhasil Diubah!</div>');
            redirect('Barang');
        }
    }
}
