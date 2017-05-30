@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Class Category</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('kelasKategori.index') }}">Class Category</a>
    <a href="" class="current">Edit Class Category</a>
  </div>
  <h1>Edit Class Category</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
      <h5>Edit Class Category</h5>
      <a href="{{ route('kelasKategori.index') }}" class="btn btn-inverse pull-right"><i class="icon-plus"></i> Back</a>
    </div>
  <div class="widget-content nopadding">
    <form class="form-horizontal" method="post" action="{{ route('kelasKategori.edit') }}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="control-group {{ $errors->has('kategori_kelas') ? 'error' : '' }}">
        <label class="control-label">Class Category *</label>
        <div class="controls">
          <input type="hidden" name="id" value="{{ $get->id }}">
          <input type="text" class="span6" name="kategori_kelas" value="{{ old('kategori_kelas', $get->kategori_kelas)}}" id="kategori_kelas">
        </div>
      </div>
      <div class="control-group {{ $errors->has('quotes_kategori') ? 'error' : '' }}">
        <label class="control-label">Quotes Category</label>
        <div class="controls">
          <textarea name="quotes_kategori" class="span6" id="quotes_kategori">{{ old('quotes_kategori', preg_replace('#<br\s*/?>#i', "\n", $get->quotes_kategori)) }}</textarea>
        </div>
      </div>
      <div class="control-group {{ $errors->has('deskripsi_kategori') ? 'error' : '' }}">
        <label class="control-label">Description Category</label>
        <div class="controls">
          <textarea name="deskripsi_kategori" class="span6" id="deskripsi_kategori">{{ old('deskripsi_kategori', preg_replace('#<br\s*/?>#i', "\n", $get->deskripsi_kategori)) }}</textarea>
        </div>
      </div>
      <div class="control-group {{ $errors->has('img_banner') ? 'error' : '' }}">
        <label class="control-label">Image Banner</label>
        <div class="controls">
          <input name="img_banner" class="span6" id="img_banner" type="file"  accept=".jpg, .png"/>
          <span>Width: 400px; Height: 400px</span>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <img src="{{ asset('amadeo/images/class').'/'.$get->img_banner }}" alt="">
        </div>
      </div>
      <div class="control-group {{ $errors->has('img_thumb') ? 'error' : '' }}">
        <label class="control-label">Image Thumbnail</label>
        <div class="controls">
          <input name="img_thumb" class="span6" id="img_thumb" type="file"  accept=".jpg, .png"/>
          <span>Width: 200px; Height: 200px</span>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <img src="{{ asset('amadeo/images/class').'/'.$get->img_thumb }}" alt="">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Publish</label>
        <div class="controls">
          <label>
            <input type="checkbox" name="flag_publish" class="span6" {{ ($get->flag_publish == 1) ? 'checked' : '' }}/>
          </label>
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" value="Submit" class="btn btn-success">
      </div>
    </form>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
  $('input[type=checkbox],input[type=radio],input[type=file]').uniform();
  $("#basic_validate").validate({
    ignore: [],
    rules:{
      kategori_kelas:{
        required:true,
      },
      quotes_kategori:{
        required:true,
      },
      deskripsi_kategori:{
        required:true,
      },
      img_banner:{
        accept:"png|jpe?g"
      },
      img_thumb:{
        accept:"png|jpe?g"
      },
    },
    errorClass: "help-inline",
    errorElement: "span",
    highlight:function(element, errorClass, validClass) {
      $(element).parents('.control-group').addClass('error');
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).parents('.control-group').removeClass('error');
      $(element).parents('.control-group').addClass('success');
    }
  });
</script>
@endsection