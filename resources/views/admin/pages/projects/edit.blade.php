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
                                    <h4 class="card-title">Edit project #{{$project->id}}</h4>
                                    {{ html()->form('POST', route('admin.projects.update', $project->id))->class('forms-sample')->open() }}
                                    <div class="form-group">
                                        <label for="name">Project Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Name" value="{{$project->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="4" placeholder="Description">{{$project->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="technologies[]">Technologies Used</label>
                                        {{ html()->select('technologies[]', $technologies)->class('form-control')->multiple()->id('technologies')->value(json_decode($project->technologies_used)) }}
                                    </div>
                                    <div class="d-flex">
                                        <div class="form-group w-100 mr-3">
                                            <label for="start_date">Start Date</label>
                                            {{ html()->date('start_date')->class('form-control')->id('period')->placeholder('Period')->value($project->start_date) }}
                                        </div>
                                        <div class="form-group w-100">
                                            <label for="end_date">End Date</label>
                                            {{ html()->date('end_date')->class('form-control')->id('period')->placeholder('Period')->value($project->end_date) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="team_size">Team Size</label>
                                        {{ html()->number('team_size')->class('form-control')->id('team_size')->placeholder('Team Size')->value($project->team_size) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="roles[]">Roles</label>
                                        {{ html()->select('roles[]', $roles)->class('form-control')->multiple()->id('roles')->value(json_decode($project->needed_roles)) }}
                                    </div>
                                    

                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    {{ html()->form()->close() }}
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
            $('#technologies').select2();
            $('#roles').select2();
        });
    </script>
@endsection
