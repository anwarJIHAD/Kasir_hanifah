<?php
defined('BASEPATH') or exit('No direct script access 
allowed');
class Sales_model extends CI_Model
{
    public $table = 'sales';
    public $id = 'sales.id_sales';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get2()
    {
        $this->db->select('s.*,u.username,u.id,u.password,COUNT(t.id_transaksi) as jumlah,COUNT(t.tgl_pengembalian) as jlh_kembali');
        $this->db->from('sales s');
        $this->db->join('transaksi t', 't.id_sales = s.id_sales', 'LEFT');
        $this->db->join('user u', 'u.id_sales = s.id_sales', 'LEFT');
        $this->db->group_by('s.id_sales');
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
        $this->db->where('id_sales', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function tsales()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }
}
