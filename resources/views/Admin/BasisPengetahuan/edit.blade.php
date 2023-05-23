@extends('layouts.MasterView')
@section('menu_data_basis_pengetahuan', 'active')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Edit Data Basis Pengetahuan</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('basis_pengetahuan.index') }}">Data Basis
                                Pengetahuan</a></li>
                        <li class="breadcrumb-item" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <i class="icon-copy fa fa-pencil-square-o fa-3x" aria-hidden="true"></i>
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
        <form method="POST" action="{{ route('basis_pengetahuan.update', $basis_pengetahuan->id) }}" id="myForm"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="kode_penyakit" class="col-sm-12 col-md-2 col-form-label text-white">Kode Penyakit</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" id="kode_penyakit" name="kode_penyakit">
                        <option disabled>Pilih Kode Penyakit</option>
                        @foreach ($data_penyakit as $penyakit)
                            @if (old('kode_penyakit') == $penyakit->kode_penyakit)
                                <option value="{{ $penyakit->kode_penyakit }}" selected>
                                    {{ $penyakit->kode_penyakit . ' - ' . $penyakit->penyakit }}</option>
                            @else
                                <option value="{{ $penyakit->kode_penyakit }}">
                                    {{ $penyakit->kode_penyakit . ' - ' . $penyakit->penyakit }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="kode_gejala" class="col-sm-12 col-md-2 col-form-label text-white">Kode Gejala</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" id="kode_gejala" name="kode_gejala">
                        <option disabled>Pilih Kode Gejala</option>
                        @foreach ($data_gejala as $gejala)
                            @if (old('kode_gejala') == $gejala->gejala)
                                <option value="{{ $gejala->kode_gejala }}" selected>
                                    {{ $gejala->kode_gejala . ' - ' . $gejala->gejala }}</option>
                            @else
                                <option value="{{ $gejala->kode_gejala }}">
                                    {{ $gejala->kode_gejala . ' - ' . $gejala->gejala }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="densitas" class="col-sm-12 col-md-2 col-form-label text-white">Densitas</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="number" name="densitas" id="densitas" aria-describedby="densitas"
                        placeholder="0.5" step="0.1" min="0.1" max="1.0" value="{{ $basis_pengetahuan->densitas}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <a href="{{ route('basis_pengetahuan.index') }}" type="button" class="btn" data-bgcolor="#3b5998"
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
