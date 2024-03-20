@extends('admin.body')

@section('box-content')
    <div class="container-scroller">
        @include('admin.partials.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.partials.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (isset($members) && count($members) > 0)
                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Team Members</h4>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Role</th>
                                                        <th>Skills</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($members as $member)
                                                        <tr>
                                                            <td>{{ $member->id }}</td>
                                                            <td>{{ $member->name }}</td>
                                                            <td>{{ $member->email }}</td>
                                                            <td>
                                                                @foreach ($member->roles as $role)
                                                                    <span
                                                                        class="badge badge-primary">{{ str_replace('_', ' ', Str::title($role->name)) }}</span>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach ($member->skills as $skill)
                                                                    <span class="badge badge-success">{{ $skill->name }}</span>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.members.edit', $member->id) }}"
                                                                    class="btn btn-primary">Edit</a>
                                                                <a href="{{ route('admin.members.destroy', $member->id) }}"
                                                                    class="btn btn-danger">Remove</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning">Members not found!</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
