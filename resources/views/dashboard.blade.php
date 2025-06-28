@extends('layouts.base')

@section('title', 'داشبورد')

@section('content')

    <div class="row gy-4 mb-4">
    <div class="alert alert-info"> {{Auth::user()->name}} خوش آمدید به داشبورد مدیریت 👋</div>

    </div>
    <div class="row gy-4 mb-4">

    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-6">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                    <div class="avatar">
{{--                        <div class="avatar-initial bg-label-primary rounded">--}}
{{--                            <i class="mdi mdi-cart-plus mdi-24px"></i>--}}
{{--                        </div>--}}
                    </div>
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <p class="mb-0 text-success me-1"></p>--}}
{{--                        <i class="mdi mdi-chevron-up text-success"></i>--}}
{{--                    </div>--}}
                </div>
                <div class="card-info mt-4 pt-1">
                    <h5 class="mb-2">{{DB::table('projects')->count()}}</h5>
                    <p class="text-muted">مجموع کل طرح های ثبت شده</p>
{{--                    <div class="badge bg-label-secondary rounded-pill">4 ماه پیش</div>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-6">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                    <div class="avatar">
{{--                        <div class="avatar-initial bg-label-success rounded">--}}
{{--                            <i class="mdi mdi-currency-usd mdi-24px"></i>--}}
{{--                        </div>--}}
                    </div>
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <p class="mb-0 text-success me-1">+38%</p>--}}
{{--                        <i class="mdi mdi-chevron-up text-success"></i>--}}
{{--                    </div>--}}
                </div>
                <div class="card-info mt-4 pt-1">
                    <h5 class="mb-2">{{DB::table('projects')->whereFlow_level('درحال انجام تعهدات')->count()}}</h5>
                    <p class="text-muted">طرح های سرمایه گذاری شده</p>
{{--                    <div class="badge bg-label-secondary rounded-pill">6 ماه پیش</div>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-6">
        <div class="card h-100">
            <div class="card-header pb-0">
                <div class="d-flex align-items-end mb-1 flex-wrap gap-2">
                    <h4 class="mb-0 me-2">{{DB::table('projects')->whereFlow_level('خروج کامل')->count()}}</h4>
{{--                    <p class="mb-0 text-danger">-18%</p>--}}
                </div>
                <span class="d-block mb-2 text-muted">طرح های خاتمه یافته</span>
            </div>
            <div class="card-body">
                <div id="totalProfitChart"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-6">
        <div class="card h-100">
            <div class="card-header pb-0">
                <div class="d-flex align-items-end mb-1 flex-wrap gap-2">
                    <h4 class="mb-0 me-2">{{DB::table('projects')->whereFlow_level('رد طرح')->count()}}</h4>
                    <p class="mb-0 text-success">+16%</p>
                </div>
                <span class="d-block mb-2 text-muted">طرح های رد شده</span>
            </div>
            <div class="card-body">
                <div id="totalGrowthChart"></div>
            </div>
        </div>
    </div>

    </div>
@endsection
