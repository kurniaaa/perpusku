<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\KoleksiModel;

class Welcome extends BaseController
{
	protected $KategoriModel;
	protected $KoleksiModel;

	protected $db;
	protected $builder;
	public function __construct()
	{
		$this->KategoriModel = new KategoriModel();
		$this->KoleksiModel = new KoleksiModel();

		$this->db      = \Config\Database::connect();
		$this->builder = $this->db->table('koleksi');
	}

	public function index()
	{
		$data['title'] = 'Selamat Datang';
		$data['kategori'] = $this->KategoriModel->findAll();
		return view('welcome/index', $data);
	}
	public function contact()
	{
		$data['title'] = 'Contact Us';
		$data['kategori'] = $this->KategoriModel->findAll();
		return view('welcome/contact', $data);
	}
	public function search()
	{
		$keywords = $this->request->getGet('keywords');
		if ($this->request->getGet('kategori') == '') {
			$kategori = 'all';
		} else {
			$kategori = $this->request->getGet('kategori');
		}
		if ($keywords == '') {
			$hasilKoleksi = null;
		} else {
			$hasilKoleksi = $this->KoleksiModel->serachKoleksi($keywords, $kategori);
			// if ($kategori == 'all') {
			// 	$hasilKoleksi = $this->builder->select('*')
			// 		->join('kategori_koleksi', 'kategori_koleksi.id = koleksi.id_kategori')
			// 		->join('users', 'users.id = koleksi.id_user')
			// 		->like('nama', $keywords)
			// 		->orLike('tag', $keywords)
			// 		->get()
			// 		->getResultArray();
			// } else {
			// 	$hasilKoleksi = $this->builder->select('*')
			// 		->join('kategori_koleksi', 'kategori_koleksi.id = koleksi.id_kategori')
			// 		->join('users', 'users.id = koleksi.id_user')
			// 		->like('nama', $keywords)
			// 		->orLike('tag', $keywords)
			// 		->where('id_kategori', $kategori)
			// 		->get()
			// 		->getResultArray();
			// }
		}
		$data = [
			'title' => 'Cari Koleksi',
			'hasil' => $hasilKoleksi->paginate(9, 'hasil'),
			'pager' => $this->KoleksiModel->pager,
			'kategori' => $this->KategoriModel->findAll()
		];
		// dd($data);
		return view('welcome/search', $data);
	}

	public function detail($slug)
	{
		$koleksi = $this->KoleksiModel->detailKoleksi($slug);
		if (empty($koleksi)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Koleksi tidak ditemukan.');
		}
		// dd($koleksi);
		$data = [
			'title' => 'Detail Koleksi',
			'kategori' => $this->KategoriModel->findAll(),
			'koleksi' => $koleksi
		];
		return view('welcome/detail', $data);
	}
}
