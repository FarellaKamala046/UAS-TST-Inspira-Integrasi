<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Setup extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();
        $forge = \Config\Database::forge();

        // Hapus tabel lama jika ada
        $forge->dropTable('pins', true);
        $forge->dropTable('boards', true);

        // 1. Tabel Boards (Tanpa Created/Updated At)
        $db->query("CREATE TABLE boards (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            description TEXT,
            visibility TEXT DEFAULT 'public'
        )");

        // 2. Tabel Pins (Tanpa Created/Updated At)
        $db->query("CREATE TABLE pins (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            board_id INTEGER,
            image_url TEXT,
            source_url TEXT,
            title TEXT,
            category TEXT,
            tags TEXT,
            products TEXT,
            FOREIGN KEY (board_id) REFERENCES boards(id)
        )");

        return "✅ Database di-reset! Sekarang tabel bersih tanpa kolom timestamp.";
    }
}