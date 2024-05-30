<?php
defined('BASEPATH') or exit('No direct script access 
allowed');
class Transaksi_model extends CI_Model
{
    public $table = 'transaksi';
    public $id = 'transaksi.id_transaksi';
    public function __construct()
    {
        parent::__construct();
    }
    public function get($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_sales', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getid($id)
    {
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
        $this->db->where('id_transaksi', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function jtransaksi()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function tkembali()
    {
        $this->db->from($this->table);
        $this->db->where('tgl_pengembalian !=', NULL);
        $query = $this->db->get();

        return $query->num_rows();
    }
}
