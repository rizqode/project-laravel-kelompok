<?php

namespace Database\Seeders;

use App\Models\Categori;
use App\Models\Paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori1 = Categori::firstOrCreate([
            'nama' => 'Wisuda',
            'foto_path' => 'gallery/4.jpg',
        ]);

        $kategori2 = Categori::firstOrCreate([
            'nama' => 'Prewed',
            'foto_path' => 'gallery/1.jpg',
        ]);

        // Tambah paket untuk kategori 1
        Paket::create([
            'nama' => 'Paket A - Reguler',
            'deskripsi' => 'Deskripsi untuk paket reguler A',
            'harga' => 75000,
            'durasi' => '30 menit',
            'fasilitas' => '3 pose|2 background|3 file edit',
            'foto' => 'gallery/1.jpg',
            'categori_id' => $kategori1->id,
        ]);

        Paket::create([
            'nama' => 'Paket B - Reguler',
            'deskripsi' => 'Deskripsi untuk paket reguler B',
            'harga' => 95000,
            'durasi' => '45 menit',
            'fasilitas' => '5 pose|3 background|5 file edit',
            'foto' => 'gallery/2.jpg',
            'categori_id' => $kategori1->id,
        ]);

        // Tambah paket untuk kategori 2
        Paket::create([
            'nama' => 'Paket C - Premium',
            'deskripsi' => 'Deskripsi untuk paket premium',
            'harga' => 150000,
            'durasi' => '1 jam',
            'fasilitas' => '6 pose|3 background|5 file edit|2 cetak 20x30',
            'foto' => 'gallery/3.jpg',
            'categori_id' => $kategori2->id,
        ]);
    }
}
