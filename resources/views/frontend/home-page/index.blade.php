@extends('frontend._layouts.basic')

@section('head-title')
	<title>Sportopia</title>
@endsection

@section('meta')
	<meta name="title" content="Sportopia">
	@if($callAbout != null)
		<meta name="descriptions" content="Sportopia - {{ strip_tags(Str::words($callAbout->deskripsi_tentang, 40)) }}">
	@endif
	<meta name="keywords" content="Sportopia, Sport, Art, Games, Education" />
@endsection

@section('head-style')
	<link rel="stylesheet" type="text/css" href="{{ asset(mix('amadeo/css/mix/home.css')) }}">
	@foreach($callKelasKategori as $list)
		@foreach($callClass as $listSub)
			@if($list->id == $listSub->id_kelas_kategori)
			@endif
		@endforeach
	@endforeach
	<style type="text/css">
	@foreach($callKelasKategori as $list)
		#{{ Str::slug($list->kategori_kelas, '-') }}-card-img{
			animation: {{ Str::slug($list->kategori_kelas, '-') }}-card-img-animate 25s infinite;
			-webkit-animation: {{ Str::slug($list->kategori_kelas, '-') }}-card-img-animate 25s infinite;
		}
		@keyframes {{ Str::slug($list->kategori_kelas, '-') }}-card-img-animate{
			0%
		    {
		    	background-image : 
				url('{{ asset('amadeo/images/class/'.$list->img_thumb) }}')
			}
			@php ($countPercent = 0)
			@foreach($callClass as $listSub)
				@if($list->id == $listSub->id_kelas_kategori)
					@php ($countPercent = $countPercent + 1)
					@if($countPercent == 4)
					@break
					@endif
				@endif
			@endforeach
			@php ($percent = 0)
			@foreach($callClass as $listSub)
				@if($list->id == $listSub->id_kelas_kategori)
					@php ($percent = $percent + (100/$countPercent))
					{{$percent}}%
					{
						background-image : 
						url('{{ asset('amadeo/images/class/'.$listSub->img_url) }}')
					}
					@if($percent == 100)
					@break
					@endif
			    @endif
			@endforeach
			@if($countPercent == 0 && $percent == 0)
			100%
		    {
		    	background-image : 
				url('{{ asset('amadeo/images/class/'.$list->img_thumb) }}')
			}
			@endif
		}
		@-webkit-keyframes {{ Str::slug($list->kategori_kelas, '-') }}-card-img-animate{
			0%
		    {
		    	background-image : 
				url('{{ asset('amadeo/images/class/'.$list->img_thumb) }}')
			}
			@php ($countPercent = 0)
			@foreach($callClass as $listSub)
				@if($list->id == $listSub->id_kelas_kategori)
					@php ($countPercent = $countPercent + 1)
					@if($countPercent == 4)
					@break
					@endif
				@endif
			@endforeach
			@php ($percent = 0)
			@foreach($callClass as $listSub)
				@if($list->id == $listSub->id_kelas_kategori)
					@php ($percent = $percent + (100/$countPercent))
					{{$percent}}%
					{
						background-image : 
						url('{{ asset('amadeo/images/class/'.$listSub->img_url) }}')
					}
					@if($percent == 100)
					@break
					@endif
			    @endif
			@endforeach
			@if($countPercent == 0 && $percent == 0)
			100%
		    {
		    	background-image : 
				url('{{ asset('amadeo/images/class/'.$list->img_thumb) }}')
			}
			@endif
		}
	@endforeach
	</style>
@endsection

@section('body-content')
	<?php // category card layout wrapper ?>
	<div id="cards" class="setup-wrapper">
		<div class="setup-content lar-wd">
			@foreach($callKelasKategori as $list)
			<div class="bar bar-size-5 card">
				<div class="card-wrapper">
					<div id="{{ Str::slug($list->kategori_kelas, '-') }}-card-img" class="card-img"></div>
					<div class="screen"></div>
					<div class="card-wrapper-icon">
						<a href="{{ Route('frontend.class.index', ['slug' => $list->slug]) }}">
							<div class="icon-content">
								<div class="icon">
									<img src="{{ asset('amadeo/main-image/kelas-kategori/white/'.strtolower($list->kategori_kelas).'.png') }}">
								</div>
								<div class="icon">
									{{ $list->kategori_kelas }}
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			@endforeach
			<div class="clearfix"></div>
		</div>
	</div>
	<?php // description wrapper ?>
	<div id="description" class="setup-wrapper">
		<div class="setup-content lar-wd">
			<div class="text-center">
				<h2><label>Think</label> <label>Smart</label> <label>and</label> <label>Healthy</label> <label>Life</label></h2>
				<p>Lorem ipsum dolor sit amet, sit in aliquip discere. Soluta facilis duo eu. Novum laudem accusamus nam ad, duo nihil iriure malorum an. Vim graeco consequat ex. In vim nusquam percipit antiopam, epicurei officiis mediocritatem ne duo.</p>
				<a class="btn btn-green larg-1 open-form-class">
					Free Trial Class
				</a>
			</div>
		</div>
	</div>
	<?php // class wrapper ?>
	<div id="class" class="setup-wrapper">
		<div class="setup-content nor-wd">
			@foreach($callKelasProgram as $list)
			<div class="bar bar-size-3">
				<div class="class">
					<div class="class-wrapper">
						<a href="{{ Route('frontend.program.index', ['slug' => $list->slug]) }}">
							<div class="img" style="background-image: url('{{ asset('amadeo/images/class/'.$list->img_thumb)}}')"></div>
						</a>
						<h2>{{ $list->program_kelas }} Class</h2>
					</div>
				</div>
			</div>
			@endforeach
			<div class="bar bar-size-3">
				<div class="class">
					<div class="class-wrapper">
						<a href="{{ Route('frontend.member.log-in') }}">
							<div class="img" style="background-image: url('{{ asset('amadeo/main-image/member-thum.jpg')}}')"></div>
						</a>
						<h2>Member Area</h2>
					</div>
				</div>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
@endsection

@section('footer-script')
	<script src="{{ asset(mix('amadeo/js/mix/default-public.js')) }}"></script>
@endsection