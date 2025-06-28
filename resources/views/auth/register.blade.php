{{--@extends('layouts.auth')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}



@extends('layouts.auth')

@section('title', 'ثبت نام')

@section('content')
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Register Card -->
            <div class="card p-2">
                <div class="app-brand justify-content-center mt-5">
                    <a href="{{ url('/') }}" class="app-brand-link gap-2">
          <span class="app-brand-logo demo">
            <img src="{{ asset('assets/img/logo.svg') }}" alt="Logo" width="40">
          </span>
                        <span class="app-brand-text demo text-heading fw-bold">نام برند شما</span>
                    </a>
                </div>

                <div class="card-body mt-2">
                    <h4 class="mb-2 fw-semibold">ایجاد حساب کاربری جدید ✨</h4>
                    <p class="mb-4">لطفا اطلاعات زیر را برای ثبت نام وارد کنید</p>

                    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="نام" required autofocus>
                            <label for="name">نام کاربری</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="ایمیل" required>
                            <label for="email">آدرس ایمیل</label>
                        </div>

                        <div class="mb-3">
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="رمز عبور" required>
                                        <label for="password">رمز عبور</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="تایید رمز عبور" required>
                                        <label for="password_confirmation">تکرار رمزعبور</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('ثبت نام') }}</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>حساب کاربری دارید؟</span>
                        <a href="{{ route('login') }}">
                            <span>ورود به حساب</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Register Card -->

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const togglePasswordElements = document.querySelectorAll('.form-password-toggle');

            togglePasswordElements.forEach(function (wrapper) {
                const toggleButton = wrapper.querySelector('.input-group-text');
                const inputField = wrapper.querySelector('input');
                const icon = toggleButton.querySelector('i');

                toggleButton.addEventListener('click', function () {
                    const type = inputField.type === 'password' ? 'text' : 'password';
                    inputField.type = type;
                    icon.classList.toggle('mdi-eye-outline');
                    icon.classList.toggle('mdi-eye-off-outline');
                });
            });
        });
    </script>
@endpush
