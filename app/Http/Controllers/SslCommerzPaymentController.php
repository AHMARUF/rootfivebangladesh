<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Custom_ID\Id_generator;
use App\Models\Shoping;
use Session;
session_start();
use Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        $invoice_id = Id_generator::Invoice(new Shoping, 'invoice_id', 4, 'RTFBIN');
        return view('fondent.checkout44', compact('invoice_id'));
        /*return view('exampleEasycheckout');*/
        /*STORE_ID=rootfivecombdlive
STORE_PASSWORD=612DB676D9C9360748*/
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function index(Request $request)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.
        //dd($request->all());
        $post_data = array();
        $post_data['total_amount'] =$request->amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique
     
        # CUSTOMER INFORMATION
        /*$post_data['user_id'] = $requestData['user_id'];*/
        $invoice_id = Id_generator::Invoice(new Shoping, 'invoice_id', 4, 'RTFBIN');
        $post_data['user_id'] =Auth::id();
        $post_data['invoice_id'] =$invoice_id;
        Session::put('user_id', $post_data['user_id'] );
        Session::put('invoice_id', $post_data['invoice_id']);
        $post_data['cus_name'] = $request->firstname;
        $post_data['cus_email'] = $request->email;
        $post_data['cus_add1'] = $request->address_1;
        $post_data['cus_add2'] = $request->lastname;
        $post_data['cus_city'] = $request->city;
        $post_data['cus_state'] = $request->zone;
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request->telephone;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Null";
        $post_data['ship_state'] = "null";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = uniqid();

        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'user_id' => $post_data['user_id'],
                'invoice_id' => $post_data['invoice_id'],
                'fastname' => $post_data['cus_name'],
                'lastname' => $post_data['cus_add2'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'email' => $post_data['cus_email'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency'],
                'city' => $post_data['cus_city'],
                'zone' => $post_data['cus_state'],
                'uni' => $post_data['value_d'],
                'date' => Carbon::today()->format('d_m_Y'),
                'month' => Carbon::now()->format('m_Y'),
                'year' =>Carbon::createFromFormat('Y-m-d H:i:s',Carbon::now() )->year,
            ]);

            $contents=Cart::content();
               
            foreach ($contents as $rows) {
                $data=new Shoping;
                $data['user_id']=$post_data['user_id'];
                $data['invoice_id']=$post_data['invoice_id'];
                $data['uni']=$post_data['value_d'];
                $data['product_id']=$rows->id;
                $data['product_name']=$rows->name;
                $data['product_code']=$rows->options->product_code;
                $data['Price']=$rows->price;
                $data['quantity']=$rows->qty;
                $data['total']=$rows->total;
                $data->save();

                $upqty=  DB::table('products')->where('id',$rows->id)->first();
                $pqty = $upqty->quantity - $rows->qty;

                $upqtynew = DB::table('products')->where('id', $rows->id)->update(['quantity' => $pqty]);

                
            }

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function payViaAjax(Request $request)
    {

        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.
       $requestData = (array)json_decode($request->cart_json);


        $post_data = array();
        $post_data['total_amount'] =$requestData['amount']; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique
     
        # CUSTOMER INFORMATION
        /*$post_data['user_id'] = $requestData['user_id'];*/
        $invoice_id = Id_generator::Invoice(new Shoping, 'invoice_id', 4, 'RTFBIN');
        $post_data['user_id'] =Auth::id();
        $post_data['invoice_id'] =$invoice_id;
        Session::put('user_id', $post_data['user_id'] );
        Session::put('invoice_id', $post_data['invoice_id']);
        $post_data['cus_name'] = $requestData['cus_firstname'];
        $post_data['cus_email'] = $requestData['cus_email'];
        $post_data['cus_add1'] = $requestData['cus_addr1'];
        $post_data['cus_add2'] = $requestData['cus_lastname'];
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $requestData['cus_phone'];
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = $requestData['cus_city'];
        $post_data['ship_state'] = $requestData['cus_zone'];
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = uniqid();


        #Before  going to initiate the payment order status need to update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'user_id' => $post_data['user_id'],
                'invoice_id' => $post_data['invoice_id'],
                'fastname' => $post_data['cus_name'],
                'lastname' => $post_data['cus_add2'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'email' => $post_data['cus_email'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency'],
                'city' => $post_data['ship_city'],
                'zone' => $post_data['ship_state'],
                'uni' => $post_data['value_d'],
                'date' => Carbon::today()->format('d_m_Y'),
                'month' => Carbon::now()->format('m_Y'),
                'year' =>Carbon::createFromFormat('Y-m-d H:i:s',Carbon::now() )->year,
            ]);


              $contents=Cart::content();
               
                foreach ($contents as $rows) {
                    $data=new Shoping;
                    $data['user_id']=$post_data['user_id'];
                    $data['invoice_id']=$post_data['invoice_id'];
                    $data['uni']=$post_data['value_d'];
                    $data['product_id']=$rows->id;
                    $data['product_name']=$rows->name;
                    $data['product_code']=$rows->options->product_code;
                    $data['Price']=$rows->price;
                    $data['quantity']=$rows->qty;
                    $data['total']=$rows->total;
                    $data->save();

                    $upqty=  DB::table('products')->where('id',$rows->id)->first();
                    $pqty = $upqty->quantity - $rows->qty;

                    $upqtynew = DB::table('products')->where('id', $rows->id)->update(['quantity' => $pqty]);

                    
                }

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function success(Request $request)
    {

        Session::put('success','Transaction is Successful');

        $tran_id = $request->input('tran_id');
        Session::put('tran_id',$tran_id);
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */


                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Processing']);

                Session::put('successfully','Transaction is successfully Completed');
                return view('fondent.invoice');
               
            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Failed']);
                echo "validation Fail";
            }
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            Session::put('successfully','Transaction is successfully Completed');
            return view('fondent.invoice');


        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    Session::put('successfully','Transaction is successfully Completed');
                    return view('fondent.invoice');
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Failed']);

                    echo "validation Fail";
                }

            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

}
