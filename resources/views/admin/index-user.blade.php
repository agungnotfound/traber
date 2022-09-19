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
                        <h3 class="card-title">Management User</h3>
                    </div>

                    <div class="card-body">
                        <!-- <div class="form-group">
                            <a href="{{route('admin.user.create')}}" class="btn btn-primary"> Tambah Berkas</a>
                        </div> -->
                        @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Hak Akses</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->username}}</td>
                                    <td>{{$row->role}}</td>
                                    <td>
                                        <a href="{{route('admin.user.edit', [$row->id])}}" title="Edit"><i
                                                class="fa fa-pencil-alt fa-lg"></i></a> |
                                        <a href="{{route('admin.user.destroy', [$row->id])}}"
                                            data-href="{{route('admin.user.destroy', [$row->id])}}" class="openConfirm"
                                            title="Delete" data-id="{{$row->id}}" data-toggle="modal"
                                            data-target="#delete-user"><i class="fa fa-trash fa-lg"></i></a>
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
<div class="modal fade" id="delete-user" tabindex="-1" role="dialog" aria-labelledby="deleteUserLabel"
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
                Apakah Anda Yakin menghapus User ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-danger btn-sure">Delete</a>
            </div>
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
</script>
@endsection