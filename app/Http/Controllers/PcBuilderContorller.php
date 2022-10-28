<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;
session_start();
class PcBuilderContorller extends Controller
{
    public function index()
    {
        return view('fondent.pc_builder');
    }

    public function choose($id)
    {
        if ($id == 52) {
            $id = 52;
            $data= Product::orderBy('id', 'desc')->where('PC_builder',5)->where('status',1)->paginate(20);
            return view('fondent.pc_choose',compact('data','id'));
        }elseif ($id == 62) {
            $id = 62;
            $data= Product::orderBy('id', 'desc')->where('PC_builder',6)->where('status',1)->paginate(20);
            return view('fondent.pc_choose',compact('data','id'));
        }else{
            $data= Product::orderBy('id', 'desc')->where('PC_builder',$id)->where('status',1)->paginate(20);
            return view('fondent.pc_choose',compact('data','id'));
        }
    }

    public function add_choose($id, $PC_builder)
    {

        if ($PC_builder ==2) {
            Session::put('CPU', $id);
            Session::put('CPU_id', 2);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('CPU_price', $data->Price );
            Session::put('CPU_item', 1 );
            return Redirect()->route('pc_builder');
        }elseif ($PC_builder ==3) {
            Session::put('CPU_Cooler', $id);
            Session::put('CPU_Cooler_id', 3);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('CPU_Cooler_price', $data->Price );
            Session::put('CPU_Cooler_item', 1 );
            return Redirect()->route('pc_builder');
        }elseif ($PC_builder ==4) {
            Session::put('Mother_Board', $id);
            Session::put('Mother_Board_id', 4);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('Mother_Board_price', $data->Price );
            Session::put('Mother_Board_item', 1 );
            return Redirect()->route('pc_builder');
        }elseif ($PC_builder ==5) {
            Session::put('RAM', $id);
            Session::put('RAM_id', 5);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('RAM_price', $data->Price );
            Session::put('RAM_item', 1 );
            return Redirect()->route('pc_builder');
        }elseif ($PC_builder ==52) {
            Session::put('RAM_2', $id);
            Session::put('RAM_2_id', 52);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('RAM_2_price', $data->Price );
            Session::put('RAM_2_item', 1 );
            return Redirect()->route('pc_builder');
        }elseif ($PC_builder ==6) {
            Session::put('Storage', $id);
            Session::put('Storage_id', 6);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('Storage_price', $data->Price );
            Session::put('Storage_item', 1 );
            return Redirect()->route('pc_builder');
        }

        elseif ($PC_builder ==62) {
            Session::put('Storage_2', $id);
            Session::put('Storage_2', 62);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('Storage_2_price', $data->Price );
            Session::put('Storage_2_item', 1 );
            return Redirect()->route('pc_builder');
        }


        elseif ($PC_builder ==7) {
            Session::put('Graphics_Card', $id);
            Session::put('Graphics_Card_id', 7);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('Graphics_Card_price', $data->Price );
            Session::put('Graphics_Card_item', 1 );
            return Redirect()->route('pc_builder');
        }


        elseif ($PC_builder ==8) {
            Session::put('Power_Supply', $id);
            Session::put('Power_Supply_id', 8);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('Power_Supply_price', $data->Price );
            Session::put('Power_Supply_item', 1 );
            return Redirect()->route('pc_builder');
        }


        elseif ($PC_builder ==9) {
            Session::put('Casing', $id);
            Session::put('Casing_id', 9);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('Casing_price', $data->Price );
            Session::put('Casing_item', 1 );
            return Redirect()->route('pc_builder');
        }


        elseif ($PC_builder ==10) {
            Session::put('Casing_Cooler', $id);
            Session::put('Casing_Cooler_id', 10);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('Casing_Cooler_price', $data->Price );
            Session::put('Casing_Cooler_item', 1 );
            return Redirect()->route('pc_builder');
        }

        elseif ($PC_builder ==11) {
            Session::put('Monitor', $id);
            Session::put('Monitor_id', 11);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('Monitor_price', $data->Price );
            Session::put('Monitor_item', 1 );
            return Redirect()->route('pc_builder');
        }
      
        elseif ($PC_builder ==12) {
            Session::put('Keyboard', $id);
            Session::put('Keyboard_id', 12);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('Keyboard_price', $data->Price );
            Session::put('Keyboard_item', 1 );
            return Redirect()->route('pc_builder');
        }

        elseif ($PC_builder ==13) {
            Session::put('Mouse', $id);
            Session::put('Mouse_id', 13);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('Mouse_price', $data->Price );
            Session::put('Mouse_item', 1 );
            return Redirect()->route('pc_builder');
        } 

        elseif ($PC_builder ==14) {            
            Session::put('Headphone', $id);
            Session::put('Headphone_id', 14);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('Headphone_price', $data->Price );
            Session::put('Headphone_item', 1 );
            return Redirect()->route('pc_builder');
        }

        elseif ($PC_builder ==15) {
            Session::put('Anti_Virus', $id);
            Session::put('Anti_Virus_id', 15);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('Anti_Virus_price', $data->Price );
            Session::put('Anti_Virus_item', 1 );
            return Redirect()->route('pc_builder');
        }

        elseif ($PC_builder ==16) {
            Session::put('UPS', $id);
            Session::put('UPS_id', 16);
            $data = Product::where('status',1)->where('id',$id)->first();
            Session::put('UPS_price', $data->Price );
            Session::put('UPS_item', 1 );
            return Redirect()->route('pc_builder');

        }


    }

