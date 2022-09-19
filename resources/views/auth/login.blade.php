@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <div class="login-box">
                <div class="card">
                    <div class="card-body login-card-body">
                        <img src="{{asset('img/user.webp')}}" style="width:70px; margin-left: auto;margin-right: auto; display:block; margin-top:-50px;" class="text-center" alt="">
                        <p class="login-box-msg">Login</p>
                        @if(Session::has('error'))
                        <div class="alert alert-danger text-center">
                            {{Session::get('error')}}
                        </div>
                        @endif
                        <form action="{{ route('login') }}" method="POST">
                        @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Username" name="username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <!-- <div class="col-8"></div> -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </div>

                            </div>
                            <br>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
@endsection
