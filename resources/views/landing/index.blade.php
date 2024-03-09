@extends('landing.body')

@section('content')
    <div class="d-flex flex-column text-center mt-5">
        <h1>Bit Fighting</h1>
        <p>ASSIST Tech Challenge</p>
        
        <div class="d-flex gap-3 mx-auto">
            @if (Auth::check())
                <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Dashboard</a>
            @else
                <a href="{{ route('landing.login') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('landing.register') }}" class="btn btn-primary">Register</a>
            @endif
        </div>
    </div>
@endsection