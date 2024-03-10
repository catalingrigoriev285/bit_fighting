@extends('dashboard.body')

@section('content')
    <div class="container my-5">
        @include('dashboard.partials.header')
        <div class="d-flex gap-3 mt-3">
            @include('dashboard.partials.aside')
            <main class="w-75 bg-body-tertiary rounded p-3">
                <h3>Welcome back, {{auth()->user()->name}}</h3>
            </main>
        </div>
    </div>
@endsection