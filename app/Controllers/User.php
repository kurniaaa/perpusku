<?php

namespace App\Controllers;

use App\Models\KoleksiModel;
use App\Models\KategoriModel;
use App\Models\TagModel;
use App\Models\UserModel;
use App\Models\LaporanModel;
use Myth\Auth\Password;

class User extends BaseController
{
	protected $KoleksiModel;
	protected $KategoriModel;
	protected $TagModel;
	protected $UserModel;
	protected $LaporanModel;
	protected $db;
	protected $builder;
	public function __construct()
	{
		$this->KoleksiModel = new KoleksiModel();
		$this->KategoriModel = new KategoriModel();
		$this->TagModel = new TagModel();
		$this->UserModel = new UserModel();
		$this->LaporanModel = new LaporanModel();
		$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('koleksi');
	}

	public function index()
	{
		$info = [
			'buku' => count($this->KoleksiModel->where(['id_kategori' => '1', 'id_user' => user_id()])->find()),
			'laporan' => count($this->LaporanModel->getLaporan(user_id())),
			'koleksi' => count($this->KoleksiModel->getKoleksiUser(user_id()))
		];
		$data = [
			'title' => 'Dashboard',
			'page' => 'dashboard',
			'lastkoleksi' => $this->KoleksiModel->getLimitKoleksi(user_id()),
			'lastlaporan' => $this->LaporanModel->getLimitLaporan(user_id()),
			'box' => $info
		];
		// dd($data);
		return view('dashboard/index', $data);
	}

	public function profileUser()
	{
		$user = $this->UserModel->find(user_id());
		$jmlKoleksi = $this->KoleksiModel->getKoleksiUser(user_id());
		$data = [
			'title' => 'Profil Pengguna',
			'page' => 'profile',
			'user' => $user->toArray(),
			'jmlkoleksi' => count($jmlKoleksi),
			'validation' => \Config\Services::validation(),
		];
		// session()->setFlashdata('tag', 'uprofil');
		// dd($data);
		return view('profile/index', $data);
	}

