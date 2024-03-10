@extends('dashboard.body')

@section('content')
    <div class="container my-5">
        @include('dashboard.partials.header')
        <div class="d-flex gap-3 mt-3">
            @include('dashboard.partials.aside')
            <main class="w-75 bg-body-tertiary rounded p-3">
                <h3 class="mb-3">Configuration member</h3>
                <p class="mb-3">You can configure the member by changing the name and email.</p>
                {{-- succes message  --}}
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                {{-- error message --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{ html()->form('POST', route('dashboard.members.update', $organization_member->id))->open() }}
                <div class="d-flex gap-3 mb-3">
                    <div class="form-floating w-50">
                        {{ html()->text('name')->class('form-control')->placeholder('Name')->attribute('value', $organization_member->name) }}
                        {{ html()->label('Name', 'name') }}
                    </div>
                    <div class="form-floating w-50">
                        {{ html()->email('email')->class('form-control')->placeholder('Email')->attribute('value', $organization_member->email) }}
                        {{ html()->label('Email', 'email') }}
                    </div>
                </div>
                <div class="d-flex gap-3 justify-content-between mb-3">
                    <h4>Skills</h4>

                <select class="form-select" id="user_skills" name="skills[]" multiple="multiple">
                    @foreach($skills as $skill)
                        <option value="{{$skill->skill}}" @if(in_array($skill->skill, json_decode($organization_member->skills))) selected @endif>{{$skill->skill}}</option>
                    @endforeach
                </select>
                </div>

                <div class="d-flex justify-content-end">
                    {{ html()->submit('Update')->class('btn btn-primary') }}
                </div>
                {{ html()->form()->close() }}
            </main>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#user_skills').select2();
        });
    </script>
@endsection
