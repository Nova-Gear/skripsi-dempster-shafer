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
                            <li class="breadcrumb-item active"><a href="{{ route('riwayat.index') }}">Riwayat</a></li>
                            <li class="breadcrumb-item" aria-current="page">Index</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- multiple select row Datatable start -->
        <div class="page-header mb-30">
            <div class="pb-20">
                <table class="data-table table hover">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">No</th>
                            <th>Nama Pasien</th>
                            <th>Hasil Diagnosa</th>
                            <th>Solusi</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat as $dr => $data)
                            <tr>
                                <td class="table-plus">{{ $loop->iteration }}</td>
                                <td>{{ $data->user->name }}</td>
                                <td>
                                    @php
                                        $diagnosa = json_decode($data->diagnosa);
                                        $persentase_penyakit = $diagnosa->persentase_penyakit;
                                    @endphp
                                    Pasien terindikasi {{ $persentase_penyakit }} terkena penyakit <b>
                                        {{ $data->penyakit->penyakit }} </b>
                                </td>
                                <td>
                                    <ul>
                                        @foreach (json_decode($data->penyakit->solusi) as $item)
                                            <li>- {{ $item }}</li>
                                        @endforeach
                                    </ul>

                                </td>
                                <td>
                                    <a href="{{ route('riwayat.show', $data->id) }}" class="btn btn-custom-2">
                                        <i class="fas fa-eye me-1"></i>
                                        Lihat Data
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- multiple select row Datatable End -->
@endsection
