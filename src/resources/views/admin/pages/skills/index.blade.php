@extends('admin.body')

@section('box-content')
    <div class="container-scroller">
        @include('admin.partials.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.partials.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-title">Create a new skill</p>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex align-items-center">
                                            {{ html()->form('POST', route('admin.skills.store', $organization->reference))->class('d-flex w-100')->open() }}

                                            {{ html()->text('skill_name', '')->class('form-control form-control-sm')->id('skill_name')->placeholder('Skill Name') }}
                                            <div class="input-group-append">
                                                <button class="btn btn-primary ml-3" type="submit">Create</button>
                                            </div>

                                            {{ html()->form()->close() }}
                                        </div>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($skills) && count($skills) > 0)
                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Skills</h4>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Created</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($skills as $skill)
                                                        <tr>
                                                            <td>{{ $skill->id }}</td>
                                                            <td>{{ $skill->name }}</td>
                                                            <td>{{ $skill->created_at->format('d M Y') }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.skills.destroy', [$skill->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        <div class="mt-3 float-right">
                                            {{ $skills->links() }}
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