	public function profileEdit()
	{
		if (!$this->validate([
			'fullname' => [
				'label' => 'Nama lengkap',
				'rules' => 'required|alpha_space|min_length[3]|max_length[200]',
				'errors' => [
					'required' => '{field} harus diisi.',
					'alpha_space' => '{field} hanya boleh berisi alphabet dan spasi.',
					'min_length' => '{field} minimal berisi {param} karakter.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'perpus' => [
				'label' => 'Nama perpustakaan',
				'rules' => 'required|alpha_numeric_punct|min_length[3]|max_length[20]',
				'errors' => [
					'required' => '{field} harus diisi.',
					'alpha_numeric_punct' => '{field} hanya boleh berisi alphabet, spasi, dan number.',
					'min_length' => '{field} minimal berisi {param} karakter.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'address' => [
				'label' => 'Alamat',
				'rules' => 'required|alpha_numeric_punct|min_length[3]|max_length[200]',
				'errors' => [
					'required' => '{field} harus diisi.',
					'alpha_numeric_punct' => '{field} hanya boleh berisi alphabet, spasi, dan number.',
					'min_length' => '{field} minimal berisi {param} karakter.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'phone' => [
				'label' => 'Jumlah koleksi',
				'rules' => 'required|numeric|min_length[8]|max_length[16]',
				'errors' => [
					'required' => '{field} harus diisi.',
					'numeric' => '{field} hanya boleh berisi number.',
					'min_length' => '{field} minimal berisi {param} karakter.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
		])) {
			return redirect()->back()->with('tag', 'uprofil')->withInput();
		} else {
			$data = [
				'id' => $this->request->getVar('id_user'),
				'fullname' => $this->request->getVar('fullname'),
				'address' => $this->request->getVar('address'),
				'phone' => $this->request->getVar('phone'),
				'perpus' => $this->request->getVar('perpus'),
			];
			// dd($data);
			$this->UserModel->save($data);
			session()->setFlashdata('message_success', 'Data Profil Berhasil Diupdate');
			return redirect()->back()->with('tag', 'uprofil');
		}
	}

	public function profileEditImage()
	{
		if (!$this->validate([
			'user_image' => [
				'label' => 'Foto profil',
				'rules' => 'uploaded[user_image]|is_image[user_image]|mime_in[user_image,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
					'uploaded' => '{field} harus diisi.',
					'is_image' => '{field} yang dipilih bukan gambar.',
					'mime_in' => '{field} yang dipilih bukan gambar.',
				]
			],
		])) {
			return redirect()->back()->with('tag', 'ufoto')->withInput();
		} else {
			$fileProfil = $this->request->getFile('user_image');
			$id = $this->request->getVar('id_user');
			$email = $this->UserModel->find($id);
			if ($fileProfil->getError() == 4) {
				$namaFoto = 'default.jpg';
			} else {
				$namaFoto = url_title($email->email, '_', true) . '.' . $fileProfil->getExtension();
				$fileProfil->move('dist/upload/user_image', $namaFoto, true);
				$namaFoto = $fileProfil->getName();
			}
			$data = [
				'id' => $this->request->getVar('id_user'),
				'user_image' => $namaFoto
			];
			// dd($data);
			$this->UserModel->save($data);
			session()->setFlashdata('message_success', 'Foto Profil Berhasil Diupdate');
			return redirect()->back()->with('tag', 'ufoto');
		}
	}

	public function profileEditPassword()
	{
		if (!$this->validate([
			'password_lm' => [
				'label' => 'Password lama',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi.',
				]
			],
			'password_br' => [
				'label' => 'Password baru',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi.',
				]
			],
			'password_br2' => [
				'label' => 'Ulangi password',
				'rules' => 'required|matches[password_br]',
				'errors' => [
					'required' => '{field} harus diisi.',
					'matches' => '{field} tidak cocok.',
				]
			],
		])) {
			return redirect()->back()->with('tag', 'upassword')->withInput();
		} else {
			$passLama = $this->request->getVar('password_lm');
			$check = Password::verify($passLama, user()->password_hash);
			if ($check == false) {
				session()->setFlashdata('message_error', 'Password Lama Tidak Cocok');
				return redirect()->back()->with('tag', 'upassword')->withInput();
			}
			$passBaru = Password::hash($this->request->getVar('password_br'));
			$data = [
				'id' => $this->request->getVar('id_user'),
				'password_hash' => $passBaru
			];
			// dd($data);
			$this->UserModel->save($data);
			session()->setFlashdata('message_success', 'Password Berhasil Diubah');
			return redirect()->to('/profile')->with('tag', 'upassword');
		}
	}

	public function readKoleksi()
	{
		$koleksi = $this->KoleksiModel->getKoleksiUser(user_id());
		// dd($koleksi);
		$data = [
			'title' => 'Data Koleksi',
			'page' => 'koleksi',
			'koleksi' => $koleksi
		];
		return view('koleksi/index', $data);
	}

	public function detailKoleksi($slug)
	{
		$user = explode('-', $slug)[0];
		if (in_groups('user')) {
			if ($user != user()->username) {
				throw new \CodeIgniter\Exceptions\PageNotFoundException('Koleksi tidak ditemukan.');
			}
		}

		$koleksi = $this->KoleksiModel->getKoleksiUser(user()->id, $slug);
		if (empty($koleksi)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Koleksi tidak ditemukan.');
		}

		$id_koleksi = $this->KoleksiModel->getOneKoleksi($slug)['id'];
		$laporan = $this->LaporanModel->getLaporanKoleksi($id_koleksi);
		// dd($laporan);
		$data = [
			'title' => 'Detail Koleksi',
			'page' => 'koleksi',
			'koleksi' => $koleksi,
			'laporan' => $laporan
		];
		return view('koleksi/detail', $data);
	}

	public function addKoleksi()
	{
		$data = [
			'title' => 'Tambah Koleksi',
			'page' => 'koleksi',
			'kategori' => $this->KategoriModel->findAll(),
			'tag' => $this->TagModel->findAll(),
			'validation' => \Config\Services::validation()
		];
		return view('koleksi/add', $data);
	}

	public function saveKoleksi()
	{
		if (!$this->validate([
			'kategori' => [
				'label' => 'Kategori koleksi',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi.',
				]
			],
			'nama' => [
				'label' => 'Nama/judul koleksi',
				'rules' => 'required|alpha_numeric_punct|min_length[3]|max_length[200]',
				'errors' => [
					'required' => '{field} harus diisi.',
					'alpha_numeric_punct' => '{field} hanya boleh berisi alphabet, spasi, dan number.',
					'min_length' => '{field} minimal berisi {param} karakter.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'pengarang' => [
				'label' => 'Pengarang/penulis',
				'rules' => 'permit_empty|alpha_numeric_punct|max_length[200]',
				'errors' => [
					'max_length' => '{field} maksimal berisi {param} karakter.',
					'alpha_numeric_punct' => '{field} hanya boleh berisi alphabet, spasi, dan number.',
				]
			],
			'penerbit' => [
				'label' => 'Penerbit',
				'rules' => 'permit_empty|alpha_numeric_punct|max_length[200]',
				'errors' => [
					'alpha_numeric_punct' => '{field} hanya boleh berisi alphabet, spasi, dan number.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'tahun_terbit' => [
				'label' => 'Tahun terbit',
				'rules' => 'permit_empty|numeric|max_length[5]',
				'errors' => [
					'numeric' => '{field} hanya boleh berisi number.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'status' => [
				'label' => 'Status koleksi',
				'rules' => 'permit_empty|alpha_numeric_punct|max_length[250]',
				'errors' => [
					'alpha_numeric_punct' => '{field} hanya boleh berisi alphabet, spasi, dan number.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'jumlah' => [
				'label' => 'Jumlah koleksi',
				'rules' => 'required|numeric|max_length[5]',
				'errors' => [
					'required' => '{field} harus diisi.',
					'numeric' => '{field} hanya boleh berisi number.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'tag.*' => [
				'label' => 'Tag koleksi',
				'rules' => 'permit_empty|max_length[250]',
				'errors' => [
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'deskripsi' => [
				'label' => 'Deskripsi koleksi',
				'rules' => 'permit_empty|alpha_numeric_punct|max_length[250]',
				'errors' => [
					'alpha_numeric_punct' => '{field} hanya boleh berisi alphabet, spasi, dan number.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'foto1' => [
				'label' => 'Foto utama',
				'rules' => 'uploaded[foto1]|is_image[foto1]|mime_in[foto1,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
					'uploaded' => '{field} harus diisi.',
					'is_image' => '{field} yang dipilih bukan gambar.',
					'mime_in' => '{field} yang dipilih bukan gambar.',
				]
			],
			'foto2' => [
				'label' => 'Foto 2',
				'rules' => 'is_image[foto1]|mime_in[foto1,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
					'is_image' => '{field} yang dipilih bukan gambar',
					'mime_in' => '{field} yang dipilih bukan gambar'
				]
			],
			'foto3' => [
				'label' => 'Foto 3',
				'rules' => 'is_image[foto1]|mime_in[foto1,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
					'is_image' => '{field} yang dipilih bukan gambar',
					'mime_in' => '{field} yang dipilih bukan gambar'
				]
			],
			'foto4' => [
				'label' => 'Foto 4',
				'rules' => 'is_image[foto1]|mime_in[foto1,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
					'is_image' => '{field} yang dipilih bukan gambar',
					'mime_in' => '{field} yang dipilih bukan gambar'
				]
			],
			'foto5' => [
				'label' => 'Foto 5',
				'rules' => 'is_image[foto1]|mime_in[foto1,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
					'is_image' => '{field} yang dipilih bukan gambar',
					'mime_in' => '{field} yang dipilih bukan gambar'
				]
			],
		])) {
			return redirect()->to('/koleksi-add')->withInput();
		} else {
			// dd($this->request->getVar());
			//cek koleksi
			$koleksi = $this->KoleksiModel->getKoleksiUser(user_id());
			foreach ($koleksi as $kls) {
				if ($kls['id_kategori'] == $this->request->getVar('kategori') && $kls['nama'] == $this->request->getVar('nama')) {
					session()->setFlashdata('message_error', 'Data Koleksi Berikut Sudah Ada');
					return redirect()->to('/koleksi-add')->withInput();
				}
			}
			$slug = user()->username . '-' . $this->request->getVar('kategori') . '-' . url_title($this->request->getVar('nama'), '-', true);
			$fileFoto1 = $this->request->getFile('foto1');
			if ($fileFoto1->getError() == 4) {
				$namaFoto1 = 'default.jpg';
			} else {
				$namaFoto1 = $slug . '-1' . '.' . $fileFoto1->getExtension();
				// $fileFoto1 = \Config\Services::image('imagick')
				// 	->withFile($fileFoto1->getPath())
				// 	->resize(200, 100, true, 'width')
				// 	->save('/path/to/new/image.jpg');
				$fileFoto1->move('dist/upload/foto_koleksi', $namaFoto1, true);
				$namaFoto1 = $fileFoto1->getName();
			}

			$fileFoto2 = $this->request->getFile('foto2');
			if ($fileFoto2->getError() == 4) {
				$namaFoto2 = 'default.jpg';
			} else {
				$namaFoto2 = $slug . '-2' . '.' . $fileFoto2->getExtension();
				$fileFoto2->move('dist/upload/foto_koleksi', $namaFoto2, true);
				$namaFoto2 = $fileFoto2->getName();
			}

			$fileFoto3 = $this->request->getFile('foto3');
			if ($fileFoto3->getError() == 4) {
				$namaFoto3 = 'default.jpg';
			} else {
				$namaFoto3 = $slug . '-3' . '.' . $fileFoto3->getExtension();
				$fileFoto3->move('dist/upload/foto_koleksi', $namaFoto3, true);
				$namaFoto3 = $fileFoto3->getName();
			}

			$fileFoto4 = $this->request->getFile('foto4');
			if ($fileFoto4->getError() == 4) {
				$namaFoto4 = 'default.jpg';
			} else {
				$namaFoto4 = $slug . '-4' . '.' . $fileFoto4->getExtension();
				$fileFoto4->move('dist/upload/foto_koleksi', $namaFoto4, true);
				$namaFoto4 = $fileFoto4->getName();
			}

			$fileFoto5 = $this->request->getFile('foto5');
			if ($fileFoto5->getError() == 4) {
				$namaFoto5 = 'default.jpg';
			} else {
				$namaFoto5 = $slug . '-5' . '.' . $fileFoto5->getExtension();
				$fileFoto5->move('dist/upload/foto_koleksi', $namaFoto5, true);
				$namaFoto5 = $fileFoto5->getName();
			}

			if ($this->request->getVar('tag') == false) {
				$tag = '';
			} else {
				$tag = implode(",", $this->request->getVar('tag'));
			}
			$data = [
				'id_user' => user_id(),
				'id_kategori' => $this->request->getVar('kategori'),
				'nama' => $this->request->getVar('nama'),
				'slug' => $slug,
				'pengarang' => $this->request->getVar('pengarang'),
				'tahun_terbit' => $this->request->getVar('tahun_terbit'),
				'penerbit' => $this->request->getVar('penerbit'),
				'status' => $this->request->getVar('status'),
				'jumlah' => $this->request->getVar('jumlah'),
				'tag' => $tag,
				'foto1' => $namaFoto1,
				'foto2' => $namaFoto2,
				'foto3' => $namaFoto3,
				'foto4' => $namaFoto4,
				'foto5' => $namaFoto5,
				'deskripsi' => $this->request->getVar('deskripsi')
			];
			$this->KoleksiModel->save($data);
			session()->setFlashdata('message_success', 'Data Koleksi Berhasil Ditambahkan');
			return redirect()->to('/koleksi');
		}
	}

	public function deleteKoleksi($slug)
	{
		$user = explode('-', $slug)[0];
		if (in_groups('user')) {
			if ($user != user()->username) {
				throw new \CodeIgniter\Exceptions\PageNotFoundException('Koleksi tidak ditemukan.');
			}
		}

		$koleksi = $this->KoleksiModel->getKoleksiUser(user()->id, $slug);
		if (empty($koleksi)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Koleksi tidak ditemukan.');
		}

		$koleksi = $this->KoleksiModel->getKoleksiUser(user_id(), $slug);
		if ($koleksi['foto1'] != 'default.jpg' || $koleksi['foto1'] == null || $koleksi['foto1'] == '') {
			unlink('dist/upload/foto_koleksi/' . $koleksi['foto1']);
		}
		if ($koleksi['foto2'] != 'default.jpg' || $koleksi['foto2'] == null || $koleksi['foto2'] == '') {
			unlink('dist/upload/foto_koleksi/' . $koleksi['foto2']);
		}
		if ($koleksi['foto3'] != 'default.jpg' || $koleksi['foto3'] == null || $koleksi['foto3'] == '') {
			unlink('dist/upload/foto_koleksi/' . $koleksi['foto3']);
		}
		if ($koleksi['foto4'] != 'default.jpg' || $koleksi['foto4'] == null || $koleksi['foto4'] == '') {
			unlink('dist/upload/foto_koleksi/' . $koleksi['foto4']);
		}
		if ($koleksi['foto5'] != 'default.jpg' || $koleksi['foto5'] == null || $koleksi['foto5'] == '') {
			unlink('dist/upload/foto_koleksi/' . $koleksi['foto5']);
		}
		$this->KoleksiModel->deleteKoleksi($slug);
		session()->setFlashdata('message_success', 'Data Koleksi Berhasil Dihapus');
		return redirect()->to('/koleksi');
	}

	public function editKoleksi($slug)
	{
		$user = explode('-', $slug)[0];
		if (in_groups('user')) {
			if ($user != user()->username) {
				throw new \CodeIgniter\Exceptions\PageNotFoundException('Koleksi tidak ditemukan.');
			}
		}

		$koleksi = $this->KoleksiModel->getKoleksiUser(user()->id, $slug);
		if (empty($koleksi)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Koleksi tidak ditemukan.');
		}

		$data = [
			'title' => 'Edit Koleksi',
			'page' => 'koleksi',
			'kategori' => $this->KategoriModel->findAll(),
			'tag' => $this->TagModel->findAll(),
			'validation' => \Config\Services::validation(),
			'koleksi' => $this->KoleksiModel->getKoleksiUser(user_id(), $slug)
		];
		// dd($data);
		return view('koleksi/edit', $data);
	}

	public function updateKoleksi()
	{
		if (!$this->validate([
			'kategori' => [
				'label' => 'Kategori koleksi',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi.',
				]
			],
			'nama' => [
				'label' => 'Nama/judul koleksi',
				'rules' => 'required|alpha_numeric_punct|min_length[3]|max_length[200]',
				'errors' => [
					'required' => '{field} harus diisi.',
					'alpha_numeric_punct' => '{field} hanya boleh berisi alphabet, spasi, dan number.',
					'min_length' => '{field} minimal berisi {param} karakter.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'pengarang' => [
				'label' => 'Pengarang/penulis',
				'rules' => 'permit_empty|alpha_numeric_punct|max_length[200]',
				'errors' => [
					'max_length' => '{field} maksimal berisi {param} karakter.',
					'alpha_numeric_punct' => '{field} hanya boleh berisi alphabet, spasi, dan number.',
				]
			],
			'penerbit' => [
				'label' => 'Penerbit',
				'rules' => 'permit_empty|alpha_numeric_punct|max_length[200]',
				'errors' => [
					'alpha_numeric_punct' => '{field} hanya boleh berisi alphabet, spasi, dan number.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'tahun_terbit' => [
				'label' => 'Tahun terbit',
				'rules' => 'permit_empty|numeric|max_length[5]',
				'errors' => [
					'numeric' => '{field} hanya boleh berisi number.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'status' => [
				'label' => 'Status koleksi',
				'rules' => 'permit_empty|alpha_numeric_punct|max_length[250]',
				'errors' => [
					'alpha_numeric_punct' => '{field} hanya boleh berisi alphabet, spasi, dan number.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'jumlah' => [
				'label' => 'Jumlah koleksi',
				'rules' => 'required|numeric|max_length[5]',
				'errors' => [
					'required' => '{field} harus diisi.',
					'numeric' => '{field} hanya boleh berisi number.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'tag.*' => [
				'label' => 'Tag koleksi',
				'rules' => 'permit_empty|max_length[250]',
				'errors' => [
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'deskripsi' => [
				'label' => 'Deskripsi koleksi',
				'rules' => 'permit_empty|alpha_numeric_punct|max_length[250]',
				'errors' => [
					'alpha_numeric_punct' => '{field} hanya boleh berisi alphabet, spasi, dan number.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'foto1' => [
				'label' => 'Foto utama',
				'rules' => 'is_image[foto1]|mime_in[foto1,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
					'is_image' => '{field} yang dipilih bukan gambar.',
					'mime_in' => '{field} yang dipilih bukan gambar.',
				]
			],
			'foto2' => [
				'label' => 'Foto 2',
				'rules' => 'is_image[foto1]|mime_in[foto1,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
					'is_image' => '{field} yang dipilih bukan gambar',
					'mime_in' => '{field} yang dipilih bukan gambar'
				]
			],
			'foto3' => [
				'label' => 'Foto 3',
				'rules' => 'is_image[foto1]|mime_in[foto1,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
					'is_image' => '{field} yang dipilih bukan gambar',
					'mime_in' => '{field} yang dipilih bukan gambar'
				]
			],
			'foto4' => [
				'label' => 'Foto 4',
				'rules' => 'is_image[foto1]|mime_in[foto1,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
					'is_image' => '{field} yang dipilih bukan gambar',
					'mime_in' => '{field} yang dipilih bukan gambar'
				]
			],
			'foto5' => [
				'label' => 'Foto 5',
				'rules' => 'is_image[foto1]|mime_in[foto1,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
					'is_image' => '{field} yang dipilih bukan gambar',
					'mime_in' => '{field} yang dipilih bukan gambar'
				]
			],
		])) {
			return redirect()->back()->withInput();
		} else {
			// dd($this->request->getVar());
			//cek koleksi
			$koleksi = $this->KoleksiModel->getKoleksiUser(user_id());
			foreach ($koleksi as $kls) {
				if ($kls['slug'] != $this->request->getVar('slugLama')) {
					if ($kls['id_kategori'] == $this->request->getVar('kategori') && $kls['nama'] == $this->request->getVar('nama')) {
						session()->setFlashdata('message_error', 'Data Koleksi Berikut Sudah Ada');
						return redirect()->back()->withInput();
					}
				}
			}
			$slug = user()->username . '-' . $this->request->getVar('kategori') . '-' . url_title($this->request->getVar('nama'), '-', true);
			$fileFoto1 = $this->request->getFile('foto1');
			if ($fileFoto1->getError() == 4) {
				$namaFoto1 = $this->request->getVar('foto1Lama');
			} else {
				$namaFoto1 = $slug . '-1' . '.' . $fileFoto1->getExtension();
				// $fileFoto1 = \Config\Services::image('imagick')
				// 	->withFile($fileFoto1->getPath())
				// 	->resize(200, 100, true, 'width')
				// 	->save('/path/to/new/image.jpg');
				$fileFoto1->move('dist/upload/foto_koleksi', $namaFoto1, true);
				$namaFoto1 = $fileFoto1->getName();
			}

			$fileFoto2 = $this->request->getFile('foto2');
			if ($fileFoto2->getError() == 4) {
				$namaFoto2 = $this->request->getVar('foto2Lama');
			} else {
				$namaFoto2 = $slug . '-2' . '.' . $fileFoto2->getExtension();
				$fileFoto2->move('dist/upload/foto_koleksi', $namaFoto2, true);
				$namaFoto2 = $fileFoto2->getName();
			}

			$fileFoto3 = $this->request->getFile('foto3');
			if ($fileFoto3->getError() == 4) {
				$namaFoto3 = $this->request->getVar('foto3Lama');
			} else {
				$namaFoto3 = $slug . '-3' . '.' . $fileFoto3->getExtension();
				$fileFoto3->move('dist/upload/foto_koleksi', $namaFoto3, true);
				$namaFoto3 = $fileFoto3->getName();
			}

			$fileFoto4 = $this->request->getFile('foto4');
			if ($fileFoto4->getError() == 4) {
				$namaFoto4 = $this->request->getVar('foto4Lama');
			} else {
				$namaFoto4 = $slug . '-4' . '.' . $fileFoto4->getExtension();
				$fileFoto4->move('dist/upload/foto_koleksi', $namaFoto4, true);
				$namaFoto4 = $fileFoto4->getName();
			}

			$fileFoto5 = $this->request->getFile('foto5');
			if ($fileFoto5->getError() == 4) {
				$namaFoto5 = $this->request->getVar('foto5Lama');
			} else {
				$namaFoto5 = $slug . '-5' . '.' . $fileFoto5->getExtension();
				$fileFoto5->move('dist/upload/foto_koleksi', $namaFoto5, true);
				$namaFoto5 = $fileFoto5->getName();
			}

			if ($this->request->getVar('tag') == false) {
				$tag = '';
			} else {
				$tag = implode(",", $this->request->getVar('tag'));
			}
			$data = [
				'id' => $this->KoleksiModel->getOneKoleksi($this->request->getVar('slugLama'))['id'],
				'id_kategori' => $this->request->getVar('kategori'),
				'nama' => $this->request->getVar('nama'),
				'slug' => $slug,
				'pengarang' => $this->request->getVar('pengarang'),
				'tahun_terbit' => $this->request->getVar('tahun_terbit'),
				'penerbit' => $this->request->getVar('penerbit'),
				'status' => $this->request->getVar('status'),
				'jumlah' => $this->request->getVar('jumlah'),
				'tag' => $tag,
				'foto1' => $namaFoto1,
				'foto2' => $namaFoto2,
				'foto3' => $namaFoto3,
				'foto4' => $namaFoto4,
				'foto5' => $namaFoto5,
				'deskripsi' => $this->request->getVar('deskripsi')
			];
			$this->KoleksiModel->save($data);
			session()->setFlashdata('message_success', 'Data Koleksi Berhasil Diupdate');
			return redirect()->to('/koleksi');
		}
	}

	public function readLaporanKoleksi()
	{
		$laporan = $this->LaporanModel->getLaporan(user_id());
		// dd($laporan);
		$data = [
			'title' => 'Laporan Kejadian',
			'page' => 'laporan',
			'laporan' => $laporan
		];
		return view('laporan/index', $data);
	}

	public function addLaporanKoleksi($slug = '')
	{
		$koleksi = $this->builder->select('koleksi.id as id_koleksi, nama, kategori')
			->join('kategori_koleksi', 'kategori_koleksi.id = koleksi.id_kategori')
			->where('id_user', user_id())
			->orderBy('koleksi.created_at', 'DESC')
			->get()->getResultArray();

		if ($slug != '') {
			$slug = $this->KoleksiModel->getOneKoleksi($slug)['id'];
		}

		$data = [
			'title' => 'Tambah Laporan Kejadian',
			'page' => 'laporan',
			'slug' => $slug,
			'koleksi' => $koleksi,
			'validation' => \Config\Services::validation()
		];
		// dd($data);
		return view('laporan/add', $data);
	}

	public function saveLaporanKoleksi()
	{
		if (!$this->validate([
			'koleksi' => [
				'label' => 'Koleksi',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi.',
				]
			],
			'informasi' => [
				'label' => 'Informasi koleksi',
				'rules' => 'required|max_length[250]',
				'errors' => [
					'required' => '{field} harus diisi.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'catatan' => [
				'label' => 'Catatan laporan',
				'rules' => 'permit_empty|max_length[250]',
				'errors' => [
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
		])) {
			return redirect()->back()->withInput();
		} else {
			// dd($this->request->getVar());
			$data = [
				'id_koleksi' => $this->request->getVar('koleksi'),
				'informasi' => $this->request->getVar('informasi'),
				'catatan' => $this->request->getVar('catatan'),
			];
			$this->LaporanModel->save($data);
			session()->setFlashdata('message_success', 'Laporan Kejadian Koleksi Berhasil Ditambahkan');
			return redirect()->to('/laporan');
		}
	}

	public function editLaporanKoleksi($id_laporan)
	{
		$laporan = $this->LaporanModel->getOneLaporan($id_laporan);

		if (empty($laporan)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data laporan tidak ditemukan.');
		}

		$userlaporan = $this->KoleksiModel->find($laporan['id_koleksi']);
		if ($userlaporan['id_user'] != user_id()) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data laporan tidak ditemukan.');
		}
		$koleksi = $this->builder->select('koleksi.id as id_koleksi, nama, kategori')
			->join('kategori_koleksi', 'kategori_koleksi.id = koleksi.id_kategori')
			->where('id_user', user_id())
			->orderBy('koleksi.created_at', 'DESC')
			->get()->getResultArray();
		$data = [
			'title' => 'Edit Laporan Kejadian',
			'page' => 'laporan',
			'koleksi' => $koleksi,
			'laporan' => $laporan,
			'validation' => \Config\Services::validation()
		];
		// dd($data);
		return view('laporan/edit', $data);
	}

	public function updateLaporanKoleksi()
	{
		if (!$this->validate([
			'koleksi' => [
				'label' => 'Koleksi',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi.',
				]
			],
			'informasi' => [
				'label' => 'Informasi koleksi',
				'rules' => 'required|max_length[250]',
				'errors' => [
					'required' => '{field} harus diisi.',
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
			'catatan' => [
				'label' => 'Catatan laporan',
				'rules' => 'permit_empty|max_length[250]',
				'errors' => [
					'max_length' => '{field} maksimal berisi {param} karakter.',
				]
			],
		])) {
			return redirect()->back()->withInput();
		} else {
			// dd($this->request->getVar());
			$data = [
				'id_laporan' => $this->request->getVar('id_laporan'),
				'id_koleksi' => $this->request->getVar('koleksi'),
				'informasi' => $this->request->getVar('informasi'),
				'catatan' => $this->request->getVar('catatan'),
			];
			$this->LaporanModel->save($data);
			session()->setFlashdata('message_success', 'Laporan Kejadian Koleksi Berhasil Diupdate');
			return redirect()->to('/laporan');
		}
	}

	public function deleteLaporanKoleksi($id_laporan)
	{
		$laporan = $this->LaporanModel->getOneLaporan($id_laporan);

		if (empty($laporan)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data laporan tidak ditemukan.');
		}

		$userlaporan = $this->KoleksiModel->find($laporan['id_koleksi']);
		if ($userlaporan['id_user'] != user_id()) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data laporan tidak ditemukan.');
		}

		$this->LaporanModel->delete($id_laporan);
		session()->setFlashdata('message_success', 'Data Laporan Kejadian Berhasil Dihapus');
		return redirect()->back();
	}
}
