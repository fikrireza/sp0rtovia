@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Free Trial Register</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="" class="current">Free Trial Register</a>
  </div>
  <h1>Free Trial Register</h1>
</div>
@endsection

@section('content')

  {{-- <div id="modal-unpublish" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Unpublish Social Media</h3>
    </div>
    <div class="modal-body">
      <p>Are you sure to un publish this social media ?</p>
    </div>
    <div class="modal-footer">
      <a class="btn btn-danger" id="setUnpublish">Unpublish</a>
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
  </div>

  <div id="modal-publish" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Publish Social Media</h3>
    </div>
    <div class="modal-body">
      <p>Are you sure to publish this social media ?</p>
    </div>
    <div class="modal-footer">
      <a class="btn btn-success" id="setPublish">Publish</a>
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
  </div>
 --}}

<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Free Trial Register
  </div>
  <div class="widget-content" style="overflow-x:auto;">
    <table class="table table-bordered free-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Class Course</th>
          <th>Program</th>
          <th>Name</th>
          <th>Telp</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($getFree as $key)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $key->kelas->nama_kelas }}</td>
          <td>{{ $key->kelas->kelasProgram->program_kelas }}</td>
          <td>{{ $key->nama }}</td>
          <td>{{ $key->telp }}</td>
          <td>{{ $key->email }}</td>
          <td>{{ $key->subjek }}</td>
          <td>{{ $key->pesan }}</td>
          <td>{{ $key->created_at }}</td>
          <td><a href="{{ route('socmed.edit').'/'.$key->id }}"><span class="label label-warning tip-top" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon icon-pencil"></i> Edit</span></a></td>
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
$('.free-table').dataTable({
  "bJQueryUI": true,
  "sPaginationType": "full_numbers",
  "sDom": '<""l>t<"F"fp>',
  "iDisplayLength": 100,
  "ordering": false,
});

// $(function(){
//   $('a.unpublish').click(function(){
//     var a = $(this).data('value');
//     $('#setUnpublish').attr('href', "{{ url('/') }}/admin/social-media/publish/"+a);
//   });
//
//   $('a.publish').click(function(){
//       var a = $(this).data('value');
//       $('#setPublish').attr('href', "{{ url('/') }}/admin/social-media/publish/"+a);
//     });
// });
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