@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            @include('partials.discussion-header')

            <div class="card-body">
              <div class="text-center">
                <strong>{{ $discussion->title }}</strong>
              </div>
              <hr>
              {!! $discussion->content !!}
            </>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
