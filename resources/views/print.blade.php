@php 
   
    $id=$order->uni;
    $shoping = App\Models\Shoping::where('uni',$id)->get();
    $user_id = $order->user_id;
     $subtotal = App\Models\Shoping::all()->where('user_id',$user_id)->sum(function($t){
                               return $t->Price* $t->quantity;
                            });

@endphp

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link href="{{ asset('public/asset/asset/img/logo.png') }}" rel="icon"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{asset('public/invoice/style.css')}}">

    <title>RooTFive Bangladesh - Online Print Copy</title>
</head>

<body>
    <div class="page" >
        @php
        echo date(" m  F Y h:i:s A");
        @endphp
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="http://localhost/Eproject/public/asset/asset/img/logo.png" alt="" class="img-fluid">
                </div>
                <div class="top-left">
                    <div class="position-relative">
                        <p>Invoice No. <span>{{ $order->invoice_id }}</span></p>
                    </div>
                </div>
            </section>

            <section class="store-user mt-5">
                <div class="col-12">
                    <div class="row bb pb-3">
                        <div class="col-7">
                            <h2>RooTFive Bangladesh</h2>
                            <p class="address"> 477 Blackwell Street<br>Rajuk Commercial Complex<br>Uttora,Dhaka</p>
                            <div class="txn mt-2">01307-806190</div>
                        </div>
                        <div class="col-5">
                            <h2>{{ $order->fastname }} {{ $order->lastname }}</h2>
                            <p class="address">{{ $order->address }} <br> {{ $order->city }} <br>{{ $order->zone }}</p>
                            <div class="txn mt-2">Number: {{ $order->phone }}</div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Item Description</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shoping as $rows)
                        <tr>
                            <td>
                                <div class="media">
                                    <img class="mr-3 img-fluid" src="{{ URL::to($rows->Product->image) }}" alt="{{ $rows->product_Name }}">
                                    <div class="media-body">
                                        <p class="mt-0 title">{{ $rows->product_name }}</p>
                                        {{ $rows->product_code }}
                                    </div>
                                </div>
                            </td>
                            <td>{{ number_format((float)($rows->Price), 2) }}TK</td>
                            <td>{{ $rows->quantity }}</td>
                            <td>{{ $rows->total }}TK</td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
            </section>

            <section class="balance-info">
                <div class="row">
                    <div class="col-4">
                        <p class="m-0 font-weight-bold"> Note: </p>
                        <p>
                            <ul>
                                <li>Invoice to be paid in advance.</li>
                                <li>Make payment in 2,3 business days.</li>
                            </ul>
                        </p>
                    </div>
                    <div class="col-4 text-center">
                        @php
                            $data = strtoupper($order->uni);
                            $data1 =$order->invoice_id;
                            $fanal = $data1 ." ". $data;
                        @endphp
                        {{QrCode::size(150)->generate($fanal);}}
                    </div>
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                            <tr>
                                <td>Sub Total:</td>
                                <td>{{ number_format((float)($order->amount - 100), 2) }}TK</td>
                            </tr>
                           {{--  <tr>
                                <td>Tax:</td>
                                <td>15$</td>
                            </tr> --}}
                            <tr>
                                <td>Deliver:</td>
                                <td>{{ number_format((float)(100), 2) }}TK</td>
                            </tr>
                            <tfoot>
                                <tr>
                                    <td>Total:</td>
                                    <td>{{ number_format((float)( $order->amount), 2) }}TK</td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Signature -->
                        <div class="col-12">
                            <img src="{{ asset('public/invoice/signature.png') }}" class="img-fluid" alt="">
                            <p class="text-center m-0"> Director Signature </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Cart BG -->
            <img src="{{ asset('public/invoice/cart.png') }}" class="img-fluid cart-bg" alt="">

            <footer>
                <hr>
                <p class="m-0 text-center">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Online Invoice &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                </p>
                <div class="social pt-3">
                    <span class="pr-2">
                        &nbsp;&nbsp;<i class="fas fa-mobile-alt"></i>
                        <span>&nbsp;&nbsp;01307-806190</span>
                    </span>
                    <span class="pr-2">
                        &nbsp;&nbsp;<i class="fas fa-envelope"></i>
                        <span>&nbsp;&nbsp;rootfivebangladesh@gmail.com</span>
                    </span>
                    <span class="pr-2">
                        &nbsp;&nbsp;<i class="fas fa-globe"></i>
                        <span>&nbsp;&nbsp;www.rootfive.com.bd</span>
                    </span>
                    <span class="pr-2">
                        &nbsp;&nbsp;<i class="fab fa-facebook-square"></i>
                        <span>&nbsp;&nbsp;www.facebook.com/ROOTFIVEBANGLADESH</span>
                    </span>
                </div>
            </footer>
        </div>
    </div>
<script>
    window.print()
</script>
</body></html>