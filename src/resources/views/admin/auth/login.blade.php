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
                            <h4>Revolutionizing Team Assembly in Enterprises</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            {{ html()->form('POST', '/admin/postLogin')->class('pt-3')->open() }}
                            <div class="form-group">
                                {{ html()->email('email')->id('email')->class('form-control')->placeholder('Email') }}
                            </div>
                            <div class="form-group">
                                {{ html()->password('password')->id('password')->class('form-control')->placeholder('Password') }}
                            </div>
                            <div class="mt-3">
                                {{ html()->submit('SIGN IN')->class('btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn') }}
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
                                Don't have an account? <a href="{{ route('admin.register') }}"
                                    class="text-primary">Create</a>
                            </div>
                            {{ html()->form()->close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
