<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\WajibPajak;

class WajibPajakController extends Controller
{
    public function index()
    {
        //
        $data = DB::table('wajib_pajak')
                    ->join('jenis_pelayanan', 'wajib_pajak.id_pelayanan', '=', 'jenis_pelayanan.id')
                    ->join('status_files', 'wajib_pajak.id_status', '=', 'status_files.id')
                    ->select('wajib_pajak.*', 'jenis_pelayanan.nama_pelayanan', 'status_files.status')
                    ->get();
        return view('pegawai.index-berkas', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create-doc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_pelayanan' => 'required|unique:wajib_pajak',
        ]);

        WajibPajak::create([
            'no_pelayanan' => $request['no_pelayanan'],
            'nama_wp' => $request['nama_wp'],
            'no_hp' => $request['no_hp'],
            'alamat_pemohon' => $request['alamat_pemohon'],
            'alamat_objek_pajak' => $request['alamat_objek_pajak'],
            'luas_tanah' => $request['luas_tanah'],
            'luas_bangunan' => $request['luas_bangunan'],
            'id_pelayanan' => $request['jenis_pelayanan'],
        ]);
        
        return redirect()->back()->with('message', 'Berkas wajib pajak berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = WajibPajak::Find($id); 
        return view('pegawai.edit-doc', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $dataWP = WajibPajak::Find($request['no_pelayanan']);
        $dataWP->id_status = (int)$request['status'];
        $dataWP->save();
        return redirect()->back()->with('message', 'Status No. Pelayanan: '.$request['no_pelayanan'] .' berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WajibPajak::where('no_pelayanan', $id)->delete();
        return redirect()->back()->with('message', 'Data No. Pelayanan: '.$id .' berhasil di hapus!');
    }

    public function updateData(Request $request)
    {
        $dataWP = WajibPajak::Find($request['no_pelayanan']);
        $dataWP->nama_wp = $request['nama_wp'];
        $dataWP->no_hp = $request['no_hp'];
        $dataWP->alamat_pemohon = $request['alamat_pemohon'];
        $dataWP->alamat_objek_pajak = $request['alamat_objek_pajak'];
        $dataWP->luas_tanah =$request['luas_tanah'];
        $dataWP->luas_bangunan = $request['luas_bangunan'];
        $dataWP->id_pelayanan = $request['jenis_pelayanan'];

        $dataWP->save();
        return redirect()->back()->with('message', 'Status No. Pelayanan: '.$request['no_pelayanan'] .' berhasil di update!');

    }
}
