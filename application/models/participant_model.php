<?php

class Participant_model extends CI_Model{
	private $table_name = 't_dummy2';
	private $table_pk = 'username';
	private $table_status = 't_dummy2.active';

	public function __construct(){
		parent::__construct();
	}

	public function get_keuangan($username){ //b
		$this->db->select('*');
		$this->db->from('t_dummy');
		$this->db->where('t_dummy.username',$username);
		$this->db->where('t_dummy.active','1');
		return $this->db->get();
	}
	// tes dummy
	public function save_keuangan($data_participant){ //save data upload keuangan
		$this->db->insert('t_dummy',$data_participant);
	}
	public function update_keuangan($username,$data_user){
		$this->db->where($this->table_pk,$username);
		$this->db->update('t_dummy',$data_user);
	}
	public function save_akademik($data_participant){ //save data upload akademik
		$this->db->insert('t_dummy2',$data_participant);
	}
	public function update_akademik($username,$data_user){
		$this->db->where($this->table_pk,$username);
		$this->db->update('t_dummy2',$data_user);
	}

	public function get_peserta($username){ //b
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->where($this->table_pk,$username);
		$this->db->where($this->table_status,'1');
		return $this->db->get();
	}

	public function save_peserta($data_peserta){ //b
		$this->db->insert($this->table_name,$data_peserta);
	}

	public function update($username,$data_user){
		$this->db->where($this->table_pk,$username);
		$this->db->update($this->table_name,$data_user);
	}

	public function get_beasiswa_peserta($username){
		$this->db->select('	username,
							t_keuangan.*'
						);
		// inomor_induk,id_atasan,tanggal_absen,nama_alasan,keterangan,approval_atasan');
		$this->db->from($this->table_name);
		$this->db->join('t_keuangan','t_keuangan.no_ijazah_universitas_s1 = '.$this->table_name.'.no_ijazah_universitas_s1');
		return $this->db->get();
	}

    public function search($keyword,$paging=true,$start=0,$limit=10){
        $this->db->select('*');
		$this->db->from($this->table_name);
		// $this->db->join($this->table_uc,$this->table_name.'.id_jabatan = '.$this->table_uc.'.'.$this->table_uc_pk,'INNER');
		$this->db->where('nama_lengkap LIKE "%'.$keyword.'%"');
		$this->db->where($this->table_status,'1');
		if($paging==true){
			$this->db->limit($limit,$start);
		}
		return $this->db->get();
    }

    // Jumlah pserta dan dll
    public function get_count($keyword){
    	$this->db->select('*');
    	$this->db->from('t_peserta');
    	$this->db->where('t_peserta.active','1');
		return $this->db->get();
    }
    public function get_counts(){
    	$this->db->select('*');
    	$this->db->from('t_peserta');
    	$this->db->where('t_peserta.active','1');
		return $this->db->get();
    }

    public function get_diterima($keyword){
    	$this->db->select('*');
    	$this->db->from('t_peserta');
    	$this->db->where('t_peserta.terima','1');
    	$this->db->where('t_peserta.active','1');
		return $this->db->get();
    }

    public function get_ditolak($keyword){
    	$this->db->select('*');
    	$this->db->from('t_peserta');
    	$this->db->where('t_peserta.terima','2');
    	$this->db->where('t_peserta.active','1');
		return $this->db->get();
    }

    public function get_uncheck($keyword){
    	$this->db->select('*');
    	$this->db->from('t_peserta');
    	$this->db->where('t_peserta.terima','0');
    	$this->db->where('t_peserta.active','1');
		return $this->db->get();
    }
}


	// public function update($username,$data_kehadiran){
	// 	$this->db->where($this->table_pk,$username);
	// 	$this->db->update($this->table_name,$username);
	// }

	// public function delete($data_user){
	// 	$this->db->update($this->table_pk,$data_user);
	// }

	// public function upload($data_user){
	// 	$this->db->update($this->table_pk,$data_user);
	// }


	// public function get_beasiswa_peserta($username){
	// 	$this->db->select($this->table_name.'.*');
	// 	$this->db->from('t_keuangan');
	// 	// $this->db->join('t_keuangan','t_keuangan.no_ijazah_universitas_s1 = '.$this->table_name.'.no_ijazah_universitas_s1');
	// 	$this->db->join($this->table_name,'t_keuangan');
	// 	// $this->db->where($this->table_name.'.no_ijazah_universitas_s1 = t_keuangan.no_ijazah_universitas_s1');
	// 	// $this->db->where($this->table_pk,$username);
	// 	// $this->db->where($this->table_status,'1');
	// 	return $this->db->get();
	// }
	// SELECT t_dummy.*,t_keuangan.* FROM t_dummy JOIN t_dummy=t_keuangan WHERE t_dummy.no_ijazah_universitas_s1=t_keuangan.no_ijazah_universitas_s1


	// public function search_user($nama_lengkap){
	// 	$this->db->select('*');
	// 	$this->db->from($this->table_name);
	// 	// $this->db->join($this->table_uc,$this->table_name.'.id_jabatan = '.$this->table_uc.'.'.$this->table_uc_pk,'INNER');
	// 	$this->db->where("nama_lengkap LIKE '%".$nama_lengkap."%'");
	// 	$this->db->where($this->table_status,'1');
	// 	return $this->db->get();
	// }

	// public function search_one($searchBook) {
	//     $select_query = "Select * from t_peserta where nama_lengkap = '.$searchBook.' ";
	//     $query = $this->db->query($select_query);
	//     return $query->result();
	// }


// 	select t_peserta.username,t_peserta.no_ijazah_universitas_s1,t_keuangan.jumlah from t_peserta JOIN t_keuangan WHERE t_peserta.no_ijazah_universitas_s1=t_keuangan.no_ijazah_universitas_s1