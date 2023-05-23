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
            <div class="card-white pd-30">
                <h2 class="mb-30 h4">Konsultasi</h2>
                <div class="pb-20">
                    <form action="{{ route('user.diagnosa.check') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <div class="col-sm-10">
                                <p>Silahkan pilih gejala yang sesuai dengan kondisi Anda saat ini</p>
                            </div>
                        </div>
                        <table class="table table-bordered custom-table" style="width: 100%;">
                            <colgroup>
                                <col span="1" style="width: 10%;">
                                <col span="1" style="width: 50%;">
                                <!-- <col span="1" style="width: 80%;"> -->
                                <col span="1" style="width: 10%;">
                            </colgroup>
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <!-- <th>Kode Gejala</th> -->
                                    <th>Nama Gejala</th>
                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data_gejala as $gejala)
                                    <tr>
                                        <td class="text-center">{{ $i }}</td>
                                        <!-- <td class="text-center">{{ $gejala['kode_gejala'] }}</td> -->
                                        <td>{{ $gejala['gejala'] }}</td>
                                        <td class="text-center">
                                            <input type="checkbox" class="form-check-input" name="resultGejala[]"
                                                value="{{ $gejala['kode_gejala'] }}"
                                                @if (is_array(old('resultGejala')) && in_array($gejala['kode_gejala'], old('resultGejala'))) checked @endif>
                                        </td>
                                    </tr>

                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>

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
            </div>
        </div>
    </div>
    <!-- multiple select row Datatable End -->
@endsection
