@extends('layouts.MasterView')
@section('menu_user', 'active')
@section('content')
    <div>
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Data User</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
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
                            <a class="btn btn-success" href="{{ route('user.create') }}"> Create Data </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-20">
                <table class="data-table table hover nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $us => $data)
                            <tr>
                                <td class="table-plus">{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->username }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->role }}</td>
                                <td>

                                    <form action="{{ route('user.destroy', $data->id) }}" method="POST">
                                        <a class="dropdown-item" href="{{ route('user.show', $data->id) }}"><i
                                                class="dw dw-eye"></i> View</a>
                                        <a class="dropdown-item" href="{{ route('user.edit', $data->id) }}"><i
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
