@extends('layouts.base')

@section('title', 'مدیریت زیر منوهای داشبورد')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/dataTables.dataTables.min.css') }}"/>
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">{{$thispage['list']}}</h5>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">{{$thispage['add']}}</a>
            </div>
            <div class="table-responsive">
                <style> table{margin: 0 auto;width: 100% !important;clear: both;border-collapse: collapse;table-layout: auto !important;word-wrap:break-word;white-space: nowrap;} .dt-layout-start{margin-right: 0 !important;} .dt-layout-end{margin-left: 0 !important;}</style>
                <table id="sample1" class="table table-striped table-bordered yajra-datatable">
                <thead>
                    <tr class="table-light">
                        <th>تغییرات</th>
                        <th>سریال</th>
                        <th>نام تجاری طرح</th>
                        <th>نام شرکت</th>
                        <th>مدیرعامل شرکت</th>
                        <th>وضعیت پرتفو</th>
                        <th>مرحله فرایند شرکت</th>
                        <th>درصد پیشرفت</th>
                        <th>وضعیت فعالیت</th>
                        <th>تاریخ شروع قرارداد</th>
                        <th>مبلغ درخواستی تایید شده</th>
                        <th>مبلغ واریز شده</th>
                        <th>مبلغ تعهد مرحله اول</th>
                        <th>واریز قسط مرحله اول</th>
                        <th>مبلغ تعهد مرحله دوم</th>
                        <th>واریز قسط مرحله دوم</th>
                        <th>مبلغ تعهد مرحله سوم</th>
                        <th>واریز قسط مرحله سوم</th>
                        <th>مبلغ تعهد مرحله چهارم</th>
                        <th>واریز قسط مرحله چهارم</th>
                        <th>مبلغ تعهد مرحله پنجم</th>
                        <th>واریز قسط مرحله پنجم</th>
                        <th>مانده تعهدات</th>
                        <th>تغییرات</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    @foreach($projects as $project)
        <div class="modal fade" id="deleteModal{{$project->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title w-100" id="deleteModalLabel">{{$thispage['delete']}}</h5>
                        <button type="button" class="btn-close position-absolute start-0 mx-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        آیا از حذف این زیر منو مطمئن هستید؟
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">انصراف</button>
                        <button type="button" class="btn btn-danger" id="deletesubmit_{{$project->id}}" data-id="{{$project->id}}">حذف</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">{{$thispage['add']}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route(request()->segment(2).'.'.'store')}}" id="addform" method="POST">
                        {{csrf_field()}}
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">نام تجاری طرح</label>
                                <input type="text" name="title" id="title" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">نام شرکت</label>
                                <input type="text" name="company_name" id="company_name" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">مدیرعامل شرکت</label>
                                <input type="text" name="CEO" id="CEO" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">وضعیت پرتفو</label>
                                <input type="text" name="portfo_status" id="portfo_status" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">مرحله فرایند شرکت</label>
                                <input type="text" name="flow_level" id="flow_level" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">درصد پیشرفت</label>
                                <input type="text" name="progress_percentage" id="progress_percentage" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">وضعیت فعالیت</label>
                                <input type="text" name="activity_status" id="activity_status" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">تاریخ شروع قرارداد</label>
                                <input type="text" name="start_date" id="start_date" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">مبلغ درخواستی تایید شده</label>
                                <input type="text" name="amount_request_accept" id="amount_request_accept" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">مبلغ واریز شده</label>
                                <input type="text" name="amount_deposited" id="amount_deposited" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">مبلغ تعهد مرحله اول</label>
                                <input type="text" name="amount_commitment_first_stage" id="amount_commitment_first_stage" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">واریز قسط مرحله اول</label>
                                <input type="text" name="first_stage_payment" id="first_stage_payment" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">مبلغ تعهد مرحله دوم</label>
                                <input type="text" name="amount_commitment_second_stage" id="amount_commitment_second_stage" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">واریز قسط مرحله دوم</label>
                                <input type="text" name="second_stage_payment" id="second_stage_payment" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">مبلغ تعهد مرحله سوم</label>
                                <input type="text" name="amount_commitment_third_stage" id="amount_commitment_third_stage" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">واریز قسط مرحله سوم</label>
                                <input type="text" name="third_stage_payment" id="third_stage_payment" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">مبلغ تعهد مرحله چهارم</label>
                                <input type="text" name="amount_commitment_fourth_stage" id="amount_commitment_fourth_stage" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">واریز قسط مرحله چهارم</label>
                                <input type="text" name="fourth_stage_payment" id="fourth_stage_payment" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">مبلغ تعهد مرحله پنجم</label>
                                <input type="text" name="amount_commitment_fifth_stage" id="amount_commitment_fifth_stage" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">واریز قسط مرحله پنجم</label>
                                <input type="text" name="fifth_stage_payment" id="fifth_stage_payment" class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">مانده تعهدات</label>
                                <input type="text" name="commitment_balance" id="commitment_balance" class="form-control" />
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" id="submit" class="btn btn-primary">ذخیره اطلاعات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    @foreach($projects as $project)
        <div class="modal fade" id="editModal{{$project->id}}" tabindex="-1" aria-labelledby="editModalLabel{{$project->id}}" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{$project->id}}">{{$thispage['edit']}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route(request()->segment(2).'.update' , $project->id)}}" id="editform_{{$project->id}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="menu_id" id="menu_id_{{$project->id}}" value="{{$project->id}}" />
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label class="form-label">نام تجاری طرح</label>
                                    <input type="text" name="title" id="title_{{$project->id}}" value="{{$project->title}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">نام شرکت</label>
                                    <input type="text" name="company_name" id="company_name_{{$project->id}}" value="{{$project->company_name}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مدیرعامل شرکت</label>
                                    <input type="text" name="CEO" id="CEO_{{$project->id}}" value="{{$project->CEO}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">وضعیت پرتفو</label>
                                    <input type="text" name="portfo_status" id="portfo_status_{{$project->id}}" value="{{$project->portfo_status}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مرحله فرایند شرکت</label>
                                    <input type="text" name="flow_level" id="flow_level_{{$project->id}}" value="{{$project->flow_level}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">درصد پیشرفت</label>
                                    <input type="text" name="progress_percentage" id="progress_percentage_{{$project->id}}" value="{{$project->progress_percentage}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">وضعیت فعالیت</label>
                                    <input type="text" name="activity_status" id="activity_status_{{$project->id}}" value="{{$project->activity_status}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">تاریخ شروع قرارداد</label>
                                    <input type="text" name="start_date" id="start_date_{{$project->id}}" value="{{$project->start_date}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مبلغ درخواستی تایید شده</label>
                                    <input type="text" name="amount_request_accept" id="amount_request_accept_{{$project->id}}" value="{{number_format($project->amount_request_accept)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مبلغ واریز شده</label>
                                    <input type="text" name="amount_deposited" id="amount_deposited_{{$project->id}}" value="{{number_format($project->amount_deposited)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مبلغ تعهد مرحله اول</label>
                                    <input type="text" name="amount_commitment_first_stage" id="amount_commitment_first_stage_{{$project->id}}" value="{{number_format($project->amount_commitment_first_stage)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">واریز قسط مرحله اول</label>
                                    <input type="text" name="first_stage_payment" id="first_stage_payment_{{$project->id}}" value="{{number_format($project->first_stage_payment)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مبلغ تعهد مرحله دوم</label>
                                    <input type="text" name="amount_commitment_second_stage" id="amount_commitment_second_stage_{{$project->id}}" value="{{number_format($project->amount_commitment_second_stage)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">واریز قسط مرحله دوم</label>
                                    <input type="text" name="second_stage_payment" id="second_stage_payment_{{$project->id}}" value="{{number_format($project->second_stage_payment)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مبلغ تعهد مرحله سوم</label>
                                    <input type="text" name="amount_commitment_third_stage" id="amount_commitment_third_stage_{{$project->id}}" value="{{number_format($project->amount_commitment_third_stage)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">واریز قسط مرحله سوم</label>
                                    <input type="text" name="third_stage_payment" id="third_stage_payment_{{$project->id}}" value="{{number_format($project->third_stage_payment)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مبلغ تعهد مرحله چهارم</label>
                                    <input type="text" name="amount_commitment_fourth_stage" id="amount_commitment_fourth_stage_{{$project->id}}" value="{{number_format($project->amount_commitment_fourth_stage)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">واریز قسط مرحله چهارم</label>
                                    <input type="text" name="fourth_stage_payment" id="fourth_stage_payment_{{$project->id}}" value="{{number_format($project->fourth_stage_payment)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مبلغ تعهد مرحله پنجم</label>
                                    <input type="text" name="amount_commitment_fifth_stage" id="amount_commitment_fifth_stage_{{$project->id}}" value="{{number_format($project->amount_commitment_fifth_stage)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">واریز قسط مرحله پنجم</label>
                                    <input type="text" name="fifth_stage_payment" id="fifth_stage_payment_{{$project->id}}" value="{{number_format($project->fifth_stage_payment)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مانده تعهدات</label>
                                    <input type="text" name="commitment_balance" id="commitment_balance_{{$project->id}}" value="{{number_format($project->commitment_balance)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">لوگو شرکت</label>
                                    <input type="text" name="logo" class="form-control file-selector logo_{{$project->id}}" data-record-id="{{ $project->id }}" data-input-id="input_{{ $project->id }}" id="input_{{ $project->id }}" readonly placeholder="انتخاب فایل برای پروژه {{ $project->id }}">
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="button" id="editsubmit_{{$project->id}}" class="btn btn-primary" >ذخیره اطلاعات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Edit Modal -->
    @foreach($projects as $project)
        <div class="modal fade" id="showModal{{ $project->id }}" tabindex="-1" aria-labelledby="editModalLabel{{$project->id}}" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">اطلاعات شرکت: {{ $project->company_name ?? '---' }} </h5>
                        <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="companyTabs{{ $project->id }}" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="profile-tab{{ $project->id }}" data-bs-toggle="tab" data-bs-target="#tab-profile{{ $project->id }}"
                                        type="button" role="tab" aria-controls="tab-profile{{ $project->id }}" aria-selected="true">
                                    پروفایل
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="investment-tab{{ $project->id }}" data-bs-toggle="tab" data-bs-target="#tab-investment{{ $project->id }}"
                                        type="button" role="tab" aria-controls="tab-investment{{ $project->id }}" aria-selected="false">
                                    سرمایه‌گذاری
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="payments-tab{{ $project->id }}" data-bs-toggle="tab" data-bs-target="#tab-payments{{ $project->id }}"
                                        type="button" role="tab" aria-controls="tab-payments{{ $project->id }}" aria-selected="false">
                                    پرداخت‌ها
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="kpi-tab{{ $project->id }}" data-bs-toggle="tab" data-bs-target="#tab-kpi{{ $project->id }}"
                                        type="button" role="tab" aria-controls="tab-kpi{{ $project->id }}" aria-selected="false">
                                    KPI
                                </button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content mt-3" id="companyTabsContent{{ $project->id }}">
                            <!-- Profile Tab -->
                            <div class="tab-pane fade show active" id="tab-profile{{ $project->id }}" role="tabpanel" aria-labelledby="profile-tab{{ $project->id }}">
                                <img src="{{ $project->logo }}" class="rounded-circle mb-3" width="80" height="80" alt="لوگو">
                                <p><strong>نام تجاری:</strong> {{ $project->company_name }}</p>
                                <p><strong>مدیرعامل:</strong> {{ $project->CEO }}</p>
                                <p><strong>شماره موبایل:</strong> {{ $project->ceo_phone }}</p>
                                <p><strong>وضعیت پروژه:</strong> {{ $project->activity_status }}</p>
                            </div>

                            <!-- Investment Tab -->
                            <div class="tab-pane fade" id="tab-investment{{ $project->id }}" role="tabpanel" aria-labelledby="investment-tab{{ $project->id }}">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <input type="checkbox" {{ $project->step_1 ? 'checked' : '' }} disabled> ارسال مدارک
                                    </li>
                                    <li class="list-group-item">
                                        <input type="checkbox" {{ $project->step_2 ? 'checked' : '' }} disabled> ارزیابی اولیه
                                    </li>
                                    <li class="list-group-item">
                                        <input type="checkbox" {{ $project->step_3 ? 'checked' : '' }} disabled> تایید نهایی
                                    </li>
                                </ul>
                            </div>

                            <!-- Payments Tab  -->
                            <div class="tab-pane fade" id="tab-payments{{ $project->id }}" role="tabpanel" aria-labelledby="payments-tab{{ $project->id }}">
                                <table class="table table-bordered mt-2">
                                    <thead>
                                    <tr>
                                        <th>مبلغ</th>
                                        <th>تاریخ پرداخت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($project->payments ?? [] as $payment)
                                        <tr>
                                            <td>{{ number_format($payment->amount) }} تومان</td>
                                            <td>{{ jdate($payment->date)->format('Y/m/d') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- KPI Tab -->
                            <div class="tab-pane fade" id="tab-kpi{{ $project->id }}" role="tabpanel" aria-labelledby="kpi-tab{{ $project->id }}">
                                <ul class="list-group">
                                    @foreach($project->kpis ?? [] as $kpi)
                                        <li class="list-group-item" >
                                            <input type="checkbox" {{ $kpi->completed ? 'checked' : '' }} disabled> {{ $kpi->title }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach($projects as $project)

        <div class="modal fade" id="uploadModal{{ $project->id }}" tabindex="-1" aria-labelledby="uploadModalLabel{{ $project->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">{{$thispage['add']}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('storemedia') }}" enctype="multipart/form-data" class="dropzone" id="fileUploadZone{{ $project->id }} myform" data-record-id="{{ $project->id }}" style="min-height: 200px; border-style: dashed; border: 2px dashed #ccc; padding: 20px; margin-bottom: 30px;">
                        @csrf
                        <input type="hidden" name="record_id" value="{{ $project->id }}">
                        <div class="dz-message text-center text-muted">
                            <div class="mb-3">
                                <i class="bi bi-cloud-arrow-up" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="fw-bold mb-2">برای آپلود فایل، کلیک کنید یا فایل را بکشید اینجا</h5>
                            <p class="small text-secondary mb-0">فرمت‌های مجاز: JPG, PNG, PDF, MP4, DOCX (حداکثر 10 مگابایت)</p>
                        </div>
                    </form>
                    <style>
                        #fileUploadZone .dz-preview {
                            display: inline-block;
                            margin-right: 8px;
                        }

                        #fileUploadZone.dz-started .dz-message {
                            display: none;
                        }
                        /* ساختار شبکه مرتب برای فایل‌ها */
                        #fileUploadZone .dz-preview {
                            width: 160px;
                            margin: 10px;
                        }

                        #fileUploadZone {
                            display: flex;
                            flex-wrap: wrap;
                            gap: 10px;
                            justify-content: start;
                        }

                        /* انیمیشن لودینگ دایره‌ای */
                        .dz-preview .loading-spinner {
                            width: 32px;
                            height: 32px;
                            border: 3px solid #ccc;
                            border-top: 3px solid #007bff;
                            border-radius: 50%;
                            animation: spin 0.8s linear infinite;
                            margin: 10px auto;
                        }

                        @keyframes spin {
                            0% { transform: rotate(0deg); }
                            100% { transform: rotate(360deg); }
                        }

                        /* پس از آپلود موفق */
                        .dz-success .loading-spinner {
                            display: none !important;
                        }
                    </style>

                </div>
            </div>
        </div>
    </div>

        <div class="modal fade" id="showwModal{{ $project->id }}" tabindex="-1" aria-labelledby="showModalLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="previewModalLabel">پیش نمایش فایل</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                    </div>
                    <div class="modal-body text-center" id="previewContent">
                        <!-- فایل پیش نمایش اینجا لود می‌شود -->
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
@section('script')
    <script src="{{asset('assets/vendor/js/dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendor/js/sweetalert2.js')}}"></script>
    <script src="{{asset('assets/vendor/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{'https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js'}}"></script>
{{--    <script src="https://cdn.datatables.net/plug-ins/1.13.5/i18n/fa.json"></script>--}}

    <script type="text/javascript">
        $(function () {
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                order: [[0, 'desc']],
                scrollX: true,
                ajax: "{{ route(request()->segment(2) . '.index') }}",
                columns: [
                    {data: 'action'                         , name: 'action', orderable: true, searchable: true},
                    {data: 'id'                             , name: 'id'},
                    {data: 'title'                          , name: 'title'},
                    {data: 'company_name'                   , name: 'company_name'},
                    {data: 'CEO'                            , name: 'CEO'},
                    {data: 'portfo_status'                  , name: 'portfo_status'},
                    {data: 'flow_level'                     , name: 'flow_level'},
                    {data: 'progress_percentage'            , name: 'progress_percentage'},
                    {data: 'activity_status'                , name: 'activity_status'},
                    {data: 'start_date'                     , name: 'start_date'},
                    {data: 'amount_request_accept'          , name: 'amount_request_accept'},
                    {data: 'amount_deposited'               , name: 'amount_deposited'},
                    {data: 'amount_commitment_first_stage'  , name: 'amount_commitment_first_stage'},
                    {data: 'first_stage_payment'            , name: 'first_stage_payment'},
                    {data: 'amount_commitment_second_stage' , name: 'amount_commitment_second_stage'},
                    {data: 'second_stage_payment'           , name: 'second_stage_payment'},
                    {data: 'amount_commitment_third_stage'  , name: 'amount_commitment_third_stage'},
                    {data: 'third_stage_payment'            , name: 'third_stage_payment'},
                    {data: 'amount_commitment_fourth_stage' , name: 'amount_commitment_fourth_stage'},
                    {data: 'fourth_stage_payment'           , name: 'fourth_stage_payment'},
                    {data: 'amount_commitment_fifth_stage'  , name: 'amount_commitment_fifth_stage'},
                    {data: 'fifth_stage_payment'            , name: 'fifth_stage_payment'},
                    {data: 'commitment_balance'             , name: 'commitment_balance'},
                    {data: 'action'                         , name: 'action', orderable: true, searchable: true},
                ],
                language: {
                    url: "{{asset('assets/vendor/js/fa.json')}}"
                }
            });
        });
    </script>
    <script>
        jQuery(document).ready(function(){
            jQuery('#submit').click(function(e){
                e.preventDefault();

                var button = jQuery(this);
                var originalButtonHtml = button.html();
                button.prop('disabled', true);
                button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> در حال ارسال...');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                jQuery.ajax({
                    url: "{{route(request()->segment(2).'.'.'store')}}",
                    method: 'POST',
                    data: {
                        "_token"                      : "{{ csrf_token() }}",
                        title                         :jQuery('#title').val(),
                        company_name                  :jQuery('#company_name').val(),
                        CEO                           :jQuery('#CEO').val(),
                        portfo_status                 :jQuery('#portfo_status').val(),
                        flow_level                    :jQuery('#flow_level').val(),
                        progress_percentage           :jQuery('#progress_percentage').val(),
                        activity_status               :jQuery('#activity_status').val(),
                        start_date                    :jQuery('#start_date').val(),
                        amount_request_accept         :jQuery('#amount_request_accept').val(),
                        amount_deposited              :jQuery('#amount_deposited').val(),
                        amount_commitment_first_stage :jQuery('#amount_commitment_first_stage').val(),
                        first_stage_payment           :jQuery('#first_stage_payment').val(),
                        amount_commitment_second_stage:jQuery('#amount_commitment_second_stage').val(),
                        second_stage_payment          :jQuery('#second_stage_payment').val(),
                        amount_commitment_third_stage :jQuery('#amount_commitment_third_stage').val(),
                        third_stage_payment           :jQuery('#third_stage_payment').val(),
                        amount_commitment_fourth_stage:jQuery('#amount_commitment_fourth_stage').val(),
                        fourth_stage_payment          :jQuery('#fourth_stage_payment').val(),
                        amount_commitment_fifth_stage :jQuery('#amount_commitment_fifth_stage').val(),
                        fifth_stage_payment           :jQuery('#fifth_stage_payment').val(),
                        commitment_balance            :jQuery('#commitment_balance').val(),
                    },
                    success: function (data) {
                        if(data.success == true){
                            // بستن مدال
                            var modal = bootstrap.Modal.getInstance(document.querySelector('#addModal'));
                            if (modal) modal.hide();
                            $('#addform')[0].reset();
                            $('.yajra-datatable').DataTable().ajax.reload(null, false);
                            //swal(data.subject, data.message, data.flag);

                        } else {
                            swal(data.subject, data.message, data.flag);
                        }
                    },
                    error: function () {
                        swal('خطا', 'مشکلی پیش آمد. لطفاً دوباره تلاش کنید.', 'error');
                    },
                    complete: function () {
                        button.prop('disabled', false);
                        button.html(originalButtonHtml);
                    }
                });
            });
        });
    </script>
    <script>
        jQuery(document).ready(function(){
            jQuery('[id^=editsubmit_]').click(function(e){
                e.preventDefault();
                var button = jQuery(this);
                var originalButtonHtml = button.html(); // متن اصلی دکمه رو ذخیره کن

                button.prop('disabled', true);
                button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> در حال ارسال...');

                var id = jQuery(this).attr('id').split('_')[1];
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ route(request()->segment(2).'.update' , 0) }}",
                    method: 'PATCH',
                    data: {
                        "_token"                      : "{{ csrf_token() }}",
                        id                            : jQuery('#menu_id_' + id).val(),
                        title                         :jQuery('#title_' + id).val(),
                        company_name                  :jQuery('#company_name_' +id).val(),
                        CEO                           :jQuery('#CEO_' +id).val(),
                        portfo_status                 :jQuery('#portfo_status_' +id).val(),
                        flow_level                    :jQuery('#flow_level_' +id).val(),
                        progress_percentage           :jQuery('#progress_percentage_' +id).val(),
                        activity_status               :jQuery('#activity_status_' +id).val(),
                        start_date                    :jQuery('#start_date_' +id).val(),
                        amount_request_accept         :jQuery('#amount_request_accept_' +id).val(),
                        amount_deposited              :jQuery('#amount_deposited_' +id).val(),
                        amount_commitment_first_stage :jQuery('#amount_commitment_first_stage_' +id).val(),
                        first_stage_payment           :jQuery('#first_stage_payment_' +id).val(),
                        amount_commitment_second_stage:jQuery('#amount_commitment_second_stage_' +id).val(),
                        second_stage_payment          :jQuery('#second_stage_payment_' +id).val(),
                        amount_commitment_third_stage :jQuery('#amount_commitment_third_stage_' +id).val(),
                        third_stage_payment           :jQuery('#third_stage_payment_' +id).val(),
                        amount_commitment_fourth_stage:jQuery('#amount_commitment_fourth_stage_' +id).val(),
                        fourth_stage_payment          :jQuery('#fourth_stage_payment_' +id).val(),
                        amount_commitment_fifth_stage :jQuery('#amount_commitment_fifth_stage_' +id).val(),
                        fifth_stage_payment           :jQuery('#fifth_stage_payment_' +id).val(),
                        commitment_balance            :jQuery('#commitment_balance_' +id).val(),
                        logo                          :jQuery('.logo_' +id).val(),
                    },
                    success: function (data) {
                        if(data.success == true){
                            // بستن مدال
                            var modalId = '#editModal' + id;
                            var modal = bootstrap.Modal.getInstance(document.querySelector(modalId)); // اینجا #myModal باید id مدال شما باشه
                            if (modal) modal.hide();
                            $('.yajra-datatable').DataTable().ajax.reload(null, false);
                            //swal(data.subject, data.message, data.flag);

                        } else {
                            swal(data.subject, data.message, data.flag);
                        }
                    },
                    error: function () {
                        swal('خطا', 'مشکلی پیش آمد. لطفاً دوباره تلاش کنید.', 'error');
                    },
                    complete: function () {

                        button.prop('disabled', false);
                        button.html(originalButtonHtml);
                    }
                });
            });
        });
    </script>
    <script>
        jQuery(document).ready(function(){
            jQuery('[id^=deletesubmit_]').click(function(e){
                e.preventDefault();

                var button = jQuery(this);
                var id = button.data('id');
                var originalButtonHtml = button.html(); // متن اصلی دکمه رو ذخیره کن

                // قفل کردن دکمه + گذاشتن اسپینر
                button.prop('disabled', true);
                button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> در حال حذف...');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                jQuery.ajax({
                    url: "{{ route(request()->segment(2).'.destroy', 0) }}",
                    method: 'delete',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function (data) {
                        // مدال را ببند
                        var modalId = '#deleteModal' + id;
                        var modal = bootstrap.Modal.getInstance(document.querySelector(modalId));
                        modal.hide();

                        // جدول را رفرش کن
                        $('.yajra-datatable').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        alert('مشکلی پیش آمد. لطفاً دوباره تلاش کنید.');
                    },
                    complete: function () {
                        // چه موفق باشه چه خطا بده، دکمه رو برگردون
                        button.prop('disabled', false);
                        button.html(originalButtonHtml);
                    }
                });
            });
        });
    </script>
    <script>
        document.getElementById('amount').addEventListener('input', function (e) {
            let value = e.target.value.replace(/,/g, '');
            if (!isNaN(value) && value.length > 0) {
                e.target.value = Number(value).toLocaleString('en-US');
            } else {
                e.target.value = '';
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll("form.dropzone").forEach(formEl => {
                const dz = new Dropzone(formEl, {
                    url: "{{ route('storemedia') }}",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    maxFilesize: 20,
                    acceptedFiles: 'image/*,video/*,application/pdf,application/msword,...',
                    dictDefaultMessage: "فایل‌ها را اینجا رها کنید یا کلیک کنید برای انتخاب",

                    init: function () {
                        this.on("success", function (file, response) {
                            const extension = file.name.split('.').pop().toLowerCase();
                            previewFile(response.file_path.replace(/^\/+/, ''), extension);
                            showToast("✅ فایل با موفقیت آپلود شد");
                        });

                        this.on("error", function (file, response) {
                            showToast("❌ خطا در آپلود فایل", "danger");
                        });
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let activeInputId = null;
            document.querySelectorAll('.file-selector').forEach(input => {
                input.addEventListener('click', function () {
                    const recordId = this.dataset.recordId;
                    activeInputId = this.dataset.inputId;

                    window.open(`{{ route('selectfile') }}?record_id=${recordId}`, 'FileManager', 'width=800,height=600');
                });
            });
            window.setFileUrl = function (url) {
                if (activeInputId) {
                    document.getElementById(activeInputId).value = url;
                }
            };
        });
    </script>
@endsection
