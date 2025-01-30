@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
            <h2>Welcome, {{ Auth::user()->name }}</h2>
            <div class="mt-3">
                <p>Email: {{ Auth::user()->email }}</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
@endsection