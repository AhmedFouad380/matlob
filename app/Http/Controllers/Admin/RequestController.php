<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Job;
use App\Models\JobRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RequestController extends Controller
{
    public function index($id = null)
    {

        return view('admin.JobRequests.index',compact('id'));
    }

    public function datatable(Request $request)
    {
        $data = JobRequest::where('job_id', $request->id)->orderBy('id', 'asc');


        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->addColumn('name', function ($row) {

                    $data = '<a href="/User-Profile/' . $row->User->id . '" target="_blank">' . $row->User->name . '</a>';

                if ($data) {
                    return $data;
                } else {
                    return '';
                }
            })
            ->addColumn('Age', function ($row) {
                $data = $row->User->age;
                if ($data) {
                    return $data;
                } else {
                    return '';
                }
            })
            ->addColumn('Address', function ($row) {
                $data = $row->User->Country->name . ' - ' . $row->User->City->name;
                if ($data) {
                    return $data;
                } else {
                    return '';
                }
            })
            ->editColumn('created_at', function ($row) {
                $data = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->diffForHumans();
                if ($data) {
                    return $data;
                } else {
                    return '';
                }
            })
            ->addColumn('actions', function ($row) {

                $actions = ' <a href="' . url("AcceptApplication/" . $row->id) . '" class="btn btn-success"><i class="bi bi-pencil-fill"></i> قبول </a>';
                $actions .= ' <a href="' . url("RejectApplication/" . $row->id) . '" class="btn btn-active-danger"><i class="bi bi-pencil-fill"></i> رفض </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'is_active', 'Address', 'Age'])
            ->make();

    }

    public function store(Request $request)
    {

        $data = new JobRequest();
        $data->user_id  = $request->user_id ;
        $data->job_id  = $request->job_id ;
        $data->type = 'new';
        $data->company_id  = Job::find($request->job_id)->company_id;
        $data->user_name = $request->user_name;
        $data->user_cv = $request->user_cv;
        $data->user_phone = $request->user_phone;
        $data->admin_id = Auth::guard('admin')->id();
        $data->save();

        return back()->with('message', 'success');
    }


    public function update(Request $request)
    {

        $data = JobRequest::find($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->is_active = $request->is_active;
        $data->updated_by = Auth::guard('admin')->id();
        $data->image = $request->image;
        $data->save();

        return back()->with('message', 'success');
    }


    public function edit($id)
    {
        $employee = JobRequest::findOrFail($id);
        return view('admin.JobRequest.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            JobRequest::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }
}
