<?php

namespace App\Controllers;

use App\Models\KoleksiModel;
use App\Models\KategoriModel;
use App\Models\TagModel;
use App\Models\UserModel;
use App\Models\LaporanModel;

class Admin extends BaseController
{
	protected $KoleksiModel;
	protected $KategoriModel;
	protected $TagModel;
	protected $UserModel;
	protected $LaporanModel;
	public function __construct()
	{
		$this->KoleksiModel = new KoleksiModel();
		$this->KategoriModel = new KategoriModel();
		$this->TagModel = new TagModel();
		$this->UserModel = new UserModel();
		$this->LaporanModel = new LaporanModel();
	}

	public function index()
	{
		$info = [
			'user' => count($this->UserModel->findAll()),
			'koleksi' => count($this->KoleksiModel->getAllKoleksi()),
			'kategori' => count($this->KategoriModel->findAll()),
			'tag' => count($this->TagModel->findAll()),
		];
		$data = [
			'title' => 'Dashboard',
			'page' => 'admindashboard',
			'lastuser' => $this->UserModel->getLimitUser(),
			'lastkoleksi' => $this->KoleksiModel->getLimitKoleksi(),
			'box' => $info
		];
		// dd($data);
		return view('admin/dashboard', $data);
	}

	public function readKolektor()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('auth_groups');
		$groups = $builder->select('*')
			->get()->getResultArray();
		$kolektor = $this->UserModel->getKolektor();
		$data = [
			'title' => 'Data Kolektor',
			'page' => 'kolektor',
			'groups' => $groups,
			'kolektor' => $kolektor->paginate(9, 'users'),
			'pager' => $this->UserModel->pager,
		];
		// dd($data);
		return view('admin/kolektor/index', $data);
	}

	public function getOneKolektor()
	{
		$id_user = $this->request->getPost('id_user');
		$kolektor = $this->UserModel->getKolektor($id_user)->first();
		echo json_encode($kolektor);
	}

	public function manageKolektor()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('auth_groups_users');
		$builder->set('group_id', $this->request->getPost('group'))
			->where('user_id', $this->request->getPost('id_user'))
			->update();

		$data = [
			'id' => $this->request->getPost('id_user'),
			'active' => $this->request->getPost('active'),
		];
		$this->UserModel->save($data);
		session()->setFlashdata('message_success', 'Data Kolektor Berhasil Diupdate');
		return redirect()->back();
	}

	public function profileKolektor($id_user)
	{
		$user = $this->UserModel->find($id_user);
		$jmlKoleksi = $this->KoleksiModel->getKoleksiUser($id_user);
		$data = [
			'title' => 'Profil Kolektor',
			'page' => 'kolektor',
			'user' => $user->toArray(),
			'jmlkoleksi' => count($jmlKoleksi),
			'validation' => \Config\Services::validation(),
		];
		return view('admin/kolektor/profile', $data);
	}

	public function readKoleksi()
	{
		$koleksi = $this->KoleksiModel->getAllKoleksi();
		// dd($koleksi);
		$data = [
			'title' => 'Data Semua Koleksi',
			'page' => 'allkoleksi',
			'koleksi' => $koleksi
		];
		return view('koleksi/index', $data);
	}

	public function detailKoleksi($slug)
	{
		$koleksi = $this->KoleksiModel->getKoleksiUser(user()->id, $slug);
		if (empty($koleksi)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Koleksi tidak ditemukan.');
		}

		$id_koleksi = $this->KoleksiModel->getOneKoleksi($slug)['id'];
		$laporan = $this->LaporanModel->getLaporanKoleksi($id_koleksi);
		// dd($laporan);
		$data = [
			'title' => 'Detail Koleksi',
			'page' => 'allkoleksi',
			'koleksi' => $koleksi,
			'laporan' => $laporan
		];
		return view('koleksi/detail', $data);
	}

	public function readKategori()
	{
		$kategori = $this->KategoriModel->findAll();
		// dd($kategori);
		$data = [
			'title' => 'Kategori Koleksi',
			'page' => 'kategori',
			'kategori' => $kategori
		];
		return view('admin/kategori/index', $data);
	}

	public function saveKategori()
	{
		$data = [
			'kategori' => $this->request->getVar('kategori'),
		];
		$this->KategoriModel->save($data);
		session()->setFlashdata('message_success', 'Kategori Berhasil Ditambahkan');
		return redirect()->back();
	}

	public function getOneKategori()
	{
		$id_kategori = $this->request->getPost('id_kategori');
		$kategori = $this->KategoriModel->find($id_kategori);
		echo json_encode($kategori);
	}

	public function updateKategori()
	{
		$data = [
			'id' => $this->request->getPost('id_kategori'),
			'kategori' => $this->request->getVar('kategori'),
		];
		$this->KategoriModel->save($data);
		session()->setFlashdata('message_success', 'Kategori Berhasil Diupdate');
		return redirect()->back();
	}

	public function deleteKategori($id_kategori)
	{
		$kategori = $this->KategoriModel->find($id_kategori);

		if (empty($kategori)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data kategori tidak ditemukan.');
		}

		$this->KategoriModel->delete($id_kategori);
		session()->setFlashdata('message_success', 'Kategori Berhasil Dihapus');
		return redirect()->back();
	}
	public function readTag()
	{
		$tag = $this->TagModel->findAll();
		// dd($tag);
		$data = [
			'title' => 'Tag Koleksi',
			'page' => 'tag',
			'tag' => $tag
		];
		return view('admin/tag/index', $data);
	}

	public function saveTag()
	{
		$data = [
			'tag' => url_title($this->request->getVar('tag'), '-', true),
		];
		$this->TagModel->save($data);
		session()->setFlashdata('message_success', 'Tag Berhasil Ditambahkan');
		return redirect()->back();
	}

	public function getOneTag()
	{
		$id_tag = $this->request->getPost('id_tag');
		$tag = $this->TagModel->find($id_tag);
		echo json_encode($tag);
	}

	public function updateTag()
	{
		$data = [
			'id' => $this->request->getPost('id_tag'),
			'tag' => url_title($this->request->getVar('tag'), '-', true),
		];
		$this->TagModel->save($data);
		session()->setFlashdata('message_success', 'Tag Berhasil Diupdate');
		return redirect()->back();
	}

	public function deleteTag($id_tag)
	{
		$tag = $this->TagModel->find($id_tag);

		if (empty($tag)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tag tidak ditemukan.');
		}

		$this->TagModel->delete($id_tag);
		session()->setFlashdata('message_success', 'Tag Berhasil Dihapus');
		return redirect()->back();
	}
}
