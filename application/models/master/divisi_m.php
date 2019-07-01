<?php

class Divisi_m extends CI_Model{
	private $table_name = 't_divisi';
	private $table_pk = 'id_divisi';
	private $table_status = 't_divisi.active';

	public function __construct(){
		parent::__construct();
	}

	public function get_all($paging=true,$start=0,$limit=10){
		$this->db->select('id_divisi,nama_divisi,created_date,created_user,active');
		$this->db->from($this->table_name);
		$this->db->where($this->table_status,'1');
		if($paging==true){
			$this->db->limit($limit,$start);
		}
		return $this->db->get();
	}

	public function get_by_id($id_divisi){
		$this->db->select('id_divisi,nama_divisi,created_date,created_user,active');
		$this->db->from($this->table_name);
		$this->db->where($this->table_pk,$id_divisi);
		$this->db->where($this->table_status,'1');
		return $this->db->get();
	}

	public function save($data_divisi){
		$this->db->insert($this->table_name,$data_divisi);
	}

	public function update($id_divisi,$data_divisi){
		$this->db->where($this->table_pk,$id_divisi);
		$this->db->update($this->table_name,$data_divisi);
	}

	public function delete($id_divisi){
		$this->db->where($this->table_pk,$id_divisi);
		$this->db->delete($this->table_name);
	}
}