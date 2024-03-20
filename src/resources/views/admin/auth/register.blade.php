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
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            {{ html()->form('POST', '/admin/postRegister')->class('pt-3')->open() }}

                            <div class="form-group">
                                {{ html()->text('name')->id('name')->class('form-control')->placeholder('Name') }}
                            </div>
                            <div class="form-group">
                                {{ html()->text('email')->id('email')->class('form-control')->placeholder('Email') }}
                            </div>
                            <div class="form-group">
                                {{ html()->password('password')->id('password')->class('form-control')->placeholder('Password') }}
                            </div>
                            <div class="form-group">
                                {{ html()->text('organization_name')->id('organization_name')->class('form-control')->placeholder('Organization') }}
                            </div>
                            <div class="form-group">
                                {{ html()->text('headquarter_address')->id('headquarter_address')->class('form-control')->placeholder('Headquarter Address') }}
                            </div>
                            <div class="mt-3">
                                {{ html()->submit('SIGN UP')->class('btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn') }}
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
