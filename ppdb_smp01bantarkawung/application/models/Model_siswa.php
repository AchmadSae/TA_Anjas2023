<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_siswa extends CI_Model
{

	function base_biodata($sess)
	{
		return $this->db->get_where('tbl_siswa', "no_pendaftaran='$sess'")->row();
	}

	function base_tglCetak()
	{
		$this->db->select('tgl_siswa');
		$this->db->from('tbl_siswa');
		$this->db->order_by('tgl_siswa', 'desc');
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$row = $query->row();
			$tgl_siswa = $row->tgl_siswa;

			if (!empty($tgl_siswa)) {
				$thn_ppdb = date('Y', strtotime($tgl_siswa));
				return $thn_ppdb;
			}
		}

		return null;
	}

	function base_cetak($field, $param)
	{
		$query = "SELECT * FROM tbl_siswa WHERE $field='$param'";
		$res = $this->db->query($query);
		return $res->result();
	}
	function base_custom_cetak($field, $param, $values)
	{
		$query = "SELECT * FROM tbl_siswa WHERE $field $param ?";
		$res = $this->db->query($query, array($values));
		if ($res) {
			// Pastikan query berhasil
			return $res->result(); // Menggunakan result() untuk mendapatkan semua hasil
		} else {
			// Penanganan kesalahan
			return false;
		}
	}


	function base_berkas($sess)
	{
		$this->db->select('siswa.no_pendaftaran, siswa.nisn, siswa.rata_raport, siswa.rata_skhun, siswa.nama_lengkap, siswa.no_kk, keluarga.file_kk, keluarga.file_akte, skhun.no_skhun, skhun.file_skhun, prestasi.prestasi, prestasi.tingkat, prestasi.file_sertifikat');
		$this->db->from('tbl_siswa as siswa');
		$this->db->join('tbl_keluarga as keluarga', 'siswa.no_pendaftaran = keluarga.no_pendaftaran', 'left');
		$this->db->join('tbl_skhun as skhun', 'siswa.no_pendaftaran = skhun.no_pendaftaran', 'left');
		$this->db->join('tbl_prestasi as prestasi', 'siswa.no_pendaftaran = prestasi.no_pendaftaran', 'left');
		$this->db->where('siswa.no_pendaftaran', $sess);

		return $this->db->get()->row();

	}
	function hapus_berkas($no_pendaftaran)
	{
		$this->db->where('no_pendaftaran', $no_pendaftaran);
		$this->db->delete('tbl_skhun');

		$this->db->where('no_pendaftaran', $no_pendaftaran);
		$this->db->delete('tbl_keluarga');

		$this->db->where('no_pendaftaran', $no_pendaftaran);
		$this->db->delete('tbl_prestasi');


		return true;

	}


	function upload_berkas($menu = '', $data = '')
	{
		switch ($menu) {
			case 'skhun':
				$data = array(
					'no_skhun' => $data['no_skhun'],
					'no_pendaftaran' => $data['no_pendaftaran'],
					'nama' => $data['nama_siswa'],
					'file_skhun' => $data['file_skhun'],
					'file_raport' => $data['file_raport'],
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s')
				);

				// Menyiapkan query SQL
				$sql = "
					INSERT INTO tbl_skhun (
						no_skhun, 
						no_pendaftaran, 
						nama, 
						file_skhun, 
						file_raport, 
						created_at, 
						updated_at
					) VALUES (
						?, ?, ?, ?, ?, ?, ?
					)
					ON DUPLICATE KEY UPDATE 
						no_skhun = VALUES(no_skhun),
						no_pendaftaran = VALUES(no_pendaftaran),
						nama = VALUES(nama),
						file_skhun = VALUES(file_skhun),
						file_raport = VALUES(file_raport),
						created_at = VALUES(created_at),
						updated_at = VALUES(updated_at);
				";

				// Eksekusi query dengan menggunakan parameter
				return $this->db->query(
					$sql,
					array(
						$data['no_skhun'],
						$data['no_pendaftaran'],
						$data['nama'],
						$data['file_skhun'],
						$data['file_raport'],
						$data['created_at'],
						$data['updated_at']
					)
				);
				break;

			case 'keluarga':
				$data = array(
					'no_kk' => $data['no_kk'],
					'no_pendaftaran' => $data['no_pendaftaran'],
					'nama_siswa' => $data['nama_siswa'],
					'file_kk' => $data['file_kk'],
					'file_akte' => $data['file_akte'],
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s')
				);
				return $this->db->insert('tbl_keluarga', $data);
				break;
			case 'prestasi':
				$data = array(
					'no_pendaftaran' => $data['no_pendaftaran'],
					'file_sertifikat' => $data['file_sertifikat'],
					'prestasi' => $data['prestasi'],
					'tingkat' => $data['tingkat'],
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s')
				);
				return $this->db->insert('tbl_prestasi', $data);
				break;
			default:
				# code...
				break;
		}
	}

	function get_fy()
	{
		return $this->db->get_where('tbl_web', "id_web=1")->row()->tapel;
	}

	function get_print($menu = '', $data = '')
	{
		switch ($menu) {
			case 'passed':
				return $this->db->like('tgl_siswa', date('Y'), 'after')->get_where('tbl_siswa', "no_pendaftaran='$data'")->row();
				break;

			case 'announcement':
				return $this->db->get_where('tbl_pengumuman', "id_pengumuman='1'")->row();
				break;

			default:
				# code...
				break;
		}
	}

	function get_val($type, $sess, $subject)
	{
		switch ($type) {
			default:
				# code...
				break;
		}
	}

	function statistik_data()
	{
	}
}