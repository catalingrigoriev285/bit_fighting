@extends('dashboard.body')

@section('content')
    <div class="container my-5">
        @include('dashboard.partials.header')
        <div class="d-flex gap-3 mt-3">
            @include('dashboard.partials.aside')
            <main class="w-75 bg-body-tertiary rounded p-3">
                <h3 class="mb-3">Organization skills</h3>
                <p class="mb-3">You can create skills that will be used to categorize your projects.</p>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                {{-- Add a new skill --}}
                {{ html()->form('POST', route('dashboard.skills.store'))->open() }}
                <div class="input-group mb-3">
                    {{ html()->text('skill_name')->id('skill_name')->class('form-control')->placeholder('Skill name') }}
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
                {{ html()->form()->close() }}
                {{-- List of skills --}}
                @if (isset($skills) && count($skills) > 0)
                    <div class="alert alert-primary" role="alert">
                        Total skills: {{ count($skills) }}
                    </div>
                    <ul class="list-group">
                        @foreach ($skills as $skill)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>{{ $skill->skill }}</span>
                                    <a href="{{ route('dashboard.skills.remove', $skill->id) }}" class="btn btn-danger"
                                        style="height: fit-content;">Remove</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    @if (!session('success'))
                        <div class="alert alert-warning" role="alert">
                            No skills found
                        </div>
                    @endif
                @endif
            </main>
        </div>
    </div>
@endsection
