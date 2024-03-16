@extends('admin.body')

@section('box-content')
    <div class="container-scroller">
        @include('admin.partials.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.partials.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mb-4">Total projects</p>
                                    <div class="d-flex justify-content-between">
                                        <p class="fs-30 mb-2">{{ $projects->count() }}</p>
                                        <a href="{{ route('admin.projects.create') }}" class="btn btn-success">Create new
                                            project</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mb-4">Total teams</p>
                                    <div class="d-flex justify-content-between">
                                        <p class="fs-30 mb-2">{{ $teams->count() }}</p>
                                        <a href="{{ route('admin.teams.create') }}" class="btn btn-dark">Init a new team</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (isset($projects) && count($projects) > 0)
                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Projects</h4>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th>Technologies</th>
                                                        <th>Roles</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($projects as $project)
                                                        <tr>
                                                            <td>{{ $project->id }}</td>
                                                            <td>{{ $project->name }}</td>
                                                            <td>{{ $project->description }}</td>
                                                            <td>
                                                                @foreach (json_decode($project->technologies_used) as $technology)
                                                                    @php
                                                                        $technology = App\Models\OrganizationSkill::find(
                                                                            $technology,
                                                                        )->name;
                                                                    @endphp
                                                                    <span
                                                                        class="badge badge-primary">{{ $technology }}</span>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach (json_decode($project->needed_roles) as $role)
                                                                    @php
                                                                        $role = Spatie\Permission\Models\Role::find($role)->name;
                                                                        $role = ucwords(str_replace('_', ' ', $role));
                                                                    @endphp
                                                                    <span class="badge badge-primary">{{ $role }}</span>
                                                                @endforeach
                                                            <td>
                                                                <a href="{{ route('admin.projects.edit', $project->id) }}"
                                                                    class="btn btn-primary">Edit</a>
                                                                <a href="{{ route('admin.projects.destroy', $project->id) }}"
                                                                    class="btn btn-danger">Remove</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="mt-3 float-right">
                                                {{ $projects->links() }}
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
