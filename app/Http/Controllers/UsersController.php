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
//        $data = User::all();
//        return view('users.users',['data'=>$data]);

        $data = User::all();

        return view('users.users', ['data' => $data]);
    }


//    go to create user form function
    public static function index_create(Request $request){
        return view('users.create');
    }

//    create user function
    public function create(Request $request)
    {
        // Validate the request
        $request->validate([
            'password' => 'required|confirmed|min:3',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // If validation passes, proceed with creating the user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telphone = $request->telphone;
        $user->permission = $request->permission;
        $user->gender = $request->gender;
        $user->password = Hash::make($request->input('password'));

        // Check if an image is provided, otherwise set a default image
        if ($request->has('image')) {

            $imageName = time() . '.' . $request->image->extension();
            $profile = $request->image->move(public_path('images'), $imageName);
            $user->image = $imageName;

        } else {

            $defaultImagePath = public_path('dist/img/no_profile.jpg');
            $defaultImageName = time() . '.' . pathinfo($defaultImagePath, PATHINFO_EXTENSION);
            copy($defaultImagePath, public_path('images') . '/' . $defaultImageName);
            $user->image = $defaultImageName;

        }

        $user->save();

        return redirect(route('index_user'))
            ->withInput($request->except(['password', 'password_confirmation']));
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

    public static function index_update_user(Request $request){
        $user_id = $request->query('id');
        $data = User::find($user_id);
        return view('users.update', ['data'=>$data]);
    }

    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'password' => 'sometimes|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find($request->id);

        if ($user) {
            // Update user fields
            $user->name = $request->name;
            $user->email = $request->email;
            $user->telphone = $request->telphone;
            $user->permission = $request->permission;
            $user->gender = $request->gender;

            // Update password only if provided
            if ($request->filled('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            if($user->save()){
                if (isset($request->image)) {
                    $oldImage = $user->image;
                    $request->image->move(public_path('images'), $oldImage);
                    $user->image = $oldImage;
                    $user->save();
                }
            }
        }

        return redirect(route('index_user'));
    }


}
