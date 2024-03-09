@extends('dashboard.body')

@section('content')
    <div class="container my-5">
        @include('dashboard.partials.header')
        <div class="d-flex gap-3 mt-3">
            @include('dashboard.partials.aside')
            <main class="w-75 bg-body-tertiary rounded p-3">
                <h3 class="mb-3">Organization members</h3>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (isset($organization_members) && count($organization_members) > 0)
                    <div class="alert alert-primary" role="alert">
                        Total members: {{ count($organization_members) }}
                    </div>
                    <ul class="list-group">
                        @foreach ($organization_members as $member)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>{{ $member->name }}<br><span
                                            class="badge text-bg-primary">{{ $member->email }}</span></span>
                                    <a href="{{ route('dashboard.members.remove', $member->id) }}" class="btn btn-danger"
                                        style="height: fit-content;">Remove</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    @if (!session('success'))
                        <div class="alert alert-warning" role="alert">
                            No members found
                        </div>
                    @endif
                @endif
            </main>
        </div>
    </div>
@endsection
