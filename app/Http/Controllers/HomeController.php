<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
session_start();
use DB;
use App\Models\Shoping;
use Illuminate\Support\Facades\Hash;
use App\Models\Wishlist;
use App\Models\Pc_save;
use App\Custom_ID\Id_generator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function exampleEasyCheckout()
    {
        
        return view('fondent.checkout');
        /*return view('exampleEasycheckout');*/
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
    }

    public function order()
    {
        return view('user.order_history');
    }

    public function order_view($invoice_id)
    {

       $order_v =Shoping::where('uni',$invoice_id)->get();
       return view('user.order_view', compact('order_v','invoice_id'));
    }

    public function eidt()
    {
        return view('user.eidt');
    }

    public function update_user(Request $request)
    {
        $id = $request->id;
        $data=User::find($id);
        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->lastname;
        $data['email'] = $request->email;
        $data['telephone'] = $request->telephone;
        $data['fax'] = $request->fax;
        $data->save();
        if ($data) 
        {
            $notification = array(
                'message' => ' Update Successful!',
                'alert-type' => 'success'
            );
            return Redirect()->route('home')->with($notification);  
        }else{
            $notification = array(
                'message' => 'Pleace Try agin',
                'alert-type' => 'success'
            );

          return Redirect()->route('home')->with($notification);   
        }
    }

    public function password()
    {
        return view('user.password');
    } 

    public function password_update(Request $request)
    {
        $id = $request->id;
        $data=User::find($id);
        $data['password'] = Hash::make($request->confirm_password);
        $data->save();
        if ($data) 
        {
             
        return Redirect()->back()->with('change_pass', 'Password Change Successfuly!'); 
        }
    }
    public function address()
    {
        return view('user.address');
    }

    public function address_update(Request $request)
    {
        $id = $request->id;
        $data=User::find($id);
        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->lastname;
        $data['company'] = $request->company;
        $data['address_1'] = $request->address_1;
        $data['address_2'] = $request->address_2;
        $data['city'] = $request->city;
        $data['postcode'] = $request->postcode;
        $data['country'] = $request->country;
        $data['zone'] = $request->zone;
        $data->save();
        if ($data) 
        {
             
        return Redirect()->back()->with('address_update', 'Address Update Successfuly!'); 
        }
        
    }
    public function wishlist()
    {
        return view('user.wishlist');
    }

    public function deleteTowishlist($id)
    {

            $data = Wishlist::find($id);
            $data->delete();
            return Redirect()->back();
    }


    public function pc()
    {
        return view('user.pc');
    }


    public function form()
    {
        if (Session::get('CPU')==!null  && Session::get('Mother_Board')==!null && Session::get('RAM')==!null && Session::get('Storage')==!null) {

            return view('user.pc_save');
        }else{
            session::put('Pc_save_m',"Please choose a Required");
            return Redirect()->back();
        }

    }

    public function pc_save(Request $request, $id)
    {   

        $data= new Pc_save;
        $data['user_id'] = $id;
        $data['pc_id'] = Id_generator::PCID(new Pc_save, 'pc_id', 5, '4');;
        $data['name'] = $request->name;
        $data['description'] = $request->description;

        $CPU_price=Session::get('CPU_price');
        $CPU_Cooler_price=Session::get('CPU_Cooler_price');
        $Mother_Board_price=Session::get('Mother_Board_price');
        $RAM_price=Session::get('RAM_price');
        $RAM_2_price=Session::get('RAM_2_price');
        $Storage_price=Session::get('Storage_price');
        $Storage_2_price=Session::get('Storage_2_price');
        $Graphics_Card_price=Session::get('Graphics_Card_price');
        $Power_Supply_price=Session::get('Power_Supply_price');
        $Casing_price=Session::get('Casing_price');
        $Casing_Cooler_price=Session::get('Casing_Cooler_price');
        $Monitor_price=Session::get('Monitor_price');
        $Keyboard_price=Session::get('Keyboard_price');
        $Mouse_price=Session::get('Mouse_price');
        $Headphone_price=Session::get('Headphone_price');
        $Anti_Virus_price=Session::get('Anti_Virus_price');
        $UPS_price=Session::get('UPS_price');

        $total_tK=$CPU_price+$CPU_Cooler_price+$Mother_Board_price+$RAM_price+$RAM_2_price+$Storage_price+$Storage_2_price+$Graphics_Card_price+$Power_Supply_price+$Casing_price+$Casing_Cooler_price+$Monitor_price+$Keyboard_price+$Mouse_price+$Headphone_price+$Anti_Virus_price+$UPS_price;

        $CPU_item=Session::get('CPU_item');
        $CPU_Cooler_item=Session::get('CPU_Cooler_item');
        $Mother_Board_item=Session::get('Mother_Board_item');
        $RAM_item=Session::get('RAM_item');
        $RAM_2_item=Session::get('RAM_2_item');
        $Storage_item=Session::get('Storage_item');
        $Storage_2_item=Session::get('Storage_2_item');
        $Graphics_Card_item=Session::get('Graphics_Card_item');
        $Power_Supply_item=Session::get('Power_Supply_item');
        $Casing_item=Session::get('Casing_item');
        $Casing_Cooler_item=Session::get('Casing_Cooler_item');
        $Monitor_item=Session::get('Monitor_item');
        $Keyboard_item=Session::get('Keyboard_item');
        $Mouse_item=Session::get('Mouse_item');
        $Headphone_item=Session::get('Headphone_item');
        $Anti_Virus_item=Session::get('Anti_Virus_item');
        $UPS_item=Session::get('UPS_item');


        $total_item = $CPU_item+$CPU_Cooler_item+$Mother_Board_item+$RAM_item+$RAM_2_item+$Storage_item+$Storage_2_item+$Graphics_Card_item+$Power_Supply_item+$Casing_item+$Casing_Cooler_item+$Monitor_item+$Keyboard_item+$Mouse_item+$Headphone_item+$Anti_Virus_item+$UPS_item;

        $data['total_tK'] = $total_tK;
        $data['total_item'] = $total_item;
        $data['CPU'] = Session::get('CPU'); 
        $data['CPU_Cooler'] = Session::get('CPU_Cooler');
        $data['Mother_Board'] = Session::get('Mother_Board'); 
        $data['RAM'] = Session::get('RAM'); 
        $data['RAM_2'] = Session::get('RAM_2'); 
        $data['Storage'] = Session::get('Storage'); 
        $data['Storage_2'] = Session::get('Storage_2'); 
        $data['Graphics_Card'] = Session::get('Graphics_Card'); 
        $data['Power_Supply'] = Session::get('Power_Supply'); 
        $data['Casing'] = Session::get('Casing'); 
        $data['Casing_Cooler'] = Session::get('Casing_Cooler'); 
        $data['Monitor'] = Session::get('Monitor'); 
        $data['Keyboard'] = Session::get('Keyboard'); 
        $data['Mouse'] = Session::get('Mouse'); 
        $data['Headphone'] = Session::get('Headphone'); 
        $data['Anti_Virus'] = Session::get('Anti_Virus');
        $data['UPS'] = Session::get('UPS');
        $data['CPU_id'] = Session::get('CPU_id');
        $data['CPU_Cooler_id'] = Session::get('CPU_Cooler_id');
        $data['Mother_Board_id'] = Session::get('Mother_Board_id');
        $data['RAM_id'] = Session::get('RAM_id');
        $data['RAM_2_id'] = Session::get('RAM_2_id');
        $data['Storage_id'] = Session::get('Storage_id');
        $data['Storage_2_id'] = Session::get('Storage_2_id');
        $data['Graphics_Card_id'] = Session::get('Graphics_Card_id');
        $data['Power_Supply_id'] = Session::get('Power_Supply_id');
        $data['Casing_id'] = Session::get('Casing_id');
        $data['Casing_Cooler_id'] = Session::get('Casing_Cooler_id');
        $data['Monitor_id'] = Session::get('Monitor_id');
        $data['Keyboard_id'] = Session::get('Keyboard_id');
        $data['Mouse_id'] = Session::get('Mouse_id');
        $data['Headphone_id'] = Session::get('Headphone_id');
        $data['Anti_Virus_id'] = Session::get('Anti_Virus_id');
        $data['UPS_id'] = Session::get('UPS_id');
        $data->save();
        if($data){
            return Redirect('account/pc');
        }
        else{
             return Redirect()->route('pc_builder');
        }
        
    }



    public function pc_view($id)
    {
        

        return view('fondent.eidt_pc_builder',compact('id'));
    }

    public function pc_delete($id)
    {
        $data = Pc_save::find($id);
        $data->delete();
        return Redirect()->back();
    }


    public function quote()
    {
        return Redirect()->route('pc_builder');
    }
}
