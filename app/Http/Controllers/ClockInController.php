<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\ClockInOut;
use App\Models\User; // Import the User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;


class ClockInController extends Controller
{
    public static function index(Request $request)
    {
        // Fetch the authenticated user
        $user = Auth::user();

        // Check if a date range is selected
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        // Fetch ClockInOut records where user_id is equal to the authenticated user's id and filter by date range
        $query = ClockInOut::where('user_id', $user->id);

        if ($startDate && $endDate) {
            $query->whereDate('clock_in_time', '>=', $startDate)
                ->whereDate('clock_in_time', '<=', $endDate);
        }

        // Order by clock_in_time in descending order
        $data = $query->orderByDesc('clock_in_time')->get();

        return view('users.time_table', ['data' => $data]);
    }


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
            $clock_in->clock_in_time = now();
            $clock_in->save();
            return redirect('/admin')->with('status', 'Clock In Successfully');
    }
    //check validation function
    public function checkValidation($data)
    {
//        $this->validate($data, [
//            'id' => 'required|numeric',
//        ]);
        $user_id = $data->input('id');

        $existingClockIn = ClockInOut::where('user_id', $user_id)
            ->whereDate('clock_in_time', now()->toDateString())
            ->first();

        if ($existingClockIn) {
            throw ValidationException::withMessages([
                'clock_in' => ['You have already clocked in for today.'],
            ]);
        }
    }
//    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
//    {
//        // Throw a validation exception with the error messages
//        throw new ValidationException($validator, response()->json(['error' => $validator->errors()], 422));
//    }
}
