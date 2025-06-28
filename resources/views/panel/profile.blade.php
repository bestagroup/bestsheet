@extends('layouts.base')

@section('title', 'پروفایل کاربر')

@section('content')
    <div class="container mt-4">
        <div class="card text-center mb-3">
            <div class="card-header">
                <div class="nav-align-top">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link d-flex flex-column gap-1 active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-home-card" aria-controls="navs-home-card" aria-selected="true"><i class="tf-icons mdi mdi-home-outline mdi-20px me-1"></i> خانه</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link d-flex flex-column gap-1" role="tab" data-bs-toggle="tab" data-bs-target="#navs-profile-card" aria-controls="navs-profile-card" aria-selected="false"><i class="tf-icons mdi mdi-account-outline mdi-20px me-1"></i> پروفایل</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link d-flex flex-column gap-1" role="tab" data-bs-toggle="tab" data-bs-target="#navs-messages-card" aria-controls="navs-messages-card" aria-selected="false"><i class="tf-icons mdi mdi-message-text-outline mdi-20px me-1"></i> پیام ها</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content pb-0">
                    <div class="tab-pane fade show active" id="navs-home-card" role="tabpanel">
                        <h4 class="card-title">خانه</h4>
                        <p class="card-text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</p>
                        <a href="javascript:void(0)" class="btn btn-primary">گزینه نمایشی</a>
                    </div>
                    <div class="tab-pane fade" id="navs-profile-card" role="tabpanel">
                        <h4 class="card-title">پروفایل</h4>
                        <p class="card-text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</p>
                        <a href="javascript:void(0)" class="btn btn-secondary">گزینه نمایشی</a>
                    </div>
                    <div class="tab-pane fade" id="navs-messages-card" role="tabpanel">
                        <h4 class="card-title">پیام ها</h4>
                        <p class="card-text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</p>
                        <a href="javascript:void(0)" class="btn btn-secondary">گزینه نمایشی</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="card p-4">
                <h5 class="mb-4">ویرایش اطلاعات کاربر</h5>
                <form method="POST" action="#">
                    @csrf
                    @method('PUT')

                    <!-- اطلاعات شخصی -->
                    <h6 class="text-primary">اطلاعات شخصی</h6>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>نام و نام خانوادگی</label>
                            <input type="text" class="form-control" name="name" value="علی رضایی"
                                   placeholder="نام و نام خانوادگی را وارد کنید">
                        </div>
                        <div class="col-md-6">
                            <label>نام کاربری</label>
                            <input type="text" class="form-control" name="username" value="ali_rezaei"
                                   placeholder="نام کاربری را وارد کنید">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>کد ملی</label>
                            <input type="text" class="form-control" name="national_id" value="1234567890"
                                   placeholder="کد ملی را وارد کنید">
                        </div>
                        <div class="col-md-3">
                            <label>سن</label>
                            <input type="number" class="form-control" name="age" value="30" placeholder="سن">
                        </div>
                        <div class="col-md-3">
                            <label>جنسیت</label>
                            <select class="form-control" name="gender">
                                <option value="">انتخاب جنسیت</option>
                                <option value="male" selected>مرد</option>
                                <option value="female">زن</option>
                            </select>
                        </div>
                    </div>

                    <!-- اطلاعات تماس -->
                    <h6 class="text-primary">اطلاعات تماس</h6>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>شماره موبایل</label>
                            <input type="text" class="form-control" name="mobile" value="09123456789"
                                   placeholder="شماره موبایل را وارد کنید">
                        </div>
                        <div class="col-md-6">
                            <label>شماره ثابت</label>
                            <input type="text" class="form-control" name="phone" value="02112345678"
                                   placeholder="شماره ثابت را وارد کنید">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>ایمیل</label>
                            <input type="email" class="form-control" name="email" value="ali@example.com"
                                   placeholder="ایمیل را وارد کنید">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>آدرس</label>
                            <textarea class="form-control" name="address" placeholder="آدرس پستی را وارد کنید">تهران، خیابان آزادی</textarea>
                        </div>
                    </div>

                    <!-- شبکه‌های اجتماعی -->
                    <h6 class="text-primary">اطلاعات شبکه اجتماعی</h6>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>واتساپ</label>
                            <input type="text" class="form-control" name="whatsapp" value="09123456789"
                                   placeholder="واتساپ">
                        </div>
                        <div class="col-md-4">
                            <label>اینستاگرام</label>
                            <input type="text" class="form-control" name="instagram" value="ali_rezaei_insta"
                                   placeholder="اینستاگرام">
                        </div>
                        <div class="col-md-4">
                            <label>تلگرام</label>
                            <input type="text" class="form-control" name="telegram" value="ali_rezaei_telegram"
                                   placeholder="تلگرام">
                        </div>
                    </div>

                    <!-- سطح دسترسی -->
                    <h6 class="text-primary">سطح دسترسی و وضعیت</h6>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>نوع کاربری</label>
                            <select class="form-control" name="role">
                                <option value="admin" selected>ادمین</option>
                                <option value="site">کاربر سایت</option>
                                <option value="guest">مهمان</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>وضعیت</label>
                            <select class="form-control" name="status">
                                <option value="active" selected>فعال</option>
                                <option value="inactive">غیرفعال</option>
                            </select>
                        </div>
                    </div>

                    <!-- دکمه ذخیره -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">ذخیره اطلاعات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
