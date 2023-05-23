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
                            <li class="breadcrumb-item active"><a href="{{ route('penyakit.index') }}">Penyakit</a></li>
                            <li class="breadcrumb-item" aria-current="page">Index</li>
                        </ol>
                    </nav>
                </div>
                <!-- <div class="col-md-6 col-sm-12 text-right">
                        <a href="#" type="button" class="btn btn-primary" data-toggle="dropdown" data-color="#ffffff">
                            <i class="icon-copy fa fa-download" aria-hidden="true"></i>
                            Report Download
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('/laporan/pelabuhan') }}">PDF</a>
                            <a class="dropdown-item" href="{{ url('/laporan/pelabuhan/excel') }}">Excel</a>
                        </div>
                    </div> -->
            </div>
        </div>

        <!-- multiple select row Datatable start -->
        <div class="page-header mb-30">
            <div class="pb-20">
                <div class="header-left">
                    <div>
                        <div class="col-md-40 col-sm-12 text-right">
                            <a class="btn btn-success" href="{{ route('penyakit.create') }}">Tambah Data</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-20">
                <table class="data-table table hover">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">No</th>
                            <th>Kode Penyakit</th>
                            <th>Nama Penyakit</th>
                            <th>Solusi</th>
                            <th>Deskripsi</th>
                            <th class="datatable">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penyakit as $dp => $data)
                            <tr>
                                <td class="table-plus">{{ $loop->iteration }}</td>
                                <td>{{ $data->kode_penyakit }}</td>
                                <td>{{ $data->penyakit }}</td>
                                <td>
                                    <ul>
                                        @foreach (json_decode($data->solusi) as $item)
                                            <li>- {{ $item }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $data->deskripsi }}</td>
                                <td>

                                    <form action="{{ route('penyakit.destroy', $data->id) }}" method="POST">
                                        <a class="dropdown-item" href="{{ route('penyakit.edit', $data->id) }}"><i
                                                class="dw dw-edit2"></i> Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item"
                                            onclick="return confirm('Anda yakin ingin meghapus data ini ?')" type="submit">
                                            <i class="dw dw-delete-3"></i> Delete
                                    </form>
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
