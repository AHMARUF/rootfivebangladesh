<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $eidt = 00;
        $data= Subcategory::orderBy('id',"DESC")->get();
        return view('admin.subcategory.index',compact('data','eidt'));
    }

    public function alldata()
    {
        $data= Subcategory::orderBy('id',"DESC")->get();
        return response()->json(['data'=>$data]);
    }

    public function store(Request $request)
    {

       $validatedData = $request->validate([
            'sub_cat_name' => 'required',
            'cat_id' => 'required', 
        ],[
            'sub_cat_name.required' => 'Sub Category Name Field is Required.',
            'cat_id.required' => 'Category Name Field is Required.',
        ]);
        $data = new Subcategory;
        $data['sub_cat_name'] = $request->sub_cat_name;
        $data['cat_id'] = $request->cat_id;
        $data['slug'] = strtolower(str_replace(' ','-',$request->sub_cat_name."-".$request->cat_id));
        $data->save();
        if ($data) 
        {
            $notification = array(
                'message' => 'Sub Category Store Successful. !',
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
       $data= Subcategory::orderBy('id',"DESC")->get(); 
       $id =$request->id;
       $Subcategory = Subcategory::find($id);
        return view('admin.subcategory.index',compact('Subcategory','eidt','data'));
    }


     public function update(Request $request)
    {
        $validatedData = $request->validate([
            'sub_cat_name' => 'required',
            'cat_id' => 'required', 
        ],[
            'sub_cat_name.required' => 'Sub Category Name Field is Required.',
            'cat_id.required' => 'Category Name Field is Required.',
        ]);
        $id = $request->id;
        $data=Subcategory::find($id);
        $data['sub_cat_name'] = $request->sub_cat_name;
        $data['cat_id'] = $request->cat_id;
        $data['slug'] = strtolower(str_replace(' ','-',$request->sub_cat_name."-".$request->cat_id));
        $data->save();
        if ($data) 
        {
            $notification = array(
                'message' => 'Sub Category Update Successful!',
                'alert-type' => 'success'
            );
            return Redirect()->route('Sub/category')->with($notification);  
        }else{
            $notification = array(
                'message' => 'Pleace Try agin',
                'alert-type' => 'success'
            );

          return Redirect()->route('Sub/category')->with($notification);   
        }
    }

    public function destroy($id)
    {
        $data = Subcategory::find($id);
        $data->delete();
        if ($data) 
        {
            $notification = array(
                'message' => 'Sub Category delete Successful!',
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
       $data=Subcategory::find($id)->update(['status'=>1]);
       if ($data) 
        {
            $notification = array(
                'message' => 'Sub Category Active Successful!',
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
        $data=Subcategory::find($id)->update(['status'=>0]);
        if ($data) 
        {
            $notification = array(
                'message' => 'Sub Category Inactive Successful!',
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
