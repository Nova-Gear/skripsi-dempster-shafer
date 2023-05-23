@extends('layouts.MasterView')
@section('menu_riwayat_diagnosa', 'active')
@section('content')
    <div>
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Data Riwayat Diagnosa</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.diagnosa.riwayat') }}">Data Riwayat
                                    Diagnosa</a></li>
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
                            <th>Kode Penyakit</th>
                            <th>Nama Penyakit</th>
                            <th>Persentase</th>
                            <th>Solusi</th>
                            <th class="datatable-nosort">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat_diagnosa as $value)
                            <tr>
                                <td class="table-plus">{{ $loop->iteration }}</td>
                                <td>{{ $value['kode_penyakit'] }}</td>
                                <td>{{ $value['nama_penyakit'] }}</td>
                                <td>{{ $value['presentase'] }}</td>
                                <td>
                                    <ul>
                                    @foreach (json_decode($value['solusi']) as $item)
                                        <li>- {{ $item }}</li>
                                    @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a class="dropdown-item" href="{{ route('user.diagnosa.hasil', $value['id']) }}"><i
                                            class="dw dw-eye"></i> View</a>
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
