<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Print PC - PC Builder - RooTFive Bangladesh</title>
    <link href="{{ asset('public/asset/asset/img/logo.png') }}" rel="icon"> 
    <style type="text/css">
        *,
        body {
            margin: 0
        }

        .wrapper,
        img {
            max-width: 100%
        }

        * {
            padding: 0
        }

        img {
            height: auto
        }

        .wrapper {
            width: 794px;
            margin: 0 auto
        }

        .top-area {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0
        }

        .logo {
            margin-right: 20px
        }

        .company-info h1 {
            color: #01ff70;
            text-transform: uppercase;
        }

        .address {
            border-top: 2px solid #01ff70;
            margin-top: 4px;
            line-height: 24px
        }

        table {
            width: 100%;
            max-width: 99%;
            border-collapse: collapse
        }

        table>tbody>tr>td {
            padding: 12px;
            border-right: 1px solid #333
        }

        table>tbody>tr>td:last-child {
            border: 0
        }

        .component-info {
            background: #01ff70;
            color: #fff;
            border: 1px solid #ffe000;
        }

        tr.details {
            border: 1px solid #333
        }

        .total-amount .amount-label {
            text-align: right
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="top-area">
            <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('public/asset/asset/img/logo.png') }}" alt="Rootfive Bangladesh"></a></div>
            <div class="company-info">
                <h1>Rootfive Bangladesh</h1>
                <div class="address">
                    <p><strong>Phone: </strong>01841756082, <strong>Email:</strong>rootfivebangladesh@gmail.com</p>
                    <p class="web">{{ url('pc_builder') }}</p>
                </div>
            </div>
        </div>

        <div class="all-printed-component">
            <table>
                <tr class="component-info">
                    <td class="component-name"><b>Component</b></td>
                    <td class="product-name"><b>Product Name</b></td>
                    <td class="price"><b>Price</b></td>
                </tr>
                <tr class="details">
                    <td class="component">CPU</td>
					@if(Session::get('CPU'))
					 @php
					    $CPU=Session::get('CPU');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                </tr>
                <tr class="details">
                    <td class="component">CPU Cooler</td>
                    @if(Session::get('CPU_Cooler'))
					 @php
					    $CPU=Session::get('CPU_Cooler');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                </tr>
                <tr class="details">
                    <td class="component">Mother Board</td>
                    @if(Session::get('Mother_Board'))
					 @php
					    $CPU=Session::get('Mother_Board');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                </tr>
                <tr class="details">
                    <td class="component">RAM - 1</td>
                    @if(Session::get('RAM'))
					 @php
					    $CPU=Session::get('RAM');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                </tr>
                <tr class="details">
                    <td class="component">RAM - 2</td>
                    @if(Session::get('RAM_2'))
					 @php
					    $CPU=Session::get('RAM_2');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                <tr class="details">
                    <td class="component">Storage - 1</td>
                    @if(Session::get('Storage'))
					 @php
					    $CPU=Session::get('Storage');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                </tr>
                <tr class="details">
                    <td class="component">Storage - 2</td>
                    @if(Session::get('Storage_2'))
					 @php
					    $CPU=Session::get('Storage_2');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                </tr>
                <tr class="details">
                    <td class="component">Graphics Card</td>
                    @if(Session::get('Graphics_Card'))
					 @php
					    $CPU=Session::get('Graphics_Card');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                </tr>
                <tr class="details">
                    <td class="component">Power Supply</td>
                    @if(Session::get('Power_Supply'))
					 @php
					    $CPU=Session::get('Power_Supply');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                </tr>
                <tr class="details">
                    <td class="component">Casing</td>
                    @if(Session::get('Casing'))
					 @php
					    $CPU=Session::get('Casing');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                </tr>
                <tr class="details">
                    <td class="component">Casing Cooler</td>
                    @if(Session::get('Casing_Cooler'))
					 @php
					    $CPU=Session::get('Casing_Cooler');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                </tr>
                <tr class="details">
                    <td class="component">Monitor</td>
                    @if(Session::get('Monitor'))
					 @php
					    $CPU=Session::get('Monitor');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                </tr>
                <tr class="details">
                    <td class="component">Keyboard</td>
                    @if(Session::get('Keyboard'))
					 @php
					    $CPU=Session::get('Keyboard');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                </tr>
                <tr class="details">
                    <td class="component">Mouse</td>
                    @if(Session::get('Mouse'))
					 @php
					    $CPU=Session::get('Mouse');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                </tr>
                <tr class="details">
                    <td class="component">Headphone</td>
                    @if(Session::get('Headphone'))
					 @php
					    $CPU=Session::get('Headphone');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                </tr>
                <tr class="details">
                    <td class="component">Anti Virus</td>
                    @if(Session::get('Anti_Virus'))
					 @php
					    $CPU=Session::get('Anti_Virus');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                </tr>
                <tr class="details">
                    <td class="component">UPS</td>
                    @if(Session::get('UPS'))
					 @php
					    $CPU=Session::get('UPS');
                    	$data = App\Models\Product::where('status',1)->where('id',$CPU)->first();
					@endphp
                    <td class="name">{{ $data->product_Name }}</td>
                    <td class="price">{{ $data->Price }} ৳</td>
                    @else
                    <td class="name"></td>
                    <td class="price"></td>
                    @endif
                </tr>
                <tr class="details total-amount">
                    <td colspan="2" class="amount-label"><b>Total:</b></td>
                     @php
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

                                $total_tK=$CPU_price+$CPU_Cooler_price+$Mother_Board_price+$RAM_price+$RAM_2_price+$Storage_price+$Storage_2_price+$Graphics_Card_price+$Power_Supply_price+$Casing_price+$Casing_Cooler_price+$Monitor_price+$Keyboard_price+$Mouse_price+$Headphone_price+$Anti_Virus_price+$UPS_price
                            @endphp
                    <td class="amount">{{ $total_tK }}৳</td>
                </tr>
            </table>
        </div>
    </div>
    <script>
        window.print()
    </script>

</body>

</html>
