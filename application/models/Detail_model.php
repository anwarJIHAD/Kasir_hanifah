<?php
defined('BASEPATH') or exit('No direct script access 
allowed');
class Detail_model extends CI_Model
{
    public $table = 'detail_transaksi';
    public $id = 'detail_transaksi.id_detail_transaksi';
    public function __construct()
    {
        parent::__construct();
    }
    public function get($id)
    {
        $this->db->select('d.*,s.nama as nama_sales, b.harga as harga, b.nama_barang as barang');
        $this->db->from('detail_transaksi d');
        $this->db->join('transaksi t', 'd.id_transaksi = t.id_transaksi');
        $this->db->join('sales s', 'd.id_sales = s.id_sales');
        $this->db->join('barang b', 'd.id_barang = b.id_barang');
        $this->db->where('d.id_transaksi', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_detail_transaksi', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getSales($id)
    {

        $this->db->select('d.*, s.nama as nama_sales');
        $this->db->from('transaksi d');
        $this->db->join('sales s', 'd.id_sales = s.id_sales');
        $this->db->where('id_transaksi', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    // public function getTgl($id)
    // {

    //     $this->db->select('d.*, t.tgl_peminjaman as pinjam');
    //     $this->db->from('detail_transaksi d');
    //     $this->db->join('transaksi t', 'd.id_transaksi = t.id_transaksi');
    //     $this->db->where('id_transaksi', $id);
    //     $query = $this->db->get();
    //     return $query->row_array();
    // }
    public function id_barang($id)
    {
        $this->db->select('d.*,b.nama_barang as nama_barang');
        $this->db->from('detail_transaksi d');
        $this->db->join('barang b', 'd.id_barang = b.id_barang');
        $this->db->where('d.id_detail_transaksi', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function datasales()
    {
        $this->db->select('d.*,b.nama_barang as nama_barang,b.harga,t.tgl_peminjaman as tgl_pinjam,t.tgl_pengembalian as tgl_kembali,t.total_harga_peminjaman,t.total_harga_pengembalian,');
        $this->db->from('detail_transaksi d');
        $this->db->join('barang b', 'd.id_barang = b.id_barang');
        $this->db->join('transaksi t', 'd.id_transaksi = t.id_transaksi');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function tpinjamb()
    {
        return $this->db->query("SELECT sum(jlh_pinjam) AS total from detail_transaksi");
    }
    public function tkembalib()
    {
        return $this->db->query("SELECT sum(jlh_kembali) AS total from detail_transaksi");
    }
    public function thpinjam()
    {
        return $this->db->query("SELECT sum(total_harga_pinjam) AS total from detail_transaksi");
    }
    public function thkembali()
    {
        return $this->db->query("SELECT sum(total_harga_kembali) AS total from detail_transaksi");
    }
    function charts()
    {
        $this->db->select('d.*, s.nama_barang as barang, sum(d.jlh_pinjam) as jum');
        $this->db->from('detail_transaksi d');
        $this->db->join('barang s', 'd.id_barang = s.id_barang');
        $this->db->group_by('d.id_barang');
        $query = $this->db->get();
        return $query->result_array();
    }
}
