@extends('layouts.MasterView')
@section('menu_data_penyakit', 'active')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Tambah Penyakit</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{ route('penyakit.index') }}">Penyakit</a></li>
                        <li class="breadcrumb-item" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <i class="icon-copy dw dw-add-file-1 fa-3x" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <!-- Default Basic Forms Start -->
    <div class="pd-20 card-box mb-30">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('penyakit.store') }}" id="myForm" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="kode_penyakit" class="col-sm-12 col-md-2 col-form-label text-white">Kode Penyakit</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="kode_penyakit" id="kode_penyakit"
                        aria-describedby="kode_penyakit" placeholder="C01">
                </div>
            </div>
            <div class="form-group row">
                <label for="penyakit" class="col-sm-12 col-md-2 col-form-label text-white">Nama Penyakit</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="penyakit" id="penyakit" placeholder="Covid">
                </div>
            </div>
            <!----
                <div class="form-group row">
                    <label for="solusi" class="col-sm-12 col-md-2 col-form-label text-white">Solusi</label>
                    <div class="col-sm-12 col-md-10">
                        <textarea class="form-control" name="solusi" id="solusi" rows="4" placeholder=""></textarea>
                    </div>
                </div>
            ---->
            <div class="form-group row">
                <label for="solusi" class="col-sm-12 col-md-2 col-form-label text-white">Solusi</label>
                <div class="col-sm-12 col-md-10" id="containerSolusi">
                    <button class="btn btn-custom-2 mb-2" type="button" onclick="addInput('solusi');"
                        style="color:white; padding-left:0px;">
                        <i class="fas fa-plus me-1"></i>
                        Tambah Solusi
                    </button>
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi" class="col-sm-12 col-md-2 col-form-label text-white">Deskripsi</label>
                <div class="col-sm-12 col-md-10">
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" placeholder=""></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <a href="{{ route('penyakit.index') }}" type="button" class="btn" data-bgcolor="#3b5998"
                        data-color="#ffffff">
                        <i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i>
                        Kembali
                    </a>

                    <div class="pull-right">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Default Basic Forms End -->
@endsection
