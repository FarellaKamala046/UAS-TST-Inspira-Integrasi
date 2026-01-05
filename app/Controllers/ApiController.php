<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ApiController extends Controller
{
    public function getAllLooks()
    {
        $db = \Config\Database::connect();
        
        $looks = $db->table('looks')->get()->getResultArray();

        foreach ($looks as &$look) {
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

    public function getLookDetail($id)
    {
        $db = \Config\Database::connect();
        
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