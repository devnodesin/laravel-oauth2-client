@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1>Welcome to {{ config('app.name') }}</h1>
            
            @guest
                <div class="mt-4">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                        Login with OAuth2 Server
                    </a>
                </div>
            @else
                <div class="mt-4">
                    <a href="{{ url('dashboard') }}" class="btn btn-success btn-lg">
                        Go to Dashboard
                    </a>
                </div>
            @endguest
        </div>
    </div>
@endsection