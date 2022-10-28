<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Contact;
use DB;
use Session;
session_start();
use Mail;
class PageController extends Controller
{
    public function search_h(Request $request)
    {
        $search = $request->search;
       $data3 = DB::table('products')
       ->where('product_Name', 'like', '%'.$search.'%')
       ->where('status',1)
       ->paginate(20);

        if (count($data3) > 0) {
            return view('fondent.search_h',compact('data3'));/*->withData($p_search)->withQuery($search);*/
        }
        else {
            return view('fondent.search_h');
        }
    }
    public function search_pc(Request $request,$id)
    {
        $search = $request->search;
       $data = DB::table('products')
       ->where('product_Name', 'like', '%'.$search.'%')
       ->where('PC_builder', $id)
       ->where('status',1)
       ->paginate(20);

        if (count($data) > 0) {
            return view('fondent.pc_seach')->withdata($data)->withid($id)->withQuery($search);
        }
        else {
            return view('fondent.pc_seach')->withid($id)->withQuery($search);
        }
    }


    public function index()
    {
        $data= Category::where('status',1)->get();
        $data1= Product::where('status',1)->orderBy('id', 'desc')->limit(16)->latest()->get();
       return view('fondent.index',compact('data','data1')); 
    }
    public function cat_view($name)
    {
       $data= Category::where('cat_name',$name)->where('status',1)->first();
       $cat_id=$data->id;
       $data1= Subcategory::where('cat_id',$cat_id)->where('status',1)->get();
       

       $data3= Product::orderBy('id', 'desc')->where('cat_id',$cat_id)->where('status',1)->paginate(20);
       $data4= Product::where('cat_id',$cat_id)->where('status',1)->first();
       
       return view('fondent.category_view',compact('data','data1','data3','data4'));


    }

    public function product_detiles($slug)
    {
        $data = Product::orderBy('id', 'desc')->where('status',1)->where('product_slug',$slug)->first();
        $cat = $data->cat_id;
        $Related = Product::where('status',1)->where('cat_id',$cat)->limit(6)->get();
        return view('fondent.product_details', compact('data','Related'));
    }

    public function Sub_view($category,$subcategory)
    {
        
        $data1= Subcategory::where('slug',$subcategory)->where('status',1)->first();
        $brand=$data1->id;
        $data4= Brand::where('sub_cat_id',$brand)->where('status',1)->get();
        $cat_id = $data1->cat_id;
        $data2= Category::where('id',$cat_id)->where('status',1)->first();
        $id= $data1->id;
        $data= Product::orderBy('id', 'desc')->where('sub_cat_id',$id)->where('status',1)->paginate(20);
        $id= $data1->id;
        $data5= Product::where('sub_cat_id',$id)->where('status',1)->first();
        return view('fondent.subcateroy_view',compact('data','data1','data2','data4','data5'));
    } 

    public function brand_view($category,$Subcategory,$Brand)
    {
        
        $data3= Brand::where('slug',$Brand)->where('status',1)->first();
        $sub_cat_id= $data3->sub_cat_id;
        $data1= Subcategory::where('id',$sub_cat_id)->where('status',1)->first();
        $cat_id= $data1->cat_id;
        $data2= Category::where('id',$cat_id)->where('status',1)->first();
        $id=$data3->id;
        $data= Product::orderBy('id', 'desc')->where('brand_id',$id)->where('status',1)->paginate(20);
        $data4= Product::where('brand_id',$id)->where('status',1)->first();
        return view('fondent.brand_view',compact('data','data1','data2','data3','data4'));
    }


    public function about_us()
    {
        return view('fondent.aboutus');
    }

    public function terms_and_conditions()
    {
        return view('fondent.terms_and_conditions');
    }

    public function privacy_policy()
    {
        return view('fondent.privacy_policy');
    }

    public function contact_us()
    {
        return view('fondent.contact_us');
    }

    public function contactuser(Request $request)
    {
    
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            
        ]);

        $data = new Contact;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        $data['ip'] = $request->ip();
        $data['slug'] = uniqid();
        $maill = [
          'subject' => "Rootfive Bangladesh",
          'email' => $request->email,
          'content' => $request->name,
        ];
        $data->save();
        if ($data) 
        {
            Mail::send('emails.contact_sms', $maill, function($message) use ($maill) {
              $message->to($maill['email'])
              ->subject($maill['subject']);
            });
            session::put('contact_sms',"সম্মনিত গ্রাহক আমাদের হেল্প টিম আপনার সাথে যোগাযোগ করবে।");
            return Redirect()->back(); 
        } 
    }
}
