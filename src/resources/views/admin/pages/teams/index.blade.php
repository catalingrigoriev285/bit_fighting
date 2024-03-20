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
                                    <p class="mb-4">Total teams</p>
                                    <div class="d-flex justify-content-between">
                                        <p class="fs-30 mb-2">{{ $teams->count() }}</p>
                                        <a href="{{ route('admin.teams.create') }}" class="btn btn-warning">Create new
                                            team</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (isset($teams) && count($teams) > 0)
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
                                                    @foreach ($skills as $skill)
                                                        <tr>
                                                            <td>{{ $skill->id }}</td>
                                                            <td>{{ $skill->name }}</td>
                                                            <td>{{ $skill->created_at->format('d M Y') }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.skills.destroy', [$skill->id]) }}"
                                                                    class="btn btn-danger btn-sm">Delete</a>
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
