<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_siswa extends CI_Model
{

	function base_biodata($sess)
	{
		return $this->db->get_where('tbl_siswa', "no_pendaftaran='$sess'")->row();
	}
	function base_berkas($sess)
	{
		return $this->db->get_where('tbl_siswa', "no_pendaftaran='$sess'")->row();
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
				return $this->db->insert('tbl_skhun', $data);
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