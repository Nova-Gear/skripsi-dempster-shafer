<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
    {{-- <meta http-equiv="refresh" content="3" /> --}}
	<title>Puerca</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="200x200" href="{{asset('vendors/images/round-2.png')}}">
	<link rel="icon" type="image/png" sizes="35x35" href="{{asset('vendors/images/round-2.png')}}">
	<link rel="icon" type="image/png" sizes="20x20" href="{{asset('vendors/images/round-2.png')}}">

	<!-- Select2 CSS -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/jquery-steps/jquery.steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/switchery/switchery.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/style.css')}}">

	<!-- Icon -->
	<script src="https://kit.fontawesome.com/c30569f13c.js" crossorigin="anonymous"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
    {{-- JS Filter --}}
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- End JS Filter --}}
    @livewireStyles
</head>
<style>
.be-comment-block {
    border: 1px solid #edeff2;
    border-radius: 2px;
    padding: 10px 30px;
    border:1px solid #ffffff;
}

.be-img-comment {
    width: 60px;
    height: 60px;
    float: left;
    margin-bottom: 15px;
}

.be-ava-comment {
    width: 60px;
    height: 60px;
    border-radius: 50%;
}

	</style>

<body>

	{{--  Header  --}}
    @include('layouts.header')

	{{--  Setting Tema  --}}
    @include('layouts.SettingTema')

	{{--  Sidebar  --}}
    @include('layouts.sidebar')

	<div class="main-container">
		<div class="pd-ltr-20">

            {{--  Content  --}}
            @yield('content')

			{{--  Footer  --}}
            @include('layouts.footer')
		</div>
	</div>
    {{--  Alert  --}}
    @include('sweetalert::alert')
	
</body>
</html>
