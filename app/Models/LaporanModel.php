<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_koleksi', 'informasi', 'catatan', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function getLaporan($id_user = false)
    {
        if ($id_user == false) {
            return $this->join('koleksi', 'koleksi.id = laporan.id_koleksi')
                ->join('kategori_koleksi', 'kategori_koleksi.id = koleksi.id_kategori')
                ->orderBy('laporan.updated_at', 'DESC')
                ->find();
        }
        return $this->join('koleksi', 'koleksi.id = laporan.id_koleksi')
            ->join('kategori_koleksi', 'kategori_koleksi.id = koleksi.id_kategori')
            ->where(['id_user' => $id_user])
            ->orderBy('laporan.updated_at', 'DESC')
            ->find();
    }

    public function getLaporanKoleksi($id_koleksi)
    {
        return $this->where(['id_koleksi' => $id_koleksi])
            ->orderBy('updated_at', 'DESC')
            ->find();
    }

    public function getOneLaporan($id_laporan)
    {
        return $this->where(['id_laporan' => $id_laporan])
            ->first();
    }

    public function getLimitLaporan($id_user)
    {
        return $this->join('koleksi', 'koleksi.id = laporan.id_koleksi')
            ->join('kategori_koleksi', 'kategori_koleksi.id = koleksi.id_kategori')
            ->where(['id_user' => $id_user])
            ->orderBy('laporan.updated_at', 'DESC')
            ->limit(4)
            ->find();
    }
}
