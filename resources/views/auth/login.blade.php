@extends('layouts.auth')

@section('title', 'ورود به مدیریت سایت')

@section('content')
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Login -->
            <div class="card p-2">
                <!-- Logo -->
{{--                <div class="app-brand justify-content-center mt-5">--}}
{{--                    <a href="{{ url('/') }}" class="app-brand-link gap-2">--}}
{{--          <span class="app-brand-logo demo">--}}
{{--            <img src="{{ asset('assets/img/logo.svg') }}" alt="Logo" width="40">--}}
{{--          </span>--}}
{{--                        <span class="app-brand-text demo text-heading fw-bold">مدیریت سایت</span>--}}
{{--                    </a>--}}
{{--                </div>--}}
                <!-- /Logo -->

                <div class="card-body mt-2">
                    <h4 class="mb-2 fw-semibold">خوش آمدید! 👋</h4>
                    <p class="mb-4">لطفاً وارد حساب خود شوید</p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="text" class="form-control" id="email" name="email" placeholder="ایمیل " autofocus required>
                            <label for="email">ایمیل </label>
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

                        <div class="mb-3 d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" name="remember">
                                <label class="form-check-label" for="remember-me">مرا به خاطر بسپار</label>
                            </div>
                            <a href="{{ route('password.request') }}">فراموشی رمز عبور؟</a>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">ورود</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>کاربر جدید هستید؟</span>
                        <a href="{{ route('register') }}">
                            <span>ثبت نام کنید</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const togglePassword = document.querySelector('.form-password-toggle .input-group-text');
            const passwordInput = document.querySelector('#password');
            const icon = togglePassword.querySelector('i');

            togglePassword.addEventListener('click', function () {
                const type = passwordInput.type === 'password' ? 'text' : 'password';
                passwordInput.type = type;
                icon.classList.toggle('mdi-eye-outline');
                icon.classList.toggle('mdi-eye-off-outline');
            });
        });
    </script>
@endpush
