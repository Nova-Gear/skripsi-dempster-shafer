@extends('layouts.MasterView')
@section('menu_riwayat', 'active')
@section('content')
<div>
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Data Riwayat</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="{{ url('/riwayat') }}">Riwayat</a></li>
                        <li class="breadcrumb-item" aria-current="page">Index</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


        <div class="card kartu-custom mb-3">
            <div class="card-body">
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
                                <td>{{ $namaPasien }}</td>
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
                            @foreach ($hasil_diagnosa->gejala_penyakit as $gejalaYangDipilih)
                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td class="text-center">{{ $gejalaYangDipilih->kode_gejala }}</td>
                                    <td>{{ $gejalaYangDipilih->nama_gejala }}</td>
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
                                {{ $hasil_diagnosa->nama_penyakit }}
                            </td>
                        </tr>
                        <tr>
                            <td>Persentase dan Nilai Kepercayaan</td>
                            <td class="text-center align-middle">:</td>
                            <td class="align-middle">{!! '<b>' . $hasil_diagnosa->persentase_penyakit . '</b>' . ' / (' . $hasil_diagnosa->nilai_belief . ')' !!}</td>
                        </tr>
                    </table>
                </div>

                <div class="container-fluid">
                    <h6 class="text-custom">*) Solusi Penyakit</h6>
                    <table class="table table-bordered custom-table" style="width: 100%">
                        <tbody>
                                <tr>
                                    @foreach (json_decode($solusi) as $item)
                                        <td>- {{ $item }}</td>
                                    @endforeach
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group row">
			<div class="col-sm-7">
                <div class="pull-right">
                    <a href="{{route('riwayat.index')}}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">
                        <i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i>
                        Kembali
                    </a>
                </div>
			</div>
		</div>
        </div>
        <br>
        </div>
    </div>
@endsection
