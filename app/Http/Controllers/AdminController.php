<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;
use Session;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Carbon;
class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    
    public function otp_check()
    {
        
       $code =sprintf("%06d", mt_rand(1, 999999));
        session::put('code_check', $code);
        $data = [
          'subject' => "Admin Panel Login code",
          'email' => 'amdadulhasan133@gmail.com',
          'content' => $code,
        ];
        

         Mail::send('emails.opt_code', $data, function($message) use ($data) {
          $message->to($data['email'])
          ->subject($data['subject']);
        });

        
        return Redirect('admin/verify'); 
         
    }
    public function otp_page()
    {
        return view('admin.verify');
    }
    public function validate_otp(Request $request)
    {
        
        $id1 = $request->id1;
        $id2 = $request->id2;
        $id3 = $request->id3;
        $id4 = $request->id4;
        $id5 = $request->id5;
        $id6 = $request->id6;
        $code= $id1.$id2.$id3.$id4.$id5.$id6;
        $code_check= Session::get('code_check');

        $ip      =  $request->ip();
        $device  =  $request->header('User-Agent');
        $time    = Carbon\Carbon::now()->format('d-m-Y h:i:s a');
        $data = [
          'subject' => "Admin panel Login Information",
          'email' => 'amdadulhasan133@gmail.com',
          'content' => $ip,
          'content1' => $device,
          'content2' => $time,
        ];
        
        if ($code == $code_check) {
            Session::put('code_success',$code);
            Mail::send('emails.info', $data, function($message) use ($data) {
              $message->to($data['email'])
              ->subject($data['subject']);
            });
            return Redirect('admin/home'); 
        }else{
            $notification = array(
                'message' => 'Pleace Try agin',
                'alert-type' => 'success'
            );

          return Redirect()->back()->with($notification); 
        }
    }

    public function index()
    {
       /* if (Session::get('code_success')) {
            return view('admin.home');
        }else{
             return Redirect('admin/verify'); 
        }*/
        
        return view('admin.home');
        
    }


    public function logout()
    {
        Auth::logout();
        return Redirect()->route('admin.login');
    }

    public function users()
    {
        return view('admin.user');
    }

    public function destroy_u($id)
    {
        $data = User::find($id);
        $data->delete();
        if ($data) 
        {
            $notification = array(
                'message' => ' User delete Successfuly',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);  
        }else{
            $notification = array(
                'message' => 'Pleace Try agin',
                'alert-type' => 'success'
            );

          return Redirect()->back()->with($notification);   
        }
    }


    public function orders()
    {
        return view('admin.order');
    }

    public function view_o(Request $request)
    {
        $id = $request->id;
        $order = DB::table('orders')->where('id', $id)->first();
        return view('admin.order_view', compact('order'));
    } 

    public function completed($order)
    {
        $data =DB::table('orders')
                ->where('uni', $order)
                ->update(['status' => "completed"]); 
        if ($data) 
        {
            $notification = array(
                'message' => ' Order Completed',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.order')->with($notification);  
        }else{
            $notification = array(
                'message' => 'Pleace Try agin',
                'alert-type' => 'success'
            );

          return Redirect()->route('all.order')->with($notification);   
        }
    }

    public function destroy_o($id)
    {
        $data =  DB::table('orders')->where('id', $id)->delete();
        if ($data) 
        {
            $notification = array(
                'message' => ' Order delete Successfuly',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);  
        }else{
            $notification = array(
                'message' => 'Pleace Try agin',
                'alert-type' => 'success'
            );

          return Redirect()->back()->with($notification);   
        }
    }
}
