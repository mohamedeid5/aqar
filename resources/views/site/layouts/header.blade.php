<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<link rel="icon" href="{{ !empty(settings()->icon)?Storage::url(settings()->icon):'' }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	 <link rel="stylesheet" type="text/css" href="{{ url('adminlte/jstree/themes/default/style.css') }}">
	@stack('css')
</head>
<body>
	
