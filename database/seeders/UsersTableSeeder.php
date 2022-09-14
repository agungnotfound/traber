<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pass = bcrypt('12345');
        $usersData = [
            ["name" => "Imam Sudrajat, SE", "username" => "imam","password" => $pass, "role_id" => 3],
            ["name" => "Asep Suhadi, SH, M.Si","username" => "asep","password" => $pass, "role_id" => 2],
            ["name" => "Dimyati, Spd","username" => "dimyati","password" => $pass, "role_id" => 2],
            ["name" => "Abdul Hakim, S.Ip","username" => "hakim","password" => $pass, "role_id" => 2],
            ["name" => "Rachmat Mulyawan, S.Ip","username" => "rachmat","password" => $pass, "role_id" => 2],
            ["name" => "H. Ahmad Hidayat","username" => "hidayat","password" => $pass, "role_id" => 2],
            ["name" => "Budi Satya Kurniawan","username" => "budi","password" => $pass, "role_id" => 2],
            ["name" => "Harteti Sagifariti","username" => "harteti","password" => $pass, "role_id" => 2],
            ["name" => "TB. Didi Sunardi","username" => "tb.didi","password" => $pass, "role_id" => 2],
            ["name" => "Ahmad Alawi","username" => "alawi","password" => $pass, "role_id" => 2],
            ["name" => "Arief Firmansyah, Ss","username" => "arief","password" => $pass, "role_id" => 2],
            ["name" => "Dita Indahsari, Spd","username" => "indah","password" => $pass, "role_id" => 1],
            ["name" => "Romi Alfasnyah, SE","username" => "romi","password" => $pass, "role_id" => 2],
            ["name" => "M. Tresna Meitriadi, Amd","username" => "tresna","password" => $pass, "role_id" => 2],
            ["name" => "Denok Sriwahyuni, SE","username" => "sriwahuyuni","password" => $pass, "role_id" => 2],
            ["name" => "Dadi Wijaya","username" => "dadi","password" => $pass, "role_id" => 2],
            ["name" => "Zaenal Abidin","username" => "zaenal","password" => $pass, "role_id" => 2],
            ["name" => "Abdul Oktavian","username" => "abdul","password" => $pass, "role_id" => 2],
            ["name" => "Fera Lailatul Fathiyah, SH","username" => "fera","password" => $pass, "role_id" => 2],
            ["name" => "Yudi Yudhari","username" => "yudi","password" => $pass, "role_id" => 2]
        ];

        DB::table('users')->insert($usersData);
    }
}
