@extends('dashboard.body')

@section('content')
    <div class="container my-5">
        @include('dashboard.partials.header')
        <div class="d-flex gap-3 mt-3">
            @include('dashboard.partials.aside')
            <main class="w-75 bg-body-tertiary rounded p-3">
                <h3>Welcome back, {{auth()->user()->name}}</h3>
                <p>Here is your organization URL. Share this link with your team members to invite them to your organization.</p>
                <div class="input-group">
                    {{ html()->text('organization_url', $organization_url ?? '')->class('form-control')->placeholder('Organization URL') }}
                    <button id="copy-link-btn" type="button" class="btn btn-outline-primary">Copy Link</button>
                    <a href="{{ $organization_url }}" target="_blank" class="btn btn-outline-primary">Open Link</a>
                </div>
                <div class="container bg-body rounded p-3 mt-3">
                    <h6>Your organization: {{$organization->name}}</h6>
                    <h6>Total members: {{$organization->employees->count()}}</h6>
                </div>
            </main>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#copy-link-btn').click(function() {
                var organizationUrl = $('#organization_url').val();
                navigator.clipboard.writeText(organizationUrl).then(function() {
                    alert('Link copied to clipboard!');
                }).catch(function() {
                    alert('Failed to copy link to clipboard!');
                });
            });
        });
    </script>
    
@endsection
