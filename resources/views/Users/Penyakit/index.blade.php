@extends('layouts.MasterView')
@section('menu_data_penyakit', 'active')
@section('content')
    <div>
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Data Penyakit</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="{{ route('user.penyakit.index') }}">Penyakit</a></li>
                            <li class="breadcrumb-item" aria-current="page">Index</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- multiple select row Datatable start -->
        <div class="page-header mb-30">
            <div class="pb-20">
                @foreach ($data_penyakit->groupBy('kode_penyakit') as $kode_penyakit => $group)
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $group->first()->penyakit }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <b>Solusi</b> <br>
                                    <ul>
                                        @foreach (json_decode($group->first()->solusi) as $item)
                                            <li>- {{ $item }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <b>Gejala</b> <br>
                                    <ul>

                                        @foreach ($group as $item)
                                            <li>- {{ $item->gejala }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
    <!-- multiple select row Datatable End -->
@endsection
