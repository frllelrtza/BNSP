@extends('layouts.auth')
@section('content')

<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container-xl">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            {{-- Error Alert --}}
                            @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{session('error')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <div class="card-header justify-content-between">
                                <div class="row">
                                    <div class="col-6 ">
                                        <h3 class="fw-bolder mt-5 align-items-start">Login</h3>
                                    </div>
                                    <div class="col-6 ">
                                        <img class="align-items-end" src="../assets/landing/img/gallery/logo.png" class="img-responsive img-body" height="80px">
                                </div>
                            </div>
                            </div>
                            <div class="card-body">
                                <form action="{{url('proses_login')}}" method="POST" id="logForm">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        @error('login_gagal')
                                            {{-- <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> --}}
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{-- <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span> --}}
                                                <span class="alert-inner--text"><strong>Warning!</strong>  {{ $message }}</span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                            <label for="inputEmailAddress" class="form-label">Username</label>
                                        <input
                                            class="form-control py-4 mb-4"
                                            id="inputEmailAddress"
                                            name="username"
                                            type="text"
                                            placeholder="Masukkan Username"/>
                                        @if($errors->has('username'))
                                        <span class="error">{{ $errors->first('username') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="inputPassword">Password</label>
                                        <input
                                            class="form-control py-4"
                                            id="inputPassword"
                                            type="password"
                                            name="password"
                                            placeholder="Masukkan Password"/>
                                        @if($errors->has('password'))
                                        <span class="error">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div
                                        class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        {{-- <a class="small" href="#">Forgot Password?</a> --}}
                                            <button class="btn w-100 btn-primary btn-block btn-login" type="submit">Login</button>
                                       
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small">
                                    {{-- <a href="{{route('register')}}">Belum Punya Akun? Daftar!</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</div>
@endsection