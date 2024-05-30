<?php
defined('BASEPATH') or exit('No direct script access 
allowed');
class User_model extends CI_Model
{
    public $table = 'user';
    public $id = 'user.id';
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
    public function get2($id)
    {
        $this->db->select('u.*,s.nama as nama_user');
        $this->db->from('user u');
        $this->db->join('sales s', 'u.id_sales = s.id_sales');
        $this->db->where('id_sales', $id);
        $query = $this->db->get();
        return $query->row_array();
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
}
