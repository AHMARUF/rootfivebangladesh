<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Product;
use Cart;
use Session;
session_start();
use App\Models\Wishlist;
class CartController extends Controller
{   
    public function alldata()
    {
        $data= Cart::content();
        return response()->json(['data'=>$data]);
    }
    
    public function add_to_card(Request $request)
    {
        $qty=$request->quantity;
        $id=$request->product_id;
        $product_info = Product::orderBy('id', 'desc')->where('status',1)->where('id',$id)->first();

        $data['qty']=$request->quantity;
        $data['id']=$product_info->id;
        $data['name']=$product_info->product_Name;
        $data['price']=$product_info->Price;
        $data['options']['images']=$product_info->image;
        $data['options']['product_code']=$product_info->product_code;
        Cart::add($data);
        return Redirect()->route('cart');  
    }

    public function addtocard(Request $request,$id)
    {
       
        $product_info = Product::orderBy('id', 'desc')->where('status',1)->where('id',$id)->first();

        $data['qty']=1;
        $data['id']=$product_info->id;
        $data['name']=$product_info->product_Name;
        $data['price']=$product_info->Price;
        $data['options']['images']=$product_info->image;
        $data['options']['product_code']=$product_info->product_code;
        Cart::add($data);
        return Redirect()->route('cart');  
    }

    public function cart()
    {
        return view('fondent.cart');
    }
    public function delete_to_card($rowId)
    {
        Cart::remove($rowId);
        return Redirect()->route('cart');  
    }
    public function update_cart(Request $request)
    {
        $qty=$request->quantity;
        $rowId=$request->rowId;
        Cart::update($rowId, $qty);
        /*Cart::update($rowId, 2);*/
        return Redirect()->route('cart'); 
    }


   // Wishlist 


    public function addTowishlist($id, $iid)
    {
            $product = Product::where('id',$id)->first();
            $data = new Wishlist;
            $data['user_id']=$iid;
            $data['product_id']=$id; 
            $data['product_name']=$product->product_Name; 
            $data['product_slug']=$product->product_slug; 
            $data['image']=$product->image;
            $data['Price']=$product->Price;           
            $data->save(); 
            return Redirect()->back();
    }

    public function deleteTowishlist($id)
    {

            $data = Wishlist::find($id);
            $data->delete();
            return Redirect()->back();
    }


    public function add_to_cart_pc()
    {

        if (Session::get('CPU')==!null  && Session::get('Mother_Board')==!null && Session::get('RAM')==!null && Session::get('Storage')==!null) 
        {

            if (Session::get('CPU_id') == 2) {

                $id =Session::get('CPU');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data);
            }

            if (Session::get('CPU_Cooler_id') == 3) {
                
                $id = Session::get('CPU_Cooler');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data); 
            }

            if (Session::get('Mother_Board_id') == 4) {
                
                $id = Session::get('Mother_Board');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data); 
            }

            if (Session::get('RAM_id') == 5) {
                
                $id = Session::get('RAM');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data);
            }

            if (Session::get('RAM_2_id') == 52) {
                
                $id = Session::get('RAM_2');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data); 
            }

            if (Session::get('Storage_id') == 6) {
                
                $id = Session::get('Storage');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data);
            }

            if (Session::get('Storage_2') == 62) {
                
                $id = Session::get('Storage_2');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data);
            }


            if (Session::get('Graphics_Card_id') == 7) {
                
                $id = Session::get('Graphics_Card');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data);  
            }


            if (Session::get('Power_Supply_id') == 8) {
                
                $id = Session::get('Power_Supply');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data);
            }


            if (Session::get('Casing_id') == 9) {
                
                $id = Session::get('Casing');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data);  
            }


            if (Session::get('Casing_Cooler_id') == 10) {
                
                $id = Session::get('Casing_Cooler');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data);
            }

            if (Session::get('Monitor_id') == 11) {
                
                $id = Session::get('Monitor');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data);
            }
      
            if (Session::get('Keyboard_id') == 12) {
                
                $id = Session::get('Keyboard');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data);
            }

            if (Session::get('Mouse_id') == 13) {
                
                $id = Session::get('Mouse');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data);
            } 

            if (Session::get('Headphone_id') == 14) {            
                
                $id = Session::get('Headphone');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data);
            }

            if (Session::get('Anti_Virus_id') == 15) {
                
                $id = Session::get('Anti_Virus');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data);
            }

            if ( Session::get('UPS_id') == 16) {
                
                $id = Session::get('UPS');

                $product_info = Product::where('status',1)->where('id',$id)->first();
                $data['qty']=1;
                $data['id']=$product_info->id;
                $data['name']=$product_info->product_Name;
                $data['price']=$product_info->Price;
                $data['options']['images']=$product_info->image;
                $data['options']['product_code']=$product_info->product_code;
                Cart::add($data);
            }

            return Redirect()->route('cart');
        }else{
            session::put('Pc_save_m',"Please choose a Required");
            return Redirect()->back();
        }


    }


}
