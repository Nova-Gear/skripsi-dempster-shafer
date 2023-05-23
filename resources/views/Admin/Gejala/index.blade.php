@extends('layouts.MasterView')
@section('menu_data_gejala', 'active')
@section('content')
    <div>
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Data Gejala</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('gejala.index') }}">Data Gejala</a></li>
                            <li class="breadcrumb-item" aria-current="page">Index</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- multiple select row Datatable start -->
        <div class="page-header mb-30">
            <div class="pb-20">
                <div class="header-left">
                    <div class="">
                        <div class="col-md-40 col-sm-12 text-right">
                            <a class="btn btn-success" href="{{ route('gejala.create') }}"> Create Data </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-20">
                <table class="data-table table hover">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">No</th>
                            <th>Kode Gejala</th>
                            <th>Gejala</th>
                            <th class="datatable-nosort">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gejala as $dg => $data)
                            <tr>
                                <td class="table-plus">{{ $loop->iteration }}</td>
                                <td>{{ $data->kode_gejala }}</td>
                                <td>{{ $data->gejala }}</td>
                                <td>
                                    <form action="{{ route('gejala.destroy', $data->id) }}" method="POST">
                                        {{-- <a class="dropdown-item" href="{{ route('gejala.show', $data->id) }}"><i class="dw dw-eye"></i> View</a> --}}
                                        <a class="dropdown-item" href="{{ route('gejala.edit', $data->id) }}"><i
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
