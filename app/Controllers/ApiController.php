<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ApiController extends Controller
{
    // API untuk mengambil semua data OOTD dari tabel 'looks'
    public function getAllLooks()
    {
        $db = \Config\Database::connect();
        
        // UBAH DISINI: Dari 'pins' menjadi 'looks'
        $looks = $db->table('looks')->get()->getResultArray();

        foreach ($looks as &$look) {
            // Cek apakah item_details ada dan merupakan string JSON
            if (isset($look['item_details']) && !empty($look['item_details'])) {
                $look['item_details'] = json_decode($look['item_details']);
            } else {
                $look['item_details'] = []; 
            }
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => $looks
        ]);
    }

    // API untuk mengambil 1 data spesifik berdasarkan ID
    public function getLookDetail($id)
    {
        $db = \Config\Database::connect();
        
        // UBAH DISINI: Dari 'pins' menjadi 'looks'
        $look = $db->table('looks')->where('id', $id)->get()->getRowArray();

        if ($look) {
            if (isset($look['item_details']) && !empty($look['item_details'])) {
                $look['item_details'] = json_decode($look['item_details']);
            }
            return $this->response->setJSON([
                'status' => 'success',
                'data'   => $look
            ]);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'OOTD tidak ditemukan'], 404);
    }
}