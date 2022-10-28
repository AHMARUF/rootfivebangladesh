<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Session;
use Illuminate\Support\Facades\Redirect;
class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('auth.change');
    }
    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'oldpassword' => 'required', 
            'password' => 'required|confirmed', 
        ]);

        $hashedPassword = Auth::user()->password;
        
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = Admin::find(Auth::id());
            $user['password'] = Hash::make($request->password);
            $user->Save();

            /*Auth::logout();*/
                if($user){
                    $notification = array(
                        'message' => 'Password is Change Successfully',
                        'alert-type' => 'success'
                    );
                    return Redirect('admin/home')->with($notification); 
                }
        }
        else{

             $notification = array(
                'message' => 'Current Password is invalid',
                'alert-type' => 'success'
            );

          return Redirect()->back()->with($notification);   
        }

    }
}
