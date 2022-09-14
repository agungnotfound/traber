<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelayananTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_pelayanan')->insert([
            ["nama_pelayanan"=>"Objek Pajak Baru"],
            ["nama_pelayanan"=>"Mutasi Habis"],
            ["nama_pelayanan"=>"Mutasi Sebagian"],
            ["nama_pelayanan"=>"Pembetulan"],
        ]);
    }
}
