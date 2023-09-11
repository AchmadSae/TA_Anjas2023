<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panel_siswa extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('no_pendaftaran') == NULL) {
			redirect('');
		} else {
			$data = array(
				'user' => $this->siswa->base_biodata($this->session->userdata('no_pendaftaran')),
				'judul_web' => "HOME"
			);

			$this->load->view('siswa/header', $data);
			$this->load->view('siswa/dashboard', $data);
			$this->load->view('siswa/footer');
		}
	}

	public function pengumuman()
	{
		if ($this->session->userdata('no_pendaftaran') == NULL) {
			redirect('');
		} else {
			$data = array(
				'user' => $this->siswa->base_biodata($this->session->userdata('no_pendaftaran')),
				'judul_web' => "PENGUMUMAN"
			);

			$this->load->view('siswa/header', $data);
			$this->load->view('siswa/pengumuman', $data);
			$this->load->view('siswa/footer');
		}
	}

	public function biodata()
	{
		if ($this->session->userdata('no_pendaftaran') == NULL) {
			redirect('logcs');
		} else {
			$sess = $this->session->userdata('no_pendaftaran');
			$data = array(
				'user' => $this->siswa->base_biodata($sess),
				'judul_web' => "BIODATA"
			);

			$this->load->view('siswa/header', $data);
			$this->load->view('siswa/biodata', $data);
			$this->load->view('siswa/footer');
		}
	}

	public function berkas()
	{
		if ($this->session->userdata('no_pendaftaran') == NULL) {
			redirect('logcs');
		} else {

			$sess = $this->session->userdata('no_pendaftaran');
			$data = array(
				'user' => $this->siswa->base_berkas($sess),
				'judul_web' => "BERKAS"
			);
			$this->load->view('siswa/header', $data);
			$this->load->view('siswa/berkas', $data);
			$this->load->view('siswa/footer');
			// upload skhun 
			if (isset($_POST['btnSkhun'])) {
				// set name
				$no_pendaftaran = $this->session->userdata('no_pendaftaran');
				$originalFileName = $_FILES['file_skhun']['name'];
				$extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
				$newFileName = $no_pendaftaran . '_skhun.' . $extension; // Menggunakan no_pendaftaran sebagai nama file

				$originalFileName1 = $_FILES['file_raport']['name'];
				$extension1 = pathinfo($originalFileName1, PATHINFO_EXTENSION);
				$newFileName1 = $no_pendaftaran . '_raport.' . $extension1; // Menggunakan no_pendaftaran sebagai nama file

				$config['upload_path'] = FCPATH . 'public/files/skhun';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 2048;
				$config['file_name'] = $newFileName; // Menggunakan 'file_name' untuk nama file skhun
				$this->upload->initialize($config);

				if ($this->upload->do_upload('file_skhun')) {
					$dataBerkasSkhun = $newFileName;
					// Setelah berkas berhasil diunggah, ubah nama berkas di direktori
					$oldFilePath = $config['upload_path'] . $originalFileName;
					$newFilePath = $config['upload_path'] . $newFileName;
					rename($oldFilePath, $newFilePath);
				} else {
					$error = $this->upload->display_errors();
					echo $error . "gagal skhun";
				}

				$config['file_name'] = $newFileName1; // Menggunakan 'file_name' untuk nama file raport
				$this->upload->initialize($config);

				if ($this->upload->do_upload('file_raport')) {
					$dataBerkasRaport = $newFileName1;
					// Setelah berkas berhasil diunggah, ubah nama berkas di direktori
					$oldFilePath1 = $config['upload_path'] . $originalFileName1;
					$newFilePath1 = $config['upload_path'] . $newFileName1;
					rename($oldFilePath1, $newFilePath1);
				} else {
					$error = $this->upload->display_errors();
					echo $error . "gagal raport file";
				}


				$data = array(
					'no_pendaftaran' => $this->session->userdata('no_pendaftaran'),
					'no_skhun' => $this->input->post('no_skhun'),
					'nama_siswa' => $this->input->post('nama_siswa'),
					'file_skhun' => $dataBerkasSkhun,
					'file_raport' => $dataBerkasRaport
				);

				var_dump("sukses upload");
				$acts = $this->siswa->upload_berkas('skhun', $data);
				redirect('panel_siswa/berkas');
				// upload data keluarga 
			} elseif (isset($_POST['btnKeluarga'])) {
				// set name
				$no_pendaftaran = $this->session->userdata('no_pendaftaran');
				$originalFileName = $_FILES['file_kk']['name'];
				$extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
				$newFileName = $no_pendaftaran . '_kk.' . $extension; // Menggunakan no_pendaftaran sebagai nama file

				$originalFileName1 = $_FILES['file_akte']['name'];
				$extension1 = pathinfo($originalFileName1, PATHINFO_EXTENSION);
				$newFileName1 = $no_pendaftaran . '_akte.' . $extension1; // Menggunakan no_pendaftaran sebagai nama file

				$config['upload_path'] = FCPATH . 'public/files/keluarga';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 2048;
				$config['file_name'] = $newFileName; // Menggunakan 'file_name' untuk nama file skhun
				$this->upload->initialize($config);

				if ($this->upload->do_upload('file_kk')) {
					$dataBerkasKK = $newFileName;
					// Setelah berkas berhasil diunggah, ubah nama berkas di direktori
					$oldFilePath = $config['upload_path'] . $originalFileName;
					$newFilePath = $config['upload_path'] . $newFileName;
					rename($oldFilePath, $newFilePath);
				} else {
					$error = $this->upload->display_errors();
					echo $error . "gagal kk";
				}

				$config['file_name'] = $newFileName1; // Menggunakan 'file_name' untuk nama file raport
				$this->upload->initialize($config);

				if ($this->upload->do_upload('file_akte')) {
					$dataBerkasAkte = $newFileName1;
					// Setelah berkas berhasil diunggah, ubah nama berkas di direktori
					$oldFilePath1 = $config['upload_path'] . $originalFileName1;
					$newFilePath1 = $config['upload_path'] . $newFileName1;
					rename($oldFilePath1, $newFilePath1);
				} else {
					$error = $this->upload->display_errors();
					echo $error . "gagal akte";
				}


				$data = array(
					'no_kk' => $this->session->userdata('no_kk'),
					'no_pendaftaran' => $this->session->userdata('no_pendaftaran'),
					'nama_siswa' => $this->input->post('nama_siswa'),
					'file_akte' => $dataBerkasKK,
					'file_raport' => $dataBerkasRaport
				);

				var_dump("sukses upload");
				$acts = $this->siswa->upload_berkas('prestasi', $data);
				redirect('panel_siswa/berkas');
			} elseif (isset($_POST['btnPrestasi'])) {
				// set name
				$no_pendaftaran = $this->session->userdata('no_pendaftaran');
				$originalFileName = $_FILES['file_sertifikat']['name'];
				$extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
				$newFileName = $no_pendaftaran . '_sertifikat.' . $extension; // Menggunakan no_pendaftaran sebagai nama file

				$config['upload_path'] = FCPATH . 'public/files/keluarga';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 2048;
				$config['file_name'] = $newFileName; // Menggunakan 'file_name' untuk nama file skhun
				$this->upload->initialize($config);

				if ($this->upload->do_upload('file_kk')) {
					$dataBerkasSertifikat = $newFileName;
					// Setelah berkas berhasil diunggah, ubah nama berkas di direktori
					$oldFilePath = $config['upload_path'] . $originalFileName;
					$newFilePath = $config['upload_path'] . $newFileName;
					rename($oldFilePath, $newFilePath);
				} else {
					$error = $this->upload->display_errors();
					echo $error . "gagal kk";
				}

				$data = array(
					'no_pendaftaran' => $this->session->userdata('no_pendaftaran'),
					'tingkat' => $this->session->userdata('tingkat'),
					'prestasi' => $this->input->post('prestasi'),
					'file_akte' => $dataBerkasSertifikat
				);

				var_dump("sukses upload");
				$acts = $this->siswa->upload_berkas('prestasi', $data);
				redirect('panel_siswa/berkas');
			}
		}
	}

	public function berkas_skhun()
	{
		var_dump("sukses akses");
		if ($this->session->userdata('no_pendaftaran') == NULL) {
			redirect('logcs');
		}

	}
	public function berkas_keluarga()
	{
		if ($this->session->userdata('no_pendaftaran') == NULL) {
			redirect('logcs');
		}
		if (isset($_POST['btnKeluarga'])) {


			if (
				!$this->from_validation->run([
					'no_kk' => [
						'rules' => 'required',
						'errors' => [
							'required' => '{field} Tidak boleh kosong'
						]
					],
					'no_pendaftaran' => [
						'rules' => 'required',
						'errors' => [
							'required' => '{field} Tidak boleh kosong'
						]
					],
					'file_kk' => [
						'rules' => 'uploaded[berkas]|mime_in[berkas,image/jpg,image/jpeg,image/gif,image/png, image/pdf]|max_size[berkas,2048]',
						'errors' => [
							'uploaded' => 'Harus Ada File yang diupload',
							'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
							'max_size' => 'Ukuran File Maksimal 2 MB'
						]

					],
					'file_akte' => [
						'rules' => 'uploaded[berkas]|mime_in[berkas,image/jpg,image/jpeg,image/gif,image/png, image/pdf]|max_size[berkas,2048]',
						'errors' => [
							'uploaded' => 'Harus Ada File yang diupload',
							'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
							'max_size' => 'Ukuran File Maksimal 2 MB'
						]

					]
				])
			) {
				session()->setFlashdata('error', $this->validator->listErrors());
				return redirect()->back()->withInput();
			}

			$dataBerkasKK = $this->session->post('file_KK');
			$dataBerkasAkte = $this->session->post('file_akte');

			$fileNameKK = $dataBerkasKK->getRandomName();
			$fileNameAkte = $dataBerkasAkte->getRandomName();


			$data = array(
				'no_pendaftaran' => $this->session->userdata('no_pendaftaran'),
				'no_kk' => $this->input->post('no_kk'),
				'nama_siswa' => $this->input->post('nama_siswa'),
				'file_kk' => $fileNameKK,
				'file_akte' => $fileNameAkte,
			);
			$dataBerkasKK->move('assets/berkas/siswa/', $fileNameKK);
			$dataBerkasAkte->move('assets/berkas/siswa/', $fileNameAkte);

			session()->setFlashdata('success', 'Berkas Berhasil diupload');

			$acts = $this->siswa->upload_berkas('keluarga', $data);
			redirect('panel_siswa/berkas');
		}
	}




	public function berkas_prestasi()
	{
		$sess = $this->session->userdata('id_admin');
		if ($sess == NULL) {
			redirect('panel_admin/log_in');
		}

		if (isset($_POST['btnupdate'])) {
			if (
				!$this->validate([
					'no_pendaftaran' => [
						'rules' => 'required',
						'errors' => [
							'required' => '{field} Tidak boleh kosong'
						]
					],
					'prestasi' => [
						'rules' => 'required',
						'errors' => [
							'required' => '{field} Tidak boleh kosong'
						]
					],
					'tingkat' => [
						'rules' => 'required',
						'errors' => [
							'required' => '{field} Tidak boleh kosong'
						]
					],
					'file_sertifikat' => [
						'rules' => 'uploaded[berkas]|mime_in[berkas,image/jpg,image/jpeg,image/gif,image/png, image/pdf]|max_size[berkas,2048]',
						'errors' => [
							'uploaded' => 'Harus Ada File yang diupload',
							'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
							'max_size' => 'Ukuran File Maksimal 2 MB'
						]

					]
				])
			) {
				session()->setFlashdata('error', $this->validator->listErrors());
				return redirect()->back()->withInput();
			}

			$dataBerkasSertifikat = $this->session->post('file_sertifikat');

			$fileNameSertifikat = $dataBerkasSertifikat->getRandomName();


			$data = array(
				'no_pendaftaran' => $this->session->userdata('no_pendaftaran'),
				'tingkat' => $this->input->post('no_skhun'),
				'prestasi' => $this->input->post('prestasi'),
				'file_skhun' => $fileNameSertifikat
			);
			$dataBerkasSertifikat->move('assets/berkas/siswa/', $fileNameSertifikat);

			session()->setFlashdata('success', 'Berkas Berhasil diupload');

			$acts = $this->siswa->upload_berkas('prestasi', $data);
			redirect('panel_siswa/berkas');
		}

	}


	public function cetak()
	{
		if ($this->session->userdata('no_pendaftaran') == NULL) {
			redirect('logcs');
		}
		$sess = $this->session->userdata('no_pendaftaran');
		$base_bio = $this->siswa->base_biodata($sess);
		$data = array(
			'user' => $base_bio,
			'judul_web' => ucwords($base_bio->no_pendaftaran) . '-' . ucwords($base_bio->nama_lengkap),
			'thn_ppdb' => date('Y', strtotime($base_bio->tgl_siswa))
		);

		$this->load->view('siswa/cetak', $data);
	}


	public function rekap_nilai()
	{
		if ($this->session->userdata('no_pendaftaran') == NULL) {
			redirect('logcs');
		}

		$sess = $this->session->userdata('no_pendaftaran');
		$base_bio = $this->siswa->base_biodata($sess);

		$data = array(
			'user' => $base_bio,
			'judul_web' => "Cetak Rekap Nilai " . ucwords($base_bio->nama_lengkap),
			'thn_ppdb' => $this->siswa->get_fy(),
			'nilai_rapor' => $this->siswa->get_print('study-report', $sess)->rata_rata_nilai,
			'rapor' => array(
				'sci' => $this->siswa->get_val('rapor', $sess, "Ilmu Pengetahuan Alam (IPA)"),
				'soc' => $this->siswa->get_val('rapor', $sess, "Ilmu Pengetahuan Sosial (IPS)"),
				'mat' => $this->siswa->get_val('rapor', $sess, "Matematika"),
				'ind' => $this->siswa->get_val('rapor', $sess, "Bahasa Indonesia"),
				'eng' => $this->siswa->get_val('rapor', $sess, "Bahasa Inggris"),
				'rlg' => $this->siswa->get_val('rapor', $sess, "Pendidikan Agama"),
				'nat' => $this->siswa->get_val('rapor', $sess, "PKN")
			),
			'nilai_usbn' => $this->siswa->get_print('schtest-val', $sess)->nilai_usbn,
			'usbn' => array(
				'sci' => $this->siswa->get_val('usbn', $sess, "Ilmu Pengetahuan Alam (IPA)"),
				'soc' => $this->siswa->get_val('usbn', $sess, "Ilmu Pengetahuan Sosial (IPS)"),
				'mat' => $this->siswa->get_val('usbn', $sess, "Matematika"),
				'ind' => $this->siswa->get_val('usbn', $sess, "Bahasa Indonesia"),
				'eng' => $this->siswa->get_val('usbn', $sess, "Bahasa Inggris"),
				'rlg' => $this->siswa->get_val('usbn', $sess, "Pendidikan Agama"),
				'nat' => $this->siswa->get_val('usbn', $sess, "PKN")
			),
			'nilai_unbk' => $this->siswa->get_print('nattest-val', $sess)->nilai_unbk,
			'unbk' => array(
				'sci' => $this->siswa->get_val('unbk', $sess, "Ilmu Pengetahuan Alam (IPA)"),
				'mat' => $this->siswa->get_val('unbk', $sess, "Matematika"),
				'ind' => $this->siswa->get_val('unbk', $sess, "Bahasa Indonesia"),
				'eng' => $this->siswa->get_val('unbk', $sess, "Bahasa Inggris")
			),
		);

		$this->load->view('siswa/rekap_nilai', $data);
	}

	public function cetak_lulus()
	{
		if ($this->session->userdata('no_pendaftaran') == NULL) {
			redirect('logcs');
		}

		$sess = $this->session->userdata('no_pendaftaran');
		$base_bio = $this->siswa->base_biodata($sess);

		$data = array(
			'user' => $this->siswa->get_print('passed', $sess),
			'judul_web' => "Cetak Bukti Lulus " . ucwords($base_bio->nama_lengkap),
			'thn_ppdb' => date('Y', strtotime($base_bio->tgl_siswa)),
			'v_ket' => $this->siswa->get_print('announcement')
		);

		if ($data['user']->status_pendaftaran != 'lulus') {
			redirect('404');
		}

		$this->load->view('siswa/cetak_lulus', $data);
	}

	public function logout()
	{
		if ($this->session->userdata('no_pendaftaran') != '') {
			$this->session->sess_destroy();
		}
		redirect('');
	}
}