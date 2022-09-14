<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['role'=> 'Admin', 'role_slug'=>'admin'],
            ['role'=> 'Pegawai', 'role_slug'=>'pegawai'],
            ['role'=> 'KUPT', 'role_slug'=>'kupt'],
        ]);
    }
}
