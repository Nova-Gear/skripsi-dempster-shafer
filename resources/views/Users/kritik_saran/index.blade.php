@extends('layouts.MasterView')
@section('menu_komentar', 'active')
@section('content')
    <div>
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Data Komentar</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('komentar.index') }}">Data Komentar</a></li>
                            <li class="breadcrumb-item" aria-current="page">Index</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="page-header mb-20">
            <h2 class="mb-30 h4">Kritik & Saran ({{ $kritik_saran->count() }})</h2>

            <div class="card-white pd-30 mb-3">
                <form method="POST" action="{{ route('user.komentar.store') }}" id="myForm">
                    @csrf
                    <div class="form-group row">
                        <label for="nama" class="col-sm-12 col-md-2 col-form-label">Nama</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="nama" id="nama" aria-describedby="nama"
                                placeholder="John">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="komentar" class="col-sm-12 col-md-2 col-form-label">Saran & Masukan</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea class="form-control" name="komentar" id="komentar" rows="4" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="pull-right">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            @foreach ($kritik_saran as $comment => $komen)
                <div class="card-white pd-30 mb-3">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="be-img-comment" style="display: flex; align-items: center; width:auto;">
                                @php
                                    $i = rand(1, 6);
                                    $avatar_name = 'avatar' . $i . '.png';
                                @endphp
                                <img src="https://bootdey.com/img/Content/avatar/{{ $avatar_name }}" alt=""
                                    class="be-ava-comment">
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                <span>{{ $komen->nama }}</span>
                            </div>
                        </div>
                        <div class="col">

                            <blockquote class="blockquote mb-0">

                                <p>{{ $komen->komentar }}</p>
                                <footer class="blockquote-footer"><i class="fa fa-clock-o"></i> <cite
                                        title="Source Title">{{ $komen->created_at }}</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
