<?php

namespace App\Http\Controllers\Kupt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WajibPajak;

class DashboardController extends Controller
{
    public function index()
    {
        $objekPajakBaru = WajibPajak::where('id_pelayanan', 1)->count() ;
        $mutasiHabis = WajibPajak::where('id_pelayanan', 2)->count() ;
        $mutasiSebagian = WajibPajak::where('id_pelayanan', 3)->count() ;
        $pembetulan = WajibPajak::where('id_pelayanan', 4)->count() ;

        return view('kupt.dashboard', compact('objekPajakBaru', 'mutasiHabis','mutasiSebagian','pembetulan'));
    }
}
