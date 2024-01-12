<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClockInOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Carbon\Carbon;

class ClockOutController extends Controller
{

    public function clock_out(Request $request)
    {
        $this->checkValidation($request);
        $user_id = $request->query('id');

        // Find the corresponding clock-in record for the user
        $clock_out = ClockInOut::where('user_id', $user_id)
            ->whereNull('clock_out_time')->first();

        if ($clock_out) {
            // Update the clock-out information
            $clock_out->clock_out_ip = $request->ip();
            $clock_out->clock_out_time = now();
            $clock_out->remark = null;
            $clock_out->save();

            return redirect('/admin')->with('status', 'Clock Out Successfully');
        }

        return redirect('/admin')->with('status', 'Clock Out Failed. No matching clock-in record found.');
    }
    //check validation function
    public function checkValidation($data)
    {
        $this->validate($data, [
            'id' => 'required|numeric',
        ]);
    }
}