    public function flash($id)
    {

        if ($id ==2) {
            Session::put('CPU_id', 0);
            Session::put('CPU', 0);
            Session::put('CPU_price');
            Session::put('CPU_item');
            return Redirect()->route('pc_builder');
        }

        elseif ($id ==3) {
            Session::put('CPU_Cooler_id', 0);
            Session::put('CPU_Cooler', 0);
            Session::put('CPU_Cooler_price');
            Session::put('CPU_Cooler_item');
            return Redirect()->route('pc_builder');
        }

    
        elseif ($id ==4) {
            Session::put('Mother_Board_id', 0);
            Session::put('Mother_Board', 0);
            Session::put('Mother_Board_price');
            Session::put('Mother_Board_item');
            return Redirect()->route('pc_builder');
        }


        elseif ($id ==5) {
            Session::put('RAM_id', 0);
            Session::put('RAM', 0);
            Session::put('RAM_price');
            Session::put('RAM_item');
            return Redirect()->route('pc_builder');
        }

        elseif ($id ==52) {
            Session::put('RAM_2_id', 0);
            Session::put('RAM_2', 0);
            Session::put('RAM_2_price');
            Session::put('RAM_2_item');
            return Redirect()->route('pc_builder');
        }

        elseif ($id ==6) {
            Session::put('Storage_id', 0);
            Session::put('Storage', 0);
            Session::put('Storage_price');
            Session::put('Storage_price');
            return Redirect()->route('pc_builder');
        }

        elseif ($id ==62) {
            Session::put('Storage_2_id', 0);
            Session::put('Storage_2', 0);
            Session::put('Storage_2_price');
            Session::put('Storage_2_item');
            return Redirect()->route('pc_builder');
        }


        elseif ($id ==7) {
            Session::put('Graphics_Card_id', 0);
            Session::put('Graphics_Card', 0);
            Session::put('Graphics_Card_price');
            Session::put('Graphics_Card_item');
            return Redirect()->route('pc_builder');
        }


        elseif ($id ==8) {
            echo "";
            Session::put('Power_Supply_id', 0);
            Session::put('Power_Supply', 0);
            Session::put('Power_Supply_price');
            Session::put('Power_Supply_item');
            return Redirect()->route('pc_builder');
        }


        elseif ($id ==9) {
            Session::put('Casing_id', 0);
            Session::put('Casing', 0);
            Session::put('Casing_price');
            Session::put('Casing_item');
            return Redirect()->route('pc_builder');
        }


        elseif ($id ==10) {
            Session::put('Casing_Cooler_id', 0);
            Session::put('Casing_Cooler', 0);
            Session::put('Casing_Cooler_price');
            Session::put('Casing_Cooler_item');
            return Redirect()->route('pc_builder');
        }

        elseif ($id ==11) {
            Session::put('Monitor_id', 0);
            Session::put('Monitor', 0);
            Session::put('Monitor_price');
            Session::put('Monitor_item');
            return Redirect()->route('pc_builder');
        }
      
        elseif ($id ==12) {
            Session::put('Keyboard_id', 0);
            Session::put('Keyboard', 0);
            Session::put('Keyboard_price');
            Session::put('Keyboard_item');
            return Redirect()->route('pc_builder');
        }

        elseif ($id ==13) {
            Session::put('Mouse_id', 0);
            Session::put('Mouse', 0);
            Session::put('Mouse_price');
            Session::put('Mouse_item');
            return Redirect()->route('pc_builder');
        } 

        elseif ($id ==14) {
            Session::put('Headphone_id', 0);
            Session::put('Headphone', 0);
            Session::put('Headphone_price');
            Session::put('Headphone_item');
            return Redirect()->route('pc_builder');
        }

        elseif ($id ==15) {
            Session::put('Anti_Virus_id', 0);
            Session::put('Anti_Virus', 0);
            Session::put('Anti_Virus_price');
            Session::put('Anti_Virus_item');
            return Redirect()->route('pc_builder');
        }

        elseif ($id ==16) {
            Session::put('UPS_id', 0);
            Session::put('UPS', 0);
            Session::put('UPS_price');
            Session::put('UPS_item');
            return Redirect()->route('pc_builder');

        }

       
    }

    public function print_pc()
    {
        return view('fondent.print_pc');
    }


    public function base64_to_image(Request $request)
    {   
        $img= $request->image;
        return Redirect()->route('pc_builder');
    }
    
}
 