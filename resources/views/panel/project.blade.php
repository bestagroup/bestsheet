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
                        <form action="{{route(request()->segment(2).'.update' , $project->id)}}" id="editform_{{$project->id}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="menu_id" id="menu_id_{{$project->id}}" value="{{$project->id}}" />
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label class="form-label">نام تجاری طرح</label>
                                    <input type="text" name="title" id="title" value="{{$project->title}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">نام شرکت</label>
                                    <input type="text" name="company_name" id="company_name" value="{{$project->company_name}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مدیرعامل شرکت</label>
                                    <input type="text" name="CEO" id="CEO" value="{{$project->CEO}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">وضعیت پرتفو</label>
                                    <input type="text" name="portfo_status" id="portfo_status" value="{{$project->portfo_status}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مرحله فرایند شرکت</label>
                                    <input type="text" name="flow_level" id="flow_level" value="{{$project->flow_level}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">درصد پیشرفت</label>
                                    <input type="text" name="progress_percentage" id="progress_percentage" value="{{$project->progress_percentage}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">وضعیت فعالیت</label>
                                    <input type="text" name="activity_status" id="activity_status" value="{{$project->activity_status}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">تاریخ شروع قرارداد</label>
                                    <input type="text" name="start_date" id="start_date" value="{{$project->start_date}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مبلغ درخواستی تایید شده</label>
                                    <input type="text" name="amount_request_accept" id="amount_request_accept" value="{{number_format($project->amount_request_accept)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مبلغ واریز شده</label>
                                    <input type="text" name="amount_deposited" id="amount_deposited" value="{{number_format($project->amount_deposited)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مبلغ تعهد مرحله اول</label>
                                    <input type="text" name="amount_commitment_first_stage" id="amount_commitment_first_stage" value="{{number_format($project->amount_commitment_first_stage)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">واریز قسط مرحله اول</label>
                                    <input type="text" name="first_stage_payment" id="first_stage_payment" value="{{number_format($project->first_stage_payment)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مبلغ تعهد مرحله دوم</label>
                                    <input type="text" name="amount_commitment_second_stage" id="amount_commitment_second_stage" value="{{number_format($project->amount_commitment_second_stage)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">واریز قسط مرحله دوم</label>
                                    <input type="text" name="second_stage_payment" id="second_stage_payment" value="{{number_format($project->second_stage_payment)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مبلغ تعهد مرحله سوم</label>
                                    <input type="text" name="amount_commitment_third_stage" id="amount_commitment_third_stage" value="{{number_format($project->amount_commitment_third_stage)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">واریز قسط مرحله سوم</label>
                                    <input type="text" name="third_stage_payment" id="third_stage_payment" value="{{number_format($project->third_stage_payment)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مبلغ تعهد مرحله چهارم</label>
                                    <input type="text" name="amount_commitment_fourth_stage" id="amount_commitment_fourth_stage" value="{{number_format($project->amount_commitment_fourth_stage)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">واریز قسط مرحله چهارم</label>
                                    <input type="text" name="fourth_stage_payment" id="fourth_stage_payment" value="{{number_format($project->fourth_stage_payment)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مبلغ تعهد مرحله پنجم</label>
                                    <input type="text" name="amount_commitment_fifth_stage" id="amount_commitment_fifth_stage" value="{{number_format($project->amount_commitment_fifth_stage)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">واریز قسط مرحله پنجم</label>
                                    <input type="text" name="fifth_stage_payment" id="fifth_stage_payment" value="{{number_format($project->fifth_stage_payment)}}" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">مانده تعهدات</label>
                                    <input type="text" name="commitment_balance" id="commitment_balance" value="{{number_format($project->commitment_balance)}}" class="form-control" />
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
@endsection
@section('script')
    <script src="{{asset('assets/vendor/js/dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendor/js/sweetalert2.js')}}"></script>
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
                        "_token"        : "{{ csrf_token() }}",
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
@endsection
