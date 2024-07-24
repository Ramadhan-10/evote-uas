<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use App\Models\Paslon;

class KategoriPaslonSeeder extends Seeder
{
    public function run()
    {
        // Dummy data for categories
        $kategoris = [
            ['name' => 'Kategori 1'],
            ['name' => 'Kategori 2'],
            ['name' => 'Kategori 3'],
        ];

        // Create categories
        foreach ($kategoris as $kategoriData) {
            $kategori = Kategori::create($kategoriData);

            // Dummy data for paslons
            $paslons = [
                [
                    'name' => 'Paslon 1 for ' . $kategori->name,
                    'description' => 'Description for Paslon 1 in ' . $kategori->name,
                    'photo' => 'default.png',
                    'kategori_id' => $kategori->id
                ],
                [
                    'name' => 'Paslon 2 for ' . $kategori->name,
                    'description' => 'Description for Paslon 2 in ' . $kategori->name,
                    'photo' => 'default.png',
                    'kategori_id' => $kategori->id
                ],
                [
                    'name' => 'Paslon 3 for ' . $kategori->name,
                    'description' => 'Description for Paslon 3 in ' . $kategori->name,
                    'photo' => 'default.png',
                    'kategori_id' => $kategori->id
                ],
            ];

            // Create paslons for each category
            foreach ($paslons as $paslonData) {
                Paslon::create($paslonData);
            }
        }
    }
}
