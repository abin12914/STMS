<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Teacher;
use App\Http\Requests\LeaveRegistrationRequest;

class LeaveController extends Controller
{
    /**
     * Return view for leave registration
     */
    public function leaveRegister()
    {
        $teachers   = Teacher::where('status', 1)->get();
        $leaves     = Leave::where('status', 1)->where('leave_date',">=",date('Y-m-d'))->paginate(10);

        return view('substitution.leave-register', [
                'teachers'  => $teachers,
                'leaves'    => $leaves,
            ]);
    }

    /**
     * action for leave registration
     */
    public function leaveRegisterAction(LeaveRegistrationRequest $request)
    {
        $teacherId      = $request->get('teacher_id');
        $leaveDate      = $request->get('leave_date');
        $msgLeaveDate   = $leaveDate;
        $teacherName    = "";

        $leaveDate  = date('Y-m-d', strtotime($leaveDate));
        $teacher    = Teacher::find($teacherId);
        if(!empty($teacher) && !empty($teacher->id)) {
            $teacherName    = $teacher->teacher_name;
        }

        $leaveFlag  = Leave::where('leave_date', $leaveDate)->where('teacher_id', $teacherId)->first();

        if(!empty($leaveFlag) && !empty($leaveFlag->id)) {
            return redirect()->back()->withInput()->with("message","Error! Leave for the teacher, ". $teacherName. " on ". $msgLeaveDate." is already registered!<small class='pull-right'> #00/00</small>")->with("alert-class","alert-danger");
        }

        $leave = new Leave;
        $leave->teacher_id  = $teacherId;
        $leave->leave_date  = $leaveDate;
        $leave->status      = 1;
        if($leave->save()) {
            return redirect()->back()->with("message","Saved successfully")->with("alert-class","alert-success");
        } else {
            return redirect()->back()->withInput()->with("message","Failed to save the leave details. Try again after reloading the page!<small class='pull-right'> #00/00</small>")->with("alert-class","alert-danger");
        }
    }
}