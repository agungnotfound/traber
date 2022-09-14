<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusFileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_files')->insert([
            ["status"=>"Pending"],
            ["status"=>"Syarat tidak terpenuhi"],
            ["status"=>"Berkas diterima"],
            ["status"=>"Dibuatkan NoPel"],
            ["status"=>"Validasi Berkas oleh pendata"],
            ["status"=>"Telah disetujui oleh K.UPT"],
            ["status"=>"Proses oleh BAPENDA"],
            ["status"=>"SPPT sudah tercetak"],
        ]);
    }
}
