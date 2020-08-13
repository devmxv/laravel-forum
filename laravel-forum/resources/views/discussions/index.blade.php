@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('discussions.create') }}" class="btn btn-success">Add discussion</a>

</div>
@foreach($discussions as $discussion)
<div class="card">
  <div class="card-header">{{ $discussion->title}}</div>

  <div class="card-body">
    {!! $discussion->content  !!}
  </div>

</div>

@endforeach

{{ $discussions->links() }}
@endsection