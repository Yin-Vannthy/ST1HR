<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClockInOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ClockInController extends Controller
{

    public function clock_in(Request $request)
    {
//        if($request->ip() != '96.9.66.88'){
//            return redirect('/admin')->with('status', "Please Connect To Company's Wifi");
//        }

        $this->checkValidation($request);
        $user_id = $request->query('id');

        $clock_in = new ClockInOut();

        $clock_in->user_id = $user_id;
        $clock_in->clock_in_ip = $request->ip();
        $clock_in->clock_out_ip = null;
        $clock_in->remark = null;
        $clock_in->save();
        return redirect('/admin')->with('status', 'Clock In Successfully');
    }
    //check validation function
    public function checkValidation($data)
    {
        $this->validate($data, [
            'id' => 'required|numeric',
        ]);
    }
}
