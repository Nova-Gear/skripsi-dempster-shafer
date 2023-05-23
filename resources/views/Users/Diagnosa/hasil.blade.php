@extends('layouts.MasterView')
@section('menu_diagnosa', 'active')
@section('content')
    <div>
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Data Diagnosa</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="{{ route('user.diagnosa.index') }}">Diagnosa</a></li>
                            <li class="breadcrumb-item" aria-current="page">Index</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- multiple select row Datatable start -->
        <div class="page-header mb-30">
            <h2 class="mb-30 h4">Hasil Diagnosa</h2>
            <div class="container-fluid">
                <h6 class="text-custom">*) Detail Pasien</h6>
                <table class="table table-bordered custom-table" style="width: 100%">
                    <colgroup>
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 85%;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td>Nama Pasien</td>
                            <td>{{ $hasil_diagnosa->user->name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="container-fluid">
                <h6 class="text-custom">*) Gejala yang dialami</h6>
                <table class="table table-bordered custom-table" style="width: 100%">
                    <colgroup>
                        <col span="1" style="width: 3%;">
                        <col span="1" style="width: 12%;">
                        <col span="1" style="width: 85%;">
                    </colgroup>
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Kode Gejala</th>
                            <th>Nama Gejala</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($hasil_diagnosa->diagnosa->gejala_penyakit as $gejala)
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td class="text-center">{{ $gejala->kode_gejala }}</td>
                                <td>{{ $gejala->nama_gejala }}</td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="container-fluid">
                <h6 class="text-custom">*) Detail Penyakit</h6>
                <table class="table table-bordered custom-table" style="width: 100%">
                    <colgroup>
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 5%;">
                        <col span="1" style="width: 80%;">
                    </colgroup>
                    <tr>
                        <td>Nama Penyakit</td>
                        <td class="text-center">:</td>
                        <td class="fw-bold">
                            {{ $hasil_diagnosa->diagnosa->nama_penyakit }}
                        </td>
                    </tr>
                    <tr>
                        <td>Persentase dan Nilai Kepercayaan</td>
                        <td class="text-center align-middle">:</td>
                        <td class="align-middle">{!! '<b>' .
                            $hasil_diagnosa->diagnosa->persentase_penyakit .
                            '</b>' .
                            ' / (' .
                            $hasil_diagnosa->diagnosa->nilai_belief .
                            ')' !!}</td>
                    </tr>
                </table>
            </div>

            <div class="container-fluid">
                <h6 class="text-custom">*) Solusi Penyakit</h6>
                <table class="table table-bordered custom-table" style="width: 100%">
                    <tbody>

                        <tr>
                            <td>
                                <ul>
                                    @foreach (json_decode($hasil_diagnosa->penyakit->solusi) as $item)
                                        <li>- {{ $item }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4 text-center">
                        <a href="{{ url()->previous() }}" type="button" class="btn" data-bgcolor="#3b5998"
                            data-color="#ffffff">
                            <i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- multiple select row Datatable End -->
@endsection
