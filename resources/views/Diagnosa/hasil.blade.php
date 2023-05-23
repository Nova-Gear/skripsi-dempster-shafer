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
                        <h2 class="mb-20 h4">Hasil Diagnosa</h2>
                        <div class="pb-20">
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
                                                <td>{{ $result['namaPasien'] }}</td>
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
                                            @foreach ($result['Gejala_Penyakit'] as $gejala)
                                                <tr>
                                                    <td class="text-center">{{ $i }}</td>
                                                    <td class="text-center">{{ $gejala['kode_gejala'] }}</td>
                                                    <td>{{ $gejala['nama_gejala'] }}</td>
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
                                                {{ $result['Nama_Penyakit'] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Persentase dan Nilai Kepercayaan</td>
                                            <td class="text-center align-middle">:</td>
                                            <td class="align-middle">{!! '<b>' . $result['Persentase_Penyakit'] . '</b>' . ' / (' . $result['Nilai_Belief_Penyakit'] . ')' !!}</td>
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
                                                        @foreach (json_decode($result['Solusi_Penyakit']) as $item)
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
                                            <a href="{{ route('diagnosa') }}" type="button"
                                                class="btn btn-sm btn-primary">
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
