<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class NrcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = Storage::disk('local')->get('json/nrc.json');
        $nrcs = json_decode($json, true);

        // foreach ($nrcs as $nrc) {
        //     NRC::query()->updateOrCreate([
        //         'id' => $nrc['id'],
        //         'name_en' => $nrc['name_en'],
        //         'name_mm' => $nrc['name_mm'],
        //         'nrc_code' => $nrc['nrc_code'],
        //         'created_at' => $nrc['created_at'],
        //         'updated_at' => $nrc['updated_at'],
        //     ]);
        // }

    }
}
