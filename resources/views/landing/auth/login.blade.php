@extends('landing.body')

@section('content')
    <div class="d-flex flex-column text-center mt-5">
        <h1>Bit Fighting</h1>
        <p>ASSIST Tech Challenge</p>
        <div class="d-flex flex-column gap-3 mx-auto w-25 my-3">
            {{ html()->form('POST', '/auth/login')->open() }}

            <div class="form-floating mb-3">
                {{ html()->email('email')->id('email')->class('form-control')->placeholder('name@example.com') }}
                {{ html()->label('Email address', 'email') }}
            </div>

            <div class="form-floating mb-3">
                {{ html()->password('password')->id('password')->class('form-control')->placeholder('example password') }}
                {{ html()->label('Password', 'password') }}
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ html()->submit('Sign In')->class('btn btn-primary w-100') }}
            {{ html()->form()->close() }}
            <a href="{{ route('landing.index') }}" class="btn btn-outline-primary">Return back</a>
        </div>
    </div>
@endsection
