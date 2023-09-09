<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{

	public function index()
	{
		$data['web_ppdb'] = $this->web->web_utama();
		$this->load->view('web/index', $data);
	}

	public function idbaru($value = '')
	{
		echo $this->web->pendaftaran('id_baru');
	}

	public function pendaftaran()
	{
		$data = array(
			'id_daftar' => $this->web->pendaftaran('id_baru'),
			'web_ppdb' => $this->web->pendaftaran('status_ppdb'),
			'v_pdd' => $this->web->pendaftaran('v_pdd'),
			'v_penghasilan' => $this->web->pendaftaran('v_penghasilan'),
			'v_pekerjaan_ayah' => $this->web->pendaftaran('v_pekerjaan_ayah'),
			'v_komp' => $this->web->pendaftaran('v_komp'),
			'v_pekerjaan_ibu' => $this->web->pendaftaran('v_pekerjaan_ibu'),
			'v_pekerjaan_wali' => $this->web->pendaftaran('v_pekerjaan_wali'),
			'nisn' => $this->web->pendaftaran('nisn')
		);

		if ($data['web_ppdb']->status_ppdb == 'tutup') {
			redirect('404');
		}

		$this->load->view('web/pendaftaran', $data);

		if (isset($_POST['btndaftar'])) {
			// var_dump($this->input->post()); exit();
			$acts = $this->web->pendaftaran('daftar', $this->input);
			$nisn = $data['nisn']->nisn;
			// Di controller Anda
			$upload_config = array(
				'upload_path' => FCPATH . 'uploads/' . $nisn . '/',
				'allowed_types' => 'gif|jpg|jpeg|png',
				'max_size' => 2048,
				'file_name' => $nisn . '.png'
			);

			$this->load->model('Pendaftaran_model');
			$upload_result = $this->Pendaftaran_model->pendaftaran('daftar', $this->input->post(), $upload_config);

			if ($upload_result === true) {
				// File berhasil diunggah dan data disimpan ke database
				$this->session->set_flashdata('msg', 'File berhasil diunggah dan data disimpan.');
				redirect('panel_siswa');
			} else {
				// Ada kesalahan dalam unggah file
				$this->session->set_userdata('no_pendaftaran', $this->input->post('nis'));
				$this->session->set_flashdata('msg', $upload_result['error']);
				redirect('pendaftaran');
			}
		}
	}

	public function logcs()
	{
		$data['web_ppdb'] = $this->web->pendaftaran('status_ppdb');
		if ($data['web_ppdb']->status_ppdb == 'tutup') {
			redirect('404');
		}

		if ($this->session->userdata('no_pendaftaran') != NULL) {
			redirect('panel_siswa');
		} else {
			$this->load->view('web/index', $data);

			if (isset($_POST['btnlogin'])) {
				$send = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				);
				$auth = $this->web->auth('cek-masuk', $send);

				if ($auth['sum'] == 0) {
					$this->session->set_flashdata('msg', $this->err->wrong_auth());
					redirect('logcs');
				} else {
					$this->session->set_userdata('no_pendaftaran', $auth['res']->no_pendaftaran);
					redirect('panel_siswa');
				}
			}
		}
	}

	public function cari()
	{
		$data['siswa'] = $this->SiswaModel->view();
		$this->load->view('web/cari', $data);
	}


	function error_not_found()
	{
		$this->load->view('404_content');
	}
}