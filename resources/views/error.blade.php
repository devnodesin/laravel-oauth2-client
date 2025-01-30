@extends('layouts.app')

@section('content')
    <div class="alert alert-danger">
        <h4 class="alert-heading">Error</h4>
        <p>{{ $message ?? 'An error occurred.' }}</p>
        <hr>
        <a href="{{ url('/') }}" class="btn btn-outline-danger">Return Home</a>
    </div>
@endsection