<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //fetch data from user table function
    public static function index(Request $request){
        $data = User::all();

        return view('users.users',['data'=>$data]);
    }

//    go to create user form function
    public static function index_create(Request $request){
        return view('users.create');
    }

//    create user function
    public function create(Request $request){
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->telphone = $request->telphone;
        $user->permission = $request->permission;
        $user->gender = $request->gender;
        $user->password = Hash::make($request->input('password'));

        if ($user->save()){
            if (isset($request->image)){
                $imageName = time().'.'.$request->image->extension();
                $profile =  $request->image->move(public_path('images'), $imageName);
                $user->image = $imageName;
                $user->save();
            }
        }

        return redirect(route('index_user'));
    }

//    confirm delete function
    public static function confirm_delete(Request $request){
        $user_id = $request->query('id');
        $data = User::find($user_id);

        return view('users.confirm_delete', ['data'=>$data]);
    }
//    after confirm delete
    public static function delete_user(Request $request){
        $user_id = $request->id;
        $data = User::find($user_id);
        if ($data){
            $data->delete();
        }
        return redirect(route('index_user'));
    }


}
