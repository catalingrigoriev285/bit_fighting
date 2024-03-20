@extends('admin.body')

@section('box-content')
    <div class="container-scroller">
        @include('admin.partials.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.partials.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Welcome {{ auth()->user()->name }}</h3>
                                    <h6 class="font-weight-normal mb-0">"In the world of project management, success lies in
                                        assembling the right team with the perfect blend of skills and expertise. Just like
                                        a symphony conductor harmonizes musicians, the Team Finder platform orchestrates
                                        project teams, ensuring every skill plays its part in creating a masterpiece." </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-title">Organization URL</p>
                                    </div>
                                    <p class="font-weight-500">Here is your organization URL. Share this link with your team
                                        members to invite them to your organization.</p>

                                    <div class="form-group">
                                        <div class="d-flex align-items-center">
                                            {{ html()->text('organization_url', $organization_url ?? '')->class('form-control form-control-sm')->id('organization_url')->placeholder('Organization URL') }}
                                            <div class="input-group-append">
                                                <button class="btn btn-primary ml-3" type="button"
                                                    id="link_btn_copy">Copy</button>
                                                <a href="{{ $organization_url }}" target="_blank"
                                                    class="btn btn-primary ml-3">Open</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin transparent">
                            <div class="row">
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-tale">
                                        <div class="card-body">
                                            <p class="mb-4">Members</p>
                                            <p class="fs-30 mb-2">{{ $organization->members()->count() - 1 }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Skills</p>
                                            <p class="fs-30 mb-2">{{ $organization->skills()->count() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Projects</p>
                                            <p class="fs-30 mb-2">{{ $organization->projects()->count() }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 stretch-card transparent">
                                    <div class="card card-light-danger">
                                        <div class="card-body">
                                            <p class="mb-4">Teams</p>
                                            <p class="fs-30 mb-2">{{$organization->teams()->count()}}</p>
                                        </div>
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
                $('#link_btn_copy').click(function() {
                    var organizationUrl = $('#organization_url').val();
                    var tempInput = $('<input>');
                    $('body').append(tempInput);
                    tempInput.val(organizationUrl).select();
                    document.execCommand('copy');
                    tempInput.remove();
                    alert('Link copied!');
                });
            });
        </script>
    @endsection
