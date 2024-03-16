@extends('admin.body')

@section('box-content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                Bit Fighting
                            </div>
                            <h4>{{ $organization->name }}</h4>
                            <h6 class="font-weight-light">{{ $organization->headquarters_address }}</h6>
                            {{ html()->form('POST', '/organization/' . $organization->reference . '/register-employee')->class('pt-3')->open() }}

                            <div class="form-group">
                                {{ html()->text('name')->id('name')->class('form-control')->placeholder('Name') }}
                            </div>
                            <div class="form-group">
                                {{ html()->text('email')->id('email')->class('form-control')->placeholder('Email') }}
                            </div>
                            <div class="form-group">
                                {{ html()->password('password')->id('password')->class('form-control')->placeholder('Password') }}
                            </div>
                            <div class="mt-3">
                                @if(auth()->user())
                                    <a href="{{ url()->previous() }}" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">RETURN BACK</a>
                                @else
                                    {{ html()->submit('SIGN UP')->class('btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn') }}
                                @endif
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="text-center mt-4 font-weight-light">
                                Already have an account? <a href="{{ route('admin.login') }}" class="text-primary">Login</a>
                            </div>
                            {{ html()->form()->close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
