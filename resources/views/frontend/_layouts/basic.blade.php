<!DOCTYPE html>
<html>
<head>

	<link rel="icon" type="image/png" href="{{ asset('amadeo/main-image/logo-green-sportopia.png') }}" />
	<link rel="image_src" href="{{ asset('amadeo/main-image/logo-green-sportopia.png') }}" />
	@yield('head-title')

	<meta charset="utf-8">
	<meta http-equiv="Content-Language" content="{{ App::getLocale() }}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	@yield('meta')

	<meta name="google-site-verification" content="WoEFPm5mEA4IkWE-EDSpSDrG7zg1ETt3LppVMm5Y5Mg" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="robots" content="index, follow" />
	<meta name="googlebot" content="all" />

    @yield('head-style')
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/font/font.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}">
	

</head>
<body>

	@include('frontend._include.navigasi-bar')
	@yield('body-content')
	@include('frontend._include.footer')
	@yield('footer-script')

</body>
</html>
