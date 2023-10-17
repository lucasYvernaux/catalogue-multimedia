<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Film::truncate();

        $csvData = fopen(public_path('film-export.csv'), 'r');

        $filmRow = true;
        while (($row = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$filmRow) {
                Film::create([
                        "type" => $row['0'],
                        "titre" => $row['1'],
                        "duree" => $row['2'],
                        "genres" => $row['3'],
                        "rangement" => $row['4'],
                        "nbreCD" => $row['5'] ?? '0',
                        "fonctionne" => $row['6'],
                        "titre_alternatif" => $row['7'],
                        "remarques" => $row['8']
                ]);
            }
            $filmRow = false;
        }

        fclose($csvData);
    }
}
