<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>SimocoRC</title>

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
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body class="login-page halaman">
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
    <div class="container" data-aos="zoom-in">
        <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
            <div class="container">
                <div class="d-flex justify-content-center align-items-center" style="height: 80vh">
                    <div class="login-box bg-white box-shadow border-radius-10" style="width: 40%">
                        <div class="login-title">
							<h2 class="text-center text-primary">Form Registrasi</h2>
						</div>
						<form class="form-wrap max-width-600 mx-auto" method="POST" action="{{ route('register') }}" id="myForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Nama*</label>
                                <div class="col-sm-9">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-3 col-form-label">Username*</label>
                                <div class="col-sm-9">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
							<div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email*</label>
                                <div class="col-sm-9">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Password*</label>
                                <div class="col-sm-9">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="form-group row" hidden>
                                <label for="role" class="col-sm-3 col-form-label">Role*</label>
                                <div class="col-sm-9">
                                    <select class="custom-select col-12" type="role" name="role" id="role">
                                        {{-- <option value="">Choose Role</option> --}}
                                        {{-- <option value="Administrator">Administrator</option> --}}
                                        <option value="Client">Client</option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> -->
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
                                        {{--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										 --}}
										<button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
									</div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR
                                    </div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block"
                                            href="{{ route('login') }}">Login</a>
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
    <!-- js -->
    <script src="{{ asset('vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
</body>

</html>
