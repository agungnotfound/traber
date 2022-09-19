@extends('layouts.template')
@section('sidemenu')
@include('layouts.sidemenu')
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Management Berkas</h3>
                    </div>

                    <div class="card-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <div class="form-group">
                        <a href="{{route('admin.wajib-pajak.create')}}" class="btn btn-primary">Tambah Berkas</a>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama WP</th>
                                    <th>No. Pelayanan</th>
                                    <th>Alamat Pemohon</th>
                                    <th>Alamat Wajib Pajak</th>
                                    <th>No. HP</th>
                                    <th>Jenis Pelayanan</th>
                                    <th>Luas Tanah/Luas Bangunan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $row)
                                <tr>
                                    <td>{{$row->nama_wp}}</td>
                                    <td>{{$row->no_pelayanan}}</td>
                                    <td>{{$row->alamat_pemohon}}</td>
                                    <td>{{$row->alamat_objek_pajak}}</td>
                                    <td>{{$row->no_hp}}</td>
                                    <td>{{$row->nama_pelayanan}}</td>
                                    <td>{{$row->luas_tanah}}/{{$row->luas_bangunan}}</td>
                                    <td>{{$row->status}}</td>
                                    <td>
                                        <a href="{{route('admin.wajib-pajak.edit', $row->no_pelayanan)}}" title="Edit"><i class="fa fa-pencil-alt"></i></a>
                                        <a href="#" title="Update Status" class="openStatus" data-notes="{{$row->notes}}"
                                            data-no_pel="{{$row->no_pelayanan}}" data-toggle="modal"
                                            data-target="#updateStatus"><i class="fa fa-eye"></i></a>
                                        <a href="#" data-href="{{route('admin.wajib-pajak.destroy', $row->no_pelayanan)}}" class="openConfirm" title="Delete"
                                            data-toggle="modal" data-target="#delete-berkas"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
</section>

<!-- Modal -->
<div class="modal fade" id="delete-berkas" tabindex="-1" role="dialog" aria-labelledby="deleteUserLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserLabel">Konfirmasi Hapus User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin menghapus Data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="" class="btn btn-danger btn-sure">Delete</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateStatus" tabindex="-1" role="dialog" aria-labelledby="deleteUserLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserLabel">Update Status Berkas No Pelayanan:
                    <label for="" id="nopel"></label>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.wajib-pajak.update')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="no_pelayanan" id="no_pelayanan">
                        @foreach(App\Models\StatusFiles::all() as $status)
                        <div class="form-check">
                            <input type="radio" value="{{$status->id}}" name="status" class="form-check-input" id="">
                            <label for="" class="form-check-label">{{$status->status}}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="">Kendala pada berkas</label>
                        <input type="text" name="notes" class="form-control" id="notes" placeholder="masukan kendala berkas jika ada">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('data-tables')
@include('layouts.javascript')
@endsection
@section('custom-table')
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script>
<script>
$('.openConfirm').on('click', function(e) {
    var href = $(this).data('href')
    $('.btn-sure').attr('href', href)
});
$('.openStatus').on('click', function(e) {
    var nopel = $(this).data('no_pel')
    var note = $(this).data('notes')
    $('#nopel').text(nopel)
    $('#no_pelayanan').val(nopel)
    $('#notes').val(note)
});
</script>
@endsection