<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Product;
use Image;
use Intervention\Image\ImageManager;
use App\Custom_ID\Id_generator;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create()
    {
       $product_code = Id_generator::IDGenerator(new Product, 'product_code', 6, 'PDTR');
        return view('admin.product.add',compact('product_code'));
    }

    public function index()
    {
       
        $data= Product::orderBy('id',"DESC")->get();
        return view('admin.product.manage_product',compact('data'));
    }

    public function view(Request $request)
    {
       $id = $request->id;
        $data= Product::where('id',$id)->first();
        return view('admin.product.view',compact('data'));
    }

    public function alldata()
    {
        $data= Product::orderBy('id',"DESC")->get();
        return response()->json(['data'=>$data]);
    }

    public function store(Request $request)
    {

       $validatedData = $request->validate([
            'product_Name' => 'required',
            'product_code' => 'required|unique:products',
            'cat_id' => 'required',
            'sub_cat_id' => 'required',
            'Key_Features' => 'required',
            /*'Specification' => 'required',*/
            /*'Description' => 'required',*/
            /*'latest_price' => 'required',*/
            'quantity' => 'required',
            'Price' => 'required', 
            'Regular_Price' => 'required', 
            'image' => 'required', 
        ],[
            'sub_cat_id.required' => 'Sub Category Name Field is Required.',
            'cat_id.required' => 'Category Name Field is Required.',
        ]);
        $data = new Product;
        $data['product_Name'] = $request->product_Name;
        $data['product_slug'] = strtolower(str_replace(' ','-',$request->product_Name));
        $data['product_code'] = $request->product_code;
        $data['cat_id'] = $request->cat_id;
        $data['sub_cat_id'] = $request->sub_cat_id;
        $data['brand_id'] = $request->brand_id;
        $data['PC_builder'] = $request->PC_builder;
        $data['Key_Features'] = $request->Key_Features;
        $data['Specification'] = $request->Specification;
        $data['Description'] = $request->Description;
        /*$data['latest_price'] = $request->latest_price;*/
        $data['quantity'] = $request->quantity;
        $data['Price'] = $request->Price;
        $data['Regular_Price'] = $request->Regular_Price;

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $img_url = 'public/asset/dist/assets/images/product/'.$name_gen;
        Image::make($image)->resize(500,500)->save('public/asset/dist/assets/images/product/'.$name_gen);
        $data['image'] =$img_url;
        $data->save();
        if ($data) 
        {
            $notification = array(
                'message' => 'Product Store Successfuly!',
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
        $id = $request->id;
       $data = Product::find($id);
        return view('admin.product.eidt',compact('data'));
    }


     public function update(Request $request)
    {
        /*$validatedData = $request->validate([
            'sub_cat_name' => 'required',
            'cat_id' => 'required', 
        ],[
            'sub_cat_name.required' => 'Sub Category Name Field is Required.',
            'cat_id.required' => 'Category Name Field is Required.',
        ]);*/
        $id = $request->id;
        $data=Product::find($id);
        $data['product_Name'] = $request->product_Name;
        $data['product_slug'] = strtolower(str_replace(' ','-',$request->product_Name));
        $data['product_code'] = $request->product_code;
        $data['cat_id'] = $request->cat_id;
        $data['sub_cat_id'] = $request->sub_cat_id;
        $data['brand_id'] = $request->brand_id;
        $data['PC_builder'] = $request->PC_builder;
        $data['Key_Features'] = $request->Key_Features;
        $data['Specification'] = $request->Specification;
        $data['Description'] = $request->Description;
        /*$data['latest_price'] = $request->latest_price;*/
        $data['quantity'] = $request->quantity;
        $data['Price'] = $request->Price;
        $data['Regular_Price'] = $request->Regular_Price;
        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img_url = 'public/asset/dist/assets/images/product/'.$name_gen;
            Image::make($image)->resize(500,500)->save('public/asset/dist/assets/images/product/'.$name_gen);
            $data['image'] =$img_url;
            unlink($request->old_img);
        }else{
            $data['image'] =$request->old_img;
        }
        $data->save();
        if ($data) 
        {
            $notification = array(
                'message' => 'Product Update Successful!',
                'alert-type' => 'success'
            );
            return Redirect()->route('product')->with($notification);  
        }else{
            $notification = array(
                'message' => 'Pleace Try agin',
                'alert-type' => 'success'
            );

          return Redirect()->route('product')->with($notification);   
        }
    }

    public function destroy($id)
    {
        $data = Product::find($id);
        $image=$data->image;
        $data->delete();
        if ($data) 
        {
            unlink($image);
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
       $data=Product::find($id)->update(['status'=>1]);
       if ($data) 
        {
            $notification = array(
                'message' => 'Product Active Successful!',
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
        $data=Product::find($id)->update(['status'=>0]);
        if ($data) 
        {
            $notification = array(
                'message' => 'Product Inactive Successful!',
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

    public function subCat(Request $request)
    {
         
        $parent_id = $request->cat_id;
         
        $data = Subcategory::where('cat_id',$parent_id)->where('status',1)->get();

        return response()->json(['data'=>$data]);

        
    }

    public function brand_select(Request $request)
    {
         
        $parent_id = $request->cat_id;
         
        $data = Brand::where('sub_cat_id',$parent_id)->where('status',1)->get();

        return response()->json(['data'=>$data]);

        
    }
}
