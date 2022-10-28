<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $eidt = 00;
        $data= Brand::orderBy('id',"DESC")->get();
        return view('admin.brand.index',compact('data','eidt'));
    }

    public function alldata()
    {
        $data= Brand::orderBy('id',"DESC")->get();
        return response()->json(['data'=>$data]);
    }

    public function store(Request $request)
    {

       $validatedData = $request->validate([
            'brand_name' => 'required',
            'sub_cat_id' => 'required', 
        ],[
            'brand_name.required' => 'Brand Name Field is Required.',
            'sub_cat_id.required' => 'Sub Category Name Field is Required.',
        ]);
        $data = new Brand;
        $data['brand_name'] = $request->brand_name;
        $data['sub_cat_id'] = $request->sub_cat_id;
        $data['slug'] = strtolower(str_replace(' ','-',$request->brand_name."-".$request->sub_cat_id));
        $data->save();
        if ($data) 
        {
            $notification = array(
                'message' => ' Brand Store Successful. !',
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
       $data= Brand::orderBy('id',"DESC")->get(); 
       $id =$request->id;
       $Brand = Brand::find($id);
        return view('admin.brand.index',compact('Brand','eidt','data'));
    }


     public function update(Request $request)
    {
         $validatedData = $request->validate([
            'brand_name' => 'required',
            'sub_cat_id' => 'required', 
        ],[
            'brand_name.required' => 'Brand Name Field is Required.',
            'sub_cat_id.required' => 'Sub Category Name Field is Required.',
        ]);
        $id = $request->id;
        $data=Brand::find($id);
        $data['brand_name'] = $request->brand_name;
        $data['sub_cat_id'] = $request->sub_cat_id;
        $data['slug'] = strtolower(str_replace(' ','-',$request->brand_name."-".$request->sub_cat_id));
        $data->save();
        if ($data) 
        {
            $notification = array(
                'message' => ' Brand Update Successful!',
                'alert-type' => 'success'
            );
            return Redirect()->route('brand')->with($notification);  
        }else{
            $notification = array(
                'message' => 'Pleace Try agin',
                'alert-type' => 'success'
            );

          return Redirect()->route('brand')->with($notification);   
        }
    }

    public function destroy($id)
    {
        $data = Brand::find($id);
        $data->delete();
        if ($data) 
        {
            $notification = array(
                'message' => ' Brand delete Successful!',
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

    public function active($id)
    {
       $data=Brand::find($id)->update(['status'=>1]);
       if ($data) 
        {
            $notification = array(
                'message' => ' Brand Active Successful!',
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

    public function unactive($id)
    {
        $data=Brand::find($id)->update(['status'=>0]);
        if ($data) 
        {
            $notification = array(
                'message' => ' Brand Inactive Successful!',
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
