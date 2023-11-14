<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Katana')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="{{asset('images/logo/white.png')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="{{ asset('css/toastr.css') }}" />
	@stack("stylesheets")
	<link rel="stylesheet" href="{{asset('css/katana.css')}}" />
</head>

<body>
	@routes
    @includeIf('_partials.navbar')

	@if(!View::hasSection('home-section'))
    	@includeIf("_partials.home-section")
	@else
		@yield("home-section")
	@endif

    @yield('content')

    {{-- footer --}}

	@if(!View::hasSection("footer"))
		@includeIf('_partials.footer')
	@else
	@yield("footer")
	@endif


	<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

	{{-- loader && scripts --}}
	@hasSection ('partial_script')
		@yield('partial_script')		
	@else
	@includeIf('_partials.script')
	@endif
		


	{{-- include the toast session message --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/js/all.min.js" integrity="sha512-MNA4ve9aW825/nbJKWOW0eo0S5f2HWQYQEIw4TkgLYMgqk88gHpSHJuMkJhYMQWKE7LmJMBdJZMs5Ua19QbF8Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="{{asset('js/app.js')}}"></script>
	{{-- <script src="{{asset('flag-icons-main/j')}}"></script> --}}
	@stack("scripts")
	<script type="text/javascript" src="{{ asset('js/toastr.js') }}"></script>
	@includeIf("_partials.session_messages")

</body>


</html>
