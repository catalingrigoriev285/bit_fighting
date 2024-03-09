@extends('landing.body')

@section('content')
    <div class="d-flex flex-column text-center mt-5">
        <h1>Bit Fighting</h1>
        <p>ASSIST Tech Challenge</p>
        
        <div class="d-flex gap-3 mx-auto">
            <a href="{{ route('landing.login')}}" class="btn btn-primary">Sign In</a>
            <a href="{{ route('landing.register')}}" class="btn btn-primary">Create an account</a>
        </div>
    </div>
@endsection