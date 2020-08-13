@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Discussion</div>

                <div class="card-body">
                  <form action="{{ route('discussions.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="">
                    </div>
                    <div class="form-group">
                      <label for="content">Content</label>
                      <input id="content" type="hidden" name="content">
                      <trix-editor input="content"></trix-editor>
                    </div>
                    <div class="form-group">
                      <label for="channel">Channel</label>
                      <select name="channel" id="channel" class="form-control">
                        @foreach($channels as $channel)
                          <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <button type="submit" class="btn btn-success">Create Discussion</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.css" integrity="sha512-qjOt5KmyILqcOoRJXb9TguLjMgTLZEgROMxPlf1KuScz0ZMovl0Vp8dnn9bD5dy3CcHW5im+z5gZCKgYek9MPA==" crossorigin="anonymous" />
@endsection

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix-core.js" integrity="sha512-Bc0tcenDX+c0B1lvTXLZBU2NraxlJyjfEh23g/0tTibP1cvmO2WRUZBpND9gidRmhm3M3/FCd6t+xgsAMC7L7A==" crossorigin="anonymous"></script>
@endsection
