@extends('dashboard.body')

@section('content')
    {{ auth()->user()->name}}
    <a href="{{ route('auth.logout')}} ">logout</a>
@endsection