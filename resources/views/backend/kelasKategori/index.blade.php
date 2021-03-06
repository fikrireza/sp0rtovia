@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Class Category</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('kelasKategori.index') }}" class="current">Class Category</a>
  </div>
  <h1>Class Category</h1>
</div>
@endsection

@section('content')

  <div id="modal-unpublish" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Unpublish Class Category</h3>
    </div>
    <div class="modal-body">
      <p>Are you sure to un publish this class category ?</p>
    </div>
    <div class="modal-footer">
      <a class="btn btn-danger" id="setUnpublish">Unpublish</a>
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
  </div>

  <div id="modal-publish" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Publish Class Category</h3>
    </div>
    <div class="modal-body">
      <p>Are you sure to publish this class category ?</p>
    </div>
    <div class="modal-footer">
      <a class="btn btn-success" id="setPublish">Publish</a>
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
  </div>


<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Class Category</h5>
    @if ($getKelasKategori->count() < 5)
    <a href="{{ route('kelasKategori.tambah') }}" class="btn btn-primary pull-right"><i class="icon-plus"></i> Add</a>
    @endif
  </div>
  <div class="widget-content nopadding" style="overflow-x:auto;">
    <table class="table table-bordered kelasKategori-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Class</th>
          <th>Quotes</th>
          <th>Description</th>
          <th>Image</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($getKelasKategori as $key)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $key->kategori_kelas }}</td>
          <td>{!! $key->quotes_kategori !!}</td>
          <td>{!! $key->deskripsi_kategori !!}</td>
          <td><img src="{{ asset('amadeo/images/class').'/'.$key->img_banner }}" alt="{{ $key->img_banner_alt}}"></td>
          <td>@if ($key->flag_publish == 1)
            <a href="" class="unpublish" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-unpublish"><span class="label label-success tip-top" data-original-title="Publish"><i class="icon icon-thumbs-up"></i></span></a>
          @else
            <a href="" class="publish" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-publish"><span class="label label-important tip-top" data-toggle="tooltip" data-placement="top" title="Unpublish"><i class="icon icon-thumbs-down"></i></span></a>
          @endif</td>
          <td><a href="{{ route('kelasKategori.edit').'/'.$key->id }}"><span class="label label-warning tip-top" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon icon-pencil"></i> Edit</span></a></td>
        </tr>
        @php
          $no++;
        @endphp
        @endforeach
      </tbody>
    </table>
  </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
  $('.kelasKategori-table').dataTable({
    "bFilter": false,
    "bPaginate": false,
    "bInfo": false
  });
</script>

<script type="text/javascript">
$(function(){
  $('a.unpublish').click(function(){
    var a = $(this).data('value');
    $('#setUnpublish').attr('href', "{{ url('/') }}/admin/class-category/publish/"+a);
  });

  $('a.publish').click(function(){
      var a = $(this).data('value');
      $('#setPublish').attr('href', "{{ url('/') }}/admin/class-category/publish/"+a);
    });
});
</script>

@if(Session::has('berhasil'))
<script type="text/javascript">
  $.gritter.add({
    title:	'Success',
    text:	'{{ Session::get('berhasil') }}',
    sticky: false
  });
</script>
@endif
@endsection
