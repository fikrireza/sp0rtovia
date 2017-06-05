@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Member</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('member.index') }}" class="current">Member</a>
  </div>
  <h1>Member</h1>
</div>
@endsection

@section('content')


<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Member</h5>
    <a href="{{ route('member.tambah') }}" class="btn btn-primary pull-right"><i class="icon-plus"></i> Add</a>
  </div>
  <div class="widget-content" style="overflow-x:auto;">
    <table class="table table-bordered member-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Member Code</th>
          <th>Member</th>
          <th>Kid</th>
          <th>Email</th>
          <th>Join Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($getMember as $key)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $key->kode_member }}</td>
          <td>{{ $key->nama_member }}</td>
          <td></td>
          <td>{{ $key->email }}</td>
          <td>{{ $key->tanggal_gabung }}</td>
          <td><a href="" class="editMember" data-toggle="modal" data-target="#editFasilitas" data-value="{{$key->id}}"><span class="label label-warning tip-top" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon icon-pencil"></i> Edit</span></a></td>
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
  $('.member-table').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers",
    "sDom": '<""l>t<"F"fp>',
    "iDisplayLength": 100
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