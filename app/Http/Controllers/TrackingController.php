<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\WajibPajak;

class TrackingController extends Controller
{
    public function index()
    {
        return view('tracking');
    }

    public function show(Request $request)
    {
        $dataWP = DB::table('wajib_pajak')
                ->join('jenis_pelayanan', 'wajib_pajak.id_pelayanan', '=', 'jenis_pelayanan.id')
                ->join('status_files', 'wajib_pajak.id_status', '=', 'status_files.id')
                ->select('wajib_pajak.*', 'jenis_pelayanan.nama_pelayanan', 'status_files.status')
                ->where('no_pelayanan', $request['no_pelayanan'])
                ->first();
        if (empty($dataWP)) {
            return [
                'success' => false,
                'response' => 'Berkas Tidak Ditemukan!'
            ];
        } else {
            return [
                'success' => true,
                'response' => ['status'=> true, 'data' => $dataWP],
            ];
        }
        
    }
}