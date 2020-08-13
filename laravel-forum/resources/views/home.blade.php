@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('discussions.create') }}" class="btn btn-success">Add discussion</a>

</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
