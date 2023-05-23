@extends('layouts.MasterView')
@section('menu_user', 'active')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Show Detail User</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                        <li class="breadcrumb-item" aria-current="page">Show</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="product-wrap">
        <div class="product-detail-wrap mb-30">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-detail-desc pd-20 card-box height-100-p">
                        <div class="row">
                            <div class="col-md-4" style="display: flex; align-items: center; justify-content: center;">


                                <img height="350" width="350"
                                    @if ($user->gambar) src="{{ asset('images/' . $user->gambar) }}" @endif
                                    class="mx-auto">
                            </div>
                            <div class="col-md-8">
                                <form>
                                    <div class="form-group row" style="padding-left: 25px">
                                        <label for="name"
                                            class="col-sm-10 col-md-3 col-form-label text-white">Nama</label>
                                        <div class="col-md-8 col-sm-12">
                                            <input class="form-control" type="text" name="name" id="name"
                                                value="{{ $user->name }}" aria-describedby="name"
                                                placeholder="Disabled input" disabled="">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="padding-left: 25px">
                                        <label for="username"
                                            class="col-sm-10 col-md-3 col-form-label text-white">Username</label>
                                        <div class="col-md-8 col-sm-12">
                                            <input class="form-control" type="text" name="username" id="username"
                                                value="{{ $user->username }}" aria-describedby="username"
                                                placeholder="Disabled input" disabled="">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="padding-left: 25px">
                                        <label for="email"
                                            class="col-sm-10 col-md-3 col-form-label text-white">Email</label>
                                        <div class="col-md-8 col-sm-12">
                                            <input class="form-control" type="email" name="email" id="email"
                                                value="{{ $user->email }}" aria-describedby="email"
                                                placeholder="Disabled input" disabled="">
                                        </div>
                                    </div>
                                    <div class="form-group row" style="padding-left: 25px">
                                        <label for="role"
                                            class="col-sm-10 col-md-3 col-form-label text-white">Role</label>
                                        <div class="col-md-8 col-sm-12">
                                            <input class="form-control" type="text" name="role" id="role"
                                                value="{{ $user->role }}" aria-describedby="role"
                                                placeholder="Disabled input" disabled="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12 mt-2">
                                <a href="{{ route('user.index') }}" type="button" class="btn btn-lg btn-block"
                                    data-bgcolor="rgb(40 94 138)" data-color="#ffffff">
                                    <i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
