@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - {{ $callProgram->program_kelas }} Class</title>
@endsection

@section('meta')
	<meta name="title" content="Sportopia {{ $callProgram->program_kelas }} Class">
	<meta name="description" content="Sportopia - {{ $callProgram->program_kelas }} : {{ strip_tags(Str::words($callProgram->deskripsi_program, 30)) }}">
	<meta name="keywords" content="Sportopia {{ $callProgram->program_kelas }}, {{ $callProgram->program_kelas }}, Art, Games, Education, Sports" />
@endsection

@section('head-style')
	<link rel="stylesheet" type="text/css" href="{{ asset(mix('amadeo/css/mix/reguler-index.css')) }}">
@endsection

@section('body-content')
	<?php // banner wrapper ?>
	<div id="banner">
		<div class="banner-content" style="background-image: url('{{ asset('amadeo/images/class/'.$callProgram->img_banner) }}');"></div>
	</div>
	<?php // index and description wrapper ?>
	<div id="iad" class="setup-wrapper">
		<div class="setup-content lar-wd">
			<div id="index-wrapper">
				<label>
					<a href="{{ Route('frontend.home') }}">
						Home
					</a>
				</label>
				<label>
					<a href="{{ Route('frontend.program.index', ['slug' => $callProgram->slug]) }}">
						{{ $callProgram->program_kelas }} Class
					</a>
				</label>
			</div>
			<h1>
				{{ $callProgram->program_kelas }} Class
			</h1>
			<h1>
				{!! $callProgram->quotes_program !!}
			</h1>
			<h3>
				{!! $callProgram->deskripsi_program !!}
			</h3>
		</div>
	</div>
	<?php // sport wrapper ?>
	<div id="index" class="setup-wrapper">
		<div class="setup-content lar-wd">
		@foreach($callClass as $list)
			<a href="{{ route('frontend.class.view', ['slug'=> $list->kategori_slug, 'subslug' => $list->kelas_slug]) }}">
				<div class="index-wrapper">
					<div class="img-back" style="background-image: url('{{ asset('amadeo/images/class/'.$list->img_url) }}');">
						<div class="img-description-wrapper">
							<img src="{{ asset('amadeo/main-image/icon-circle.png') }}">
							<h2>{{ $list->nama_kelas }}</h2>
							<p>{{ Str::words($list->deskripsi_kelas, 25, ' ...') }}</p>
						</div>
					</div>
				</div>
			</a>
		@endforeach
			<div class="clearfix"></div>
		</div>
	</div>
@endsection

@section('footer-script')
	<script src="{{ asset(mix('amadeo/js/mix/default-public.js')) }}"></script>
@endsection
