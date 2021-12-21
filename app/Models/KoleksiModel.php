<?php

namespace App\Models;

use CodeIgniter\Model;

class KoleksiModel extends Model
{
    protected $table = 'koleksi';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_user', 'id_kategori', 'nama', 'slug', 'pengarang', 'tahun_terbit', 'penerbit',
        'status', 'jumlah', 'tag', 'foto1', 'foto2', 'foto3', 'foto4', 'foto5', 'deskripsi', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function getKoleksiUser($id_user, $slug = false)
    {
        if ($slug == false) {
            return $this->join('kategori_koleksi', 'kategori_koleksi.id = koleksi.id_kategori')
                ->where(['id_user' => $id_user])
                ->orderBy('koleksi.created_at', 'DESC')
                ->find();
        }

        return $this->join('kategori_koleksi', 'kategori_koleksi.id = koleksi.id_kategori')
            ->where(['slug' => $slug])->first();
    }

    public function getAllKoleksi()
    {
        return $this->join('kategori_koleksi', 'kategori_koleksi.id = koleksi.id_kategori')
            ->orderBy('koleksi.created_at', 'DESC')->find();
    }

    public function deleteKoleksi($slug)
    {
        return $this->where('slug', $slug)->delete();
    }

    public function getOneKoleksi($slug)
    {
        return $this->where(['slug' => $slug])->first();
    }

    public function serachKoleksi($keywords, $kategori)
    {
        if ($kategori == 'all') {
            return $this->join('kategori_koleksi', 'kategori_koleksi.id = koleksi.id_kategori')
                ->join('users', 'users.id = koleksi.id_user')
                ->like('nama', $keywords)
                ->orLike('tag', $keywords);
        } else {
            return $this->join('kategori_koleksi', 'kategori_koleksi.id = koleksi.id_kategori')
                ->join('users', 'users.id = koleksi.id_user')
                ->where('id_kategori', $kategori)
                ->like('nama', $keywords)
                ->orLike('tag', $keywords);
        }
    }

    public function detailKoleksi($slug)
    {
        return $this->join('kategori_koleksi', 'kategori_koleksi.id = koleksi.id_kategori')
            ->join('users', 'users.id = koleksi.id_user')
            ->where(['slug' => $slug])->first();
    }

    public function getLimitKoleksi($id_user = false)
    {
        if ($id_user == false) {
            return $this->join('kategori_koleksi', 'kategori_koleksi.id = koleksi.id_kategori')
                ->orderBy('koleksi.created_at', 'DESC')
                ->limit(4)
                ->find();
        }
        return $this->join('kategori_koleksi', 'kategori_koleksi.id = koleksi.id_kategori')
            ->where(['id_user' => $id_user])
            ->orderBy('koleksi.created_at', 'DESC')
            ->limit(4)
            ->find();
    }
}
