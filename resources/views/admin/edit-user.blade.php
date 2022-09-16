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
                        <h3 class="card-title">Edit User</h3>
                    </div>

                    <form method="POST" action="{{route('admin.user.update', $user->id)}}">
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
                                <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-7">
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Username</label>
                                <div class="col-sm-7">
                                    <input type="text" name="username" id="" class="form-control" value="{{$user->username}}" readonly="readonly">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="password" id="" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="password_confirmation" id="" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Hak Akses</label>
                                <div class="col-sm-7">
                                    <select name="role" class="form-select" required >
                                        <option value="" disabled selected>--Pilih Hak Akses--</option>
                                        @foreach(App\Models\Role::all() as $role)
                                        <option value="{{$role->id}}" <?= $user->role_id == $role->id ? 'selected' : '' ; ?> >{{$role->role}}</option>
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