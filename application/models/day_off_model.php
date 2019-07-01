<?php

class Day_off_model extends CI_Model{
	private $table_name = 't_hari_libur';
	private $table_pk = 'id_hari_libur';
	private $table_status = 'active';

	public function __construct(){
		parent::__construct();
	}

	public function get_all($paging=true,$start=0,$limit=10){
		$this->db->select('id_hari_libur,tanggal,keterangan,created_date,created_user,active');
		$this->db->from($this->table_name);
		$this->db->where($this->table_status,'1');
		if($paging==true){
			$this->db->limit($limit,$start);
		}
		return $this->db->get();
	}

	public function get_by_id($id_hari_libur){
		$this->db->select('id_hari_libur,tanggal,keterangan,created_user,active');
		$this->db->from($this->table_name);
		$this->db->where($this->table_pk,$id_hari_libur);
		$this->db->where($this->table_status,'1');
		return $this->db->get();
	}
	public function get_by_date($tanggal){
		$this->db->select('id_hari_libur,tanggal,keterangan,created_user,active');
		$this->db->from($this->table_name);
		$this->db->order_by('tanggal', 'ASC');
		return $this->db->get();
	}

	public function get_day_off(){
		$this->db->select('tanggal');
		$this->db->from('t_hari_libur');
		$this->db->where($this->table_status,'1');
		return $this->db->get();
	}

	public function get_libur($tanggal){
		$this->db->select('tanggal');
		$this->db->from($this->table_name);
		$this->db->where('tanggal',$tanggal);
	    return $this->db->get();
	}

	public function get_list_libur($tanggal){
		$this->db->select('id_hari_libur,tanggal,keterangan,created_user,active');
		$this->db->from($this->table_name);
		$this->db->where($this->table_status,'1');
		return $this->db->get();
	}

	public function role_exists()
	{	$this->db->select('tanggal');
		$this->db->from($this->table_name);
		$this->db->where('tanggal','2018-05-28');
	    $query = $this->db->get();
	    if ($query->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}

	public function save($data_hari_libur){
		$this->db->insert($this->table_name,$data_hari_libur);
	}

	public function update($id_hari_libur,$data_hari_libur){
		$this->db->where($this->table_pk,$id_hari_libur);
		$this->db->update($this->table_name,$data_hari_libur);
	}

	public function delete($id_hari_libur){
		$this->db->where($this->table_pk,$id_hari_libur);
		$this->db->delete($this->table_name);
	}
}