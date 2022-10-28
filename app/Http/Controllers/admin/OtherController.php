<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\About;
use App\Models\Privacy;
use App\Models\Terms;
class OtherController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function message_all()
    {
        $data= Contact::orderBy('id',"DESC")->get();
        return view('admin.message_all',compact('data'));
    }
    public function message_de($id)
    {
        $data = Contact::find($id);
        $data->delete();
        if ($data) 
        {
            $notification = array(
                'message' => ' Message delete Successful!',
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

    public function about_page()
    {
        $data=About::where('id', '1')->first();
        return view('admin.pages.aboutus',compact('data'));
    }

    public function about_store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',  
        ]);
        $data = About::find(1);
        $data['content'] = $request->content;
        $data->save();
        if ($data) 
        {
            $notification = array(
                'message' => 'Update Successfuly',
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



    public function Privacy_Policy()
    {
        $data=Privacy::where('id', '1')->first();
        return view('admin.pages.Privacy_Policy',compact('data'));
    }

    public function privacy_store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',  
        ]);
        $data = Privacy::find(1);
        $data['content'] = $request->content;
        $data->save();
        if ($data) 
        {
            $notification = array(
                'message' => 'Update Successfuly',
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


    public function Terms_And_Conditions()
    {
        $data=Terms::where('id', '1')->first();
        return view('admin.pages.Terms_And_Conditions',compact('data'));
    }

    public function terms_store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',  
        ]);
        $data = Terms::find(1);
        $data['content'] = $request->content;
        $data->save();
        if ($data) 
        {
            $notification = array(
                'message' => 'Update Successfuly',
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
