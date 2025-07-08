<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\MenuPanel;
use App\Models\Project;
use App\Models\SubmenuPanel;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function index(Request $request)
    {

        $submenupanels  = SubmenuPanel::select('id','priority','title','label','menu_id','slug','status','class','controller')->get();
        $menupanels     = Menupanel::select('id','priority', 'title','label', 'slug', 'status' , 'class' , 'controller')->get();
        $projects       = Project::all();
        $thispage       = [
            'title'   => 'مدیریت پروژه ها',
            'list'    => 'لیست پروژه ها',
            'add'     => 'افزودن پروژه ها',
            'create'  => 'ایجاد پروژه ها',
            'enter'   => 'ورود پروژه ها',
            'edit'    => 'ویرایش پروژه ها',
            'delete'  => 'حذف پروژه ها',
        ];

        if ($request->ajax()) {
            $data = Project::all();
            return Datatables::of($data)
                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('company_name', function ($data) {
                    return ($data->company_name);
                })
                ->addColumn('CEO', function ($data) {
                    return ($data->CEO);
                })
                ->addColumn('portfo_status', function ($data) {
                    return ($data->portfo_status);
                })
                ->addColumn('flow_level', function ($data) {
                    return ($data->flow_level);
                })
                ->addColumn('progress_percentage', function ($data) {
                    return ($data->progress_percentage . '%');
                })
                ->addColumn('activity_status', function ($data) {
                    return ($data->activity_status);
                })
                ->addColumn('start_date', function ($data) {
                    return ($data->start_date);
                })
                ->addColumn('amount_request_accept', function ($data) {
                    return (number_format($data->amount_request_accept));
                })
                ->addColumn('amount_deposited', function ($data) {
                    return (number_format($data->amount_deposited));
                })
                ->addColumn('amount_commitment_first_stage', function ($data) {
                    return (number_format($data->amount_commitment_first_stage));
                })
                ->addColumn('first_stage_payment', function ($data) {
                    return (number_format($data->first_stage_payment));
                })
                ->addColumn('amount_commitment_second_stage', function ($data) {
                    return (number_format($data->amount_commitment_second_stage));
                })
                ->addColumn('second_stage_payment', function ($data) {
                    return (number_format($data->second_stage_payment));
                })
                ->addColumn('amount_commitment_third_stage', function ($data) {
                    return (number_format($data->amount_commitment_third_stage));
                })
                ->addColumn('third_stage_payment', function ($data) {
                    return (number_format($data->third_stage_payment));
                })
                ->addColumn('amount_commitment_fourth_stage', function ($data) {
                    return (number_format($data->amount_commitment_fourth_stage));
                })
                ->addColumn('fourth_stage_payment', function ($data) {
                    return (number_format($data->fourth_stage_payment));
                })
                ->addColumn('amount_commitment_fifth_stage', function ($data) {
                    return (number_format($data->amount_commitment_fifth_stage));
                })
                ->addColumn('fifth_stage_payment', function ($data) {
                    return (number_format($data->fifth_stage_payment));
                })
                ->addColumn('commitment_balance', function ($data) {
                    return (number_format($data->commitment_balance));
                })
                ->editColumn('action', function ($data) {
                    $actionBtn = '';
                    if (auth()->user()->can('can-access', ['project', 'edit'])) {
                        $actionBtn .= '<button type="button" data-bs-toggle="modal" data-bs-target="#editModal'.$data->id.'" class="btn btn-sm btn-icon btn-outline-primary"><i class="mdi mdi-pencil-outline"></i></button>';
                    }
                    if (auth()->user()->can('can-access', ['project', 'delete'])) {
                        $actionBtn .= '<button class="btn btn-sm btn-icon btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal'.$data->id.'"><i class="mdi mdi-delete-outline"></i></button>';
                    }
                    $actionBtn .= '<button class="btn btn-sm btn-icon btn-eye" data-bs-toggle="modal" data-bs-target="#showModal'.$data->id.'"><i class="mdi mdi-eye"></i></button>';

                    $actionBtn .= '<button class="btn btn-sm btn-icon btn-image" data-bs-toggle="modal" data-bs-target="#uploadModal'.$data->id.'"><i class="mdi mdi-file-document-multiple-outline"></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('panel.project')->with(compact(['thispage' , 'submenupanels' , 'menupanels' , 'projects']));
    }

    public function store(Request $request)
    {
        try {
            $project = new Project();
            $project->title                         = $request->input('title');
            $project->company_name                  = $request->input('company_name');
            $project->CEO                           = $request->input('CEO');
            $project->portfo_status                 = $request->input('portfo_status');
            $project->flow_level                    = $request->input('flow_level');
            $project->progress_percentage           = $request->input('progress_percentage');
            $project->activity_status               = $request->input('activity_status');
            $project->start_date                    = $request->input('start_date');
            $project->amount_request_accept         = $request->input('amount_request_accept');
            $project->amount_deposited              = $request->input('amount_deposited');
            $project->amount_commitment_first_stage = $request->input('amount_commitment_first_stage');
            $project->first_stage_payment           = $request->input('first_stage_payment');
            $project->amount_commitment_second_stage= $request->input('amount_commitment_second_stage');
            $project->second_stage_payment          = $request->input('second_stage_payment');
            $project->amount_commitment_third_stage = $request->input('amount_commitment_third_stage');
            $project->third_stage_payment           = $request->input('third_stage_payment');
            $project->amount_commitment_fourth_stage= $request->input('amount_commitment_fourth_stage');
            $project->fourth_stage_payment          = $request->input('fourth_stage_payment');
            $project->amount_commitment_fifth_stage = $request->input('amount_commitment_fifth_stage');
            $project->fifth_stage_payment           = $request->input('fifth_stage_payment');
            $project->commitment_balance            = $request->input('commitment_balance');

            $result = $project->save();

            if ($result == true) {
                $success = true;
                $flag    = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات زیرمنو با موفقیت ثبت شد';
            }
            elseif($result != true) {
                $success = false;
                $flag    = 'error';
                $subject = 'عملیات نا موفق';
                $message = 'اطلاعات زیرمنو ثبت نشد، لطفا مجددا تلاش نمایید';
            }

        } catch (Exception $e) {

            $success = false;
            $flag    = 'error';
            $subject = 'خطا در ارتباط با سرور';
            //$message = strchr($e);
            $message = 'اطلاعات زیرمنو ثبت نشد،لطفا بعدا مجدد تلاش نمایید ';
        }

        return response()->json(['success'=>$success , 'subject' => $subject, 'flag' => $flag, 'message' => $message]);

//        return redirect(route('menudashboards.index'));

    }

    public function update(Request $request)
    {

        $project = Project::findOrfail($request->input('id'));
        $project->title                         = $request->input('title');
        $project->company_name                  = $request->input('company_name');
        $project->CEO                           = $request->input('CEO');
        $project->portfo_status                 = $request->input('portfo_status');
        $project->flow_level                    = $request->input('flow_level');
        $project->progress_percentage           = $request->input('progress_percentage');
        $project->activity_status               = $request->input('activity_status');
        $project->start_date                    = $request->input('start_date');
        $project->amount_request_accept         = $request->input('amount_request_accept');
        $project->amount_deposited              = $request->input('amount_deposited');
        $project->amount_commitment_first_stage = $request->input('amount_commitment_first_stage');
        $project->first_stage_payment           = $request->input('first_stage_payment');
        $project->amount_commitment_second_stage= $request->input('amount_commitment_second_stage');
        $project->second_stage_payment          = $request->input('second_stage_payment');
        $project->amount_commitment_third_stage = $request->input('amount_commitment_third_stage');
        $project->third_stage_payment           = $request->input('third_stage_payment');
        $project->amount_commitment_fourth_stage= $request->input('amount_commitment_fourth_stage');
        $project->fourth_stage_payment          = $request->input('fourth_stage_payment');
        $project->amount_commitment_fifth_stage = $request->input('amount_commitment_fifth_stage');
        $project->fifth_stage_payment           = $request->input('fifth_stage_payment');
        $project->commitment_balance            = $request->input('commitment_balance');
        $result = $project->update();
        try{
            if ($result == true) {
                $success = true;
                $flag    = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات با موفقیت ثبت شد';
            }
            else {
                $success = false;
                $flag    = 'error';
                $subject = 'عملیات نا موفق';
                $message = 'اطلاعات ثبت نشد، لطفا مجددا تلاش نمایید';
            }

        } catch (Exception $e) {

            $success = false;
            $flag    = 'error';
            $subject = 'خطا در ارتباط با سرور';
            //$message = strchr($e);
            $message = 'اطلاعات ثبت نشد،لطفا بعدا مجدد تلاش نمایید ';
        }

        return response()->json(['success'=>$success , 'subject' => $subject, 'flag' => $flag, 'message' => $message]);
    }

    public function destroy(Request $request)
    {
        try {
            $project = Project::findOrfail($request->input('id'));
            $result = $project->delete();

            if ($result == true) {
                $success = true;
                $flag = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات با موفقیت پاک شد';
            }elseif($result != true) {
                $success = false;
                $flag    = 'error';
                $subject = 'عملیات نا موفق';
                $message = 'اطلاعات زیرمنو ثبت نشد، لطفا مجددا تلاش نمایید';
            }

        } catch (Exception $e) {

            $success = false;
            $flag    = 'error';
            $subject = 'خطا در ارتباط با سرور';
            $message = 'اطلاعات پاک نشد،لطفا بعدا مجدد تلاش نمایید ';
        }
        return response()->json(['success'=>$success , 'subject' => $subject, 'flag' => $flag, 'message' => $message]);
    }
}
