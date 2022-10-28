<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;
use Intervention\Image\ImageManager;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $eidt = 00;
        $data= Category::orderBy('id',"DESC")->get();
        return view('admin.category.index',compact('data','eidt'));
    }

    public function alldata()
    {
        $data= Category::orderBy('id',"DESC")->get();
        return response()->json(['data'=>$data]);
    }

    public function store(Request $request)
    {

       $validatedData = $request->validate([
            'cat_name' => 'required|unique:categories',
            'image' => 'required',  
        ],[
            'cat_name.required' => 'Category Name Field is Required.',
        ]);
        $data = new Category;
        $data['cat_name'] = $request->cat_name;
        $data['slug'] = strtolower(str_replace(' ','-',$request->cat_name));
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $img_url = 'public/asset/dist/assets/images/category/'.$name_gen;
        Image::make($image)->resize(150,150)->save('public/asset/dist/assets/images/category/'.$name_gen);
        $data['image'] =$img_url;
        $data->save();
        if ($data) 
        {
            $notification = array(
                'message' => 'Category Store Successful. !',
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
       $data= Category::orderBy('id',"DESC")->get(); 
       $id =$request->id;
       $category = Category::find($id);
        return view('admin.category.index',compact('category','eidt','data'));
    }


     public function update(Request $request)
    {
        $validatedData = $request->validate([
            'cat_name' => 'required', 
        ],[
            'cat_name.required' => 'Category Name Field is Required.',
        ]);
        $id = $request->id;
        $data=Category::find($id);
        $data['cat_name'] = $request->cat_name;
        $data['slug'] = strtolower(str_replace(' ','-',$request->cat_name));
        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img_url = 'public/asset/dist/assets/images/category/'.$name_gen;
            Image::make($image)->resize(120,120)->save('public/asset/dist/assets/images/category/'.$name_gen);
            $data['image'] =$img_url;
            unlink($request->old_img);
        }else{
            $data['image'] =$request->old_img;
        }
        $data->save();
        if ($data) 
        {
            $notification = array(
                'message' => 'Category Update Successful!',
                'alert-type' => 'success'
            );
            return Redirect()->route('category')->with($notification);  
        }else{
            $notification = array(
                'message' => 'Pleace Try agin',
                'alert-type' => 'success'
            );

          return Redirect()->route('category')->with($notification);   
        }
    }

    public function destroy($id)
    {
        $data = Category::find($id);
        $data->delete();
        if ($data) 
        {
            $notification = array(
                'message' => 'Category delete Successful!',
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
       $data=Category::find($id)->update(['status'=>1]);
       if ($data) 
        {
            $notification = array(
                'message' => 'Category Active Successful!',
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
        $data=Category::find($id)->update(['status'=>0]);
        if ($data) 
        {
            $notification = array(
                'message' => 'Category Inactive Successful!',
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
