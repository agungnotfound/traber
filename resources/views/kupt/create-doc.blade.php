@extends('layouts.template')
@section('sidemenu')
@include('layouts.sidemenu')
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- BEGIN FORM -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form Berkas Masuk</h3>
                    </div>

                    <form method="POST" action="{{route('kupt.wajib-pajak.store')}}">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                            @endif
                            <div class="form-group row">
                                <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Nama Wajib Pajak</label>
                                <div class="col-sm-7">
                                    <input type="text" name="nama_wp" class="form-control" id="exampleInputEmail1"
                                        placeholder="Masukan Nama Lengkap" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">No. Pelayanan</label>
                                <div class="col-sm-7">
                                    <input type="text" name="no_pelayanan" id="" class="form-control"
                                        placeholder="Nomor Pelayanan" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">No. Handphone</label>
                                <div class="col-sm-7">
                                    <input type="tel" name="no_hp" id="" class="form-control" placeholder="08131230000"
                                        required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Alamat Pemohon</label>
                                <div class="col-sm-7">
                                    <textarea name="alamat_pemohon" class="form-control" id="" rows="2"
                                        placeholder="Masukan Alamat Pemohon" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Alamat Objek Pajak</label>
                                <div class="col-sm-7">
                                    <textarea name="alamat_objek_pajak" class="form-control" id="" rows="2"
                                        placeholder="Masukan Alamat Objek Pajak" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Luas Tanah (M2)</label>
                                <div class="col-sm-7">
                                    <input type="text" name="luas_tanah" id="" class="form-control"
                                        placeholder="Luas tanah" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Luas Bangunan (M2)</label>
                                <div class="col-sm-7">
                                    <input type="text" name="luas_bangunan" id="" class="form-control"
                                        placeholder="Luas Bangunan" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Jenis Pelayanan</label>
                                <div class="col-sm-7">
                                    <select name="jenis_pelayanan" class="form-select" required>
                                        <option value="" disabled selected>--Pilih Jenis Pelayanan--</option>
                                        @foreach(App\Models\JenisPelayanan::all() as $pelayanan)
                                        <option value="{{$pelayanan->id}}">{{$pelayanan->nama_pelayanan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </form>

                </div>
                <!-- END FORM -->
            </div>
        </div>
    </div>
</section>
@endsection

@section('')
@endsection