<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Image;
use Intervention\Image\ImageManager;
class BannerController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $eidt = 00;
        $data= Banner::orderBy('id',"DESC")->get();
        return view('admin.banner.index',compact('data','eidt'));
    }

    public function alldata()
    {
        $data= Banner::orderBy('id',"DESC")->get();
        return response()->json(['data'=>$data]);
    }

    public function store(Request $request)
    {

       $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'required',  
        ]);
        $data = new Banner;
        $data['title'] = $request->title;
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $img_url = 'public/asset/dist/assets/images/banner/'.$name_gen;
        Image::make($image)->resize(1295,500)->save('public/asset/dist/assets/images/banner/'.$name_gen);
        $data['image'] =$img_url;
        $data->save();
        if ($data) 
        {
            $notification = array(
                'message' => 'Banner Store Successful!',
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

    public function eidt(Request $request)
    {
       $eidt = 010;
       $id = $request->id;
       $data= Banner::orderBy('id',"DESC")->get();
       $data1 = Banner::find($id);
        return view('admin.banner.index',compact('eidt','data1','data'));
    }


     public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required', 
        ]);
        $id = $request->id;
        $data=Banner::find($id);
        $data['title'] = $request->title;

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img_url = 'public/asset/dist/assets/images/banner/'.$name_gen;
            Image::make($image)->resize(1295,500)->save('public/asset/dist/assets/images/banner/'.$name_gen);
            $data['image'] =$img_url;
            unlink($request->old_img);
        }else{
            $data['image'] =$request->old_img;
        }
        $data->save();
        if ($data) 
        {
            $notification = array(
                'message' => 'Banner Update Successful!',
                'alert-type' => 'success'
            );
            return Redirect()->route('Banner')->with($notification);  
        }else{
            $notification = array(
                'message' => 'Pleace Try agin',
                'alert-type' => 'success'
            );

          return Redirect()->route('Banner')->with($notification);   
        }
    }

    public function destroy($id)
    {
        $data = Banner::find($id);
        $data->delete();
        if ($data) 
        {
            $notification = array(
                'message' => 'Banner delete Successful!',
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

    public function active(Request $request)
    {
       $id =$request->id;
       $data=Banner::find($id)->update(['status'=>1]);
       if ($data) 
        {
            $notification = array(
                'message' => 'Banner Active Successful!',
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

    public function unactive(Request $request)
    {
        $id =$request->id;
        $data=Banner::find($id)->update(['status'=>0]);
        if ($data) 
        {
            $notification = array(
                'message' => 'Banner Inactive Successful!',
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
