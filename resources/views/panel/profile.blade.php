@extends('layouts.base')

@section('title', 'پروفایل کاربر')

@section('content')
    <div class="container mt-4">
        <div class="card text-center mb-3">
            <div class="card-header">
                <div class="nav-align-top">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link d-flex flex-column gap-1 active" role="tab"
                                    data-bs-toggle="tab" data-bs-target="#navs-home-card" aria-controls="navs-home-card"
                                    aria-selected="true"><i class="tf-icons mdi mdi-home-outline mdi-20px me-1"></i>
                                پروفایل
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link d-flex flex-column gap-1" role="tab"
                                    data-bs-toggle="tab" data-bs-target="#navs-profile-card"
                                    aria-controls="navs-profile-card" aria-selected="false"><i
                                    class="tf-icons mdi mdi-account-outline mdi-20px me-1"></i> کاربران
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link d-flex flex-column gap-1" role="tab"
                                    data-bs-toggle="tab" data-bs-target="#navs-messages-card"
                                    aria-controls="navs-messages-card" aria-selected="false"><i
                                    class="tf-icons mdi mdi-message-text-outline mdi-20px me-1"></i>ایجاد کاربر
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content pb-0">
                    <div class="tab-pane fade show active justify-content-center" id="navs-home-card" role="tabpanel">
                        <div class="card mb-4 col-md-4">
                            <div class="card-body">
                                <div class="user-avatar-section">
                                    <div class="d-flex align-items-center flex-column">
                                        <img
                                            class="img-fluid rounded mb-3 mt-4"
                                            src="{{asset('assets/img/avatars/1.png')}}"
                                            height="120"
                                            width="120"
                                            alt="User avatar"
                                        />
                                        <div class="user-info text-center">
                                            <h4>امیرحسین زین الدینی</h4>
                                            <span class="badge bg-label-danger">ادمین</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between flex-wrap my-2 py-1">

                                </div>
                                <h5 class="pb-3 border-bottom mb-3">جزئیات</h5>
                                <div class="info-container">
                                    <ul class="list-unstyled mb-4">
                                        <li class="mb-3">
                            <span class="fw-semibold text-heading me-2"
                            >نام کاربری:</span
                            >
                                            <span>MahdiMH.uix</span>
                                        </li>
                                        <li class="mb-3">
                            <span class="fw-semibold text-heading me-2"
                            >ایمیل:</span
                            >
                                            <span>MahdiMH.uix@gmail.com</span>
                                        </li>
                                        <li class="mb-3">
                            <span class="fw-semibold text-heading me-2"
                            >وضعیت:</span
                            >
                                            <span class="badge bg-label-success">فعال</span>
                                        </li>
                                        <li class="mb-3">
                            <span class="fw-semibold text-heading me-2"
                            >نقش:</span
                            >
                                            <span>نویسنده</span>
                                        </li>
                                        <li class="mb-3">
                            <span class="fw-semibold text-heading me-2"
                            >شناسه مالیاتی:</span
                            >
                                            <span>Tax-8965</span>
                                        </li>
                                        <li class="mb-3">
                            <span class="fw-semibold text-heading me-2"
                            >تماس:</span
                            >
                                            <span>(123) 456-7890</span>
                                        </li>
                                        <li class="mb-3">
                            <span class="fw-semibold text-heading me-2"
                            >زبان‌ها:</span
                            >
                                            <span>فرانسوی</span>
                                        </li>
                                        <li class="mb-3">
                            <span class="fw-semibold text-heading me-2"
                            >کشور:</span
                            >
                                            <span>انگلستان</span>
                                        </li>
                                    </ul>
                                    <div class="d-flex justify-content-center">
                                        <a
                                            href="javascript:;"
                                            class="btn btn-primary me-3"
                                            data-bs-target="#editUser"
                                            data-bs-toggle="modal"
                                        >ویرایش</a
                                        >
                                        <a
                                            href="javascript:;"
                                            class="btn btn-outline-danger suspend-user"
                                        >تعلیق</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit User Modal -->
                        <div
                            class="modal fade"
                            id="editUser"
                            tabindex="-1"
                            aria-hidden="true"
                        >
                            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                <div class="modal-content p-3 p-md-5">
                                    <div class="modal-body py-3 py-md-0">
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"
                                        ></button>
                                        <div class="text-center mb-4">
                                            <h3 class="mb-2">ویرایش اطلاعات کاربر</h3>
                                            <p class="pt-1">
                                                به روز رسانی جزئیات کاربر یک حسابرسی حریم خصوصی دریافت
                                                خواهد کرد.
                                            </p>
                                        </div>
                                        <form
                                            id="editUserForm"
                                            class="row g-4"
                                            onsubmit="return false"
                                        >
                                            <div class="col-12 col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input
                                                        type="text"
                                                        id="modalEditName"
                                                        name="modalEditName"
                                                        class="form-control"
                                                        placeholder="امیرحسین زین الدینی"
                                                    />
                                                    <label for="modalEditName"
                                                    >نام و نام خانوادگی</label
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input
                                                        type="text"
                                                        id="modalEditUserName"
                                                        name="modalEditUserName"
                                                        class="form-control"
                                                        placeholder="amirhpz"
                                                    />
                                                    <label for="modalEditUserName"
                                                    >نام کاربری</label
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input
                                                        type="text"
                                                        id="modalEditNationalCode"
                                                        name="modalEditNationalCode"
                                                        class="form-control"
                                                        placeholder="29833241140"
                                                    />
                                                    <label for="modalEditNationalCode">کد ملی</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input
                                                        type="text"
                                                        id="modalEditUserEmail"
                                                        name="modalEditUserEmail"
                                                        class="form-control"
                                                        placeholder="example@domain.com"
                                                    />
                                                    <label for="modalEditUserEmail">ایمیل</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input
                                                        type="text"
                                                        id="modalEditAge"
                                                        name="modalEditAge"
                                                        class="form-control"
                                                        placeholder="20"
                                                    />
                                                    <label for="modalEditAge">سن</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <select
                                                        id="modalEditUserGender"
                                                        name="modalEditUserGender"
                                                        class="select2 form-select"
                                                        data-allow-clear="true"
                                                    >
                                                        <option value="">انتخاب</option>
                                                        <option value="male" selected>مرد</option>
                                                        <option value="female">زن</option>
                                                    </select>
                                                    <label for="modalEditUserGender">جنسیت</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-group input-group-merge">
                                                    <div class="form-floating form-floating-outline">
                                                        <input
                                                            type="text"
                                                            id="modalEditUserPhone"
                                                            name="modalEditUserPhone"
                                                            class="form-control phone-number-mask"
                                                            placeholder="912 345 6789"
                                                        />
                                                        <label for="modalEditUserPhone">شماره موبایل</label>
                                                    </div>
                                                    <span class="input-group-text">ایران (+98)</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-group input-group-merge">
                                                    <div class="form-floating form-floating-outline">
                                                        <input
                                                            type="text"
                                                            id="modalEditUserTelephone"
                                                            name="modalEditUserTelephone"
                                                            class="form-control phone-number-mask"
                                                            placeholder="021 22206434"
                                                        />
                                                        <label for="modalEditUserTelephone">شماره تماس</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="input-group input-group-merge">
                                                    <div class="form-floating form-floating-outline">
                                                        <textarea rows="2" class="form-control" name="address"
                                                                  placeholder="آدرس پستی را وارد کنید">تهران، خیابان آزادی
                                                        </textarea>
                                                        <label for="modalEditUserTelephone">شماره تماس</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <select
                                                        id="modalEditUserStatus"
                                                        name="modalEditUserStatus"
                                                        class="select2 form-select"
                                                        data-allow-clear="true"
                                                    >
                                                        <option selected>ادمین</option>
                                                        <option value="1">مدیر</option>
                                                        <option value="2">کارمند</option>
                                                    </select>
                                                    <label for="modalEditUserStatus">نوع کاربری</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <select
                                                        id="modalEditUserStatus"
                                                        name="modalEditUserStatus"
                                                        class="select2 form-select"
                                                        data-allow-clear="true"
                                                    >
                                                        <option selected>وضعیت</option>
                                                        <option value="1">فعال</option>
                                                        <option value="2">غیرفعال</option>
                                                        <option value="3">معلق</option>
                                                    </select>
                                                    <label for="modalEditUserStatus">وضعیت</label>
                                                </div>
                                            </div>

                                            <div class="col-12 text-center">
                                                <button
                                                    type="submit"
                                                    class="btn btn-primary me-sm-3 me-1"
                                                >
                                                    ارسال
                                                </button>
                                                <button
                                                    type="reset"
                                                    class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"
                                                >
                                                    منصرف
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Edit User Modal -->

                        <div class="tab-pane fade" id="navs-profile-card" role="tabpanel">
                            <h4 class="card-title">پروفایل</h4>
                            <p class="card-text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                استفاده</p>
                            <a href="javascript:void(0)" class="btn btn-secondary">گزینه نمایشی</a>
                        </div>
                        <div class="tab-pane fade" id="navs-messages-card" role="tabpanel">
                            <h4 class="card-title">پیام ها</h4>
                            <p class="card-text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                استفاده</p>
                            <a href="javascript:void(0)" class="btn btn-secondary">گزینه نمایشی</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
