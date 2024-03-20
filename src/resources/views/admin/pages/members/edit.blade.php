@extends('admin.body')

@section('box-content')
    <div class="container-scroller">
        @include('admin.partials.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.partials.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $member->name }}</h4>
                                    <p class="card-description">
                                        Update member details
                                    </p>
                                    {{ html()->form('POST', route('admin.members.update', $member->id))->open() }}
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        {{ html()->text('name')->class('form-control')->placeholder('Name')->value($member->name) }}
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        {{ html()->email('email')->class('form-control')->placeholder('Email')->value($member->email) }}
                                    </div>

                                    {{-- Role --}}
                                    <div class="form-group">
                                        <label for="role">Roles</label>
                                        {{ html()->select('role', $roles)->class('form-control')->value($member->roles->pluck('id'))->multiple() }}
                                    </div>

                                    {{-- Skills --}}
                                    <div class="form-group">
                                        <label for="skills">Skills</label>
                                        {{ html()->select('skills', $skills)->class('form-control')->value($member->skills->pluck('id'))->multiple() }}
                                    </div>


                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <a href="{{ route('admin.members.destroy', $member->id) }}"
                                        class="btn btn-danger">Remove</a>
                                    {{ html()->form()->close() }}
                                    @if ($errors->any())
                                        <div class="alert alert-danger mt-3">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @elseif(session('success'))
                                        <div class="alert alert-success mt-3">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('select[name="role[]"]').select2();
            $('select[name="skills[]"]').select2();
        });
    </script>
@endsection
