<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Diagnosa</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="200x200" href="{{ asset('vendors/images/round-2.png') }}">
    <link rel="icon" type="image/png" sizes="35x35" href="{{ asset('vendors/images/round-2.png') }}">
    <link rel="icon" type="image/png" sizes="20x20" href="{{ asset('vendors/images/round-2.png') }}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/jquery-steps/jquery.steps.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/switchery/switchery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">

</head>

<body class="diagnosa">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="" style="padding-left: 50px;">
                <img src="{{ asset('vendors/images/logo-puerca.png') }}" alt=""
                    style="height:75px; padding-top:5px; padding-bottom:5px;">
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="{{ url('/') }}" class="micon dw dw-home"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="register-page-wrap d-flex flex-wrap justify-content-center">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center" style="height: 80vh">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                    <div class="card-white pd-30">
                        <h2 class="mb-30 h4">Hasil Diagnosa</h2>
                        <div class="pb-20">
                            <form action="{{ route('diagnosa.check') }}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="nama_pasien" class="col-sm-2 col-form-label text-custom">Nama
                                        pasien</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('nama_pasien') is-invalid @enderror"
                                            id="nama_pasien" name="nama_pasien" value="{{ old('nama_pasien') }}">
                                        @error('nama_pasien')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
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
                                                    <input type="checkbox" class="form-check-input"
                                                        name="resultGejala[]" value="{{ $gejala['kode_gejala'] }}"
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
        </div>
    </div>
    {{--  Alert  --}}
    @include('sweetalert::alert')
</body>

</html>
