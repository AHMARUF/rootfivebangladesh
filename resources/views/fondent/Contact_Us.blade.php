@extends('layouts.layout')
@section('content')
<section class="after-header p-tb-10">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="material-icons" title="Home">home</i></a></li>
            <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
        </ul>
    </div>
</section>

<section class="checkout bg-bt-gray p-tb-15">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-10">
                @if(Session::has('contact_sms'))
                <div class="alert alert-warning ">
                    <strong>&#10003; {{ Session::get('contact_sms') }} </strong> 
                    <button type="button" class="close material-icons" data-dismiss="alert">×</button>
                </div>
                @endif
            </div>
            <div class="col-md-6">
                <div class="card ws-box">
                   <div class="card-body">
                       <div class="row">
                           <div class="col-md-12">
                               <h2>Company</h2><hr>
                           </div>
                           <div class="col-md-12" style="margin-top: 10px;">
                               <h5>Shop No-606, Rajuk Commercial Complex, Azampur Uttara, Dhaka, 1230</h5>
                               <br>
                               <span><strong>Email :</strong><a href="mailto:info@rootfive.com.bd"> info@rootfive.com.bd</a></span>
                               <br><br>
                               <span><strong>Number :</strong><a href="tel:+8801307806190">+8801307806190</a></span><br><br>
                               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d228.03820650449032!2d90.39974514748415!3d23.867932502736902!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfdb6c62e076d0011!2sRootfive%20Bangladesh!5e0!3m2!1sbn!2sbd!4v1634754155354!5m2!1sbn!2sbd"  width="100%" height="200" style="border:0; border-radius:5px;" allowfullscreen="" loading="lazy"></iframe>
                           </div>
                       </div>
                   </div> 
                </div>
            </div>
        <div class="col-md-6">
        <form class="checkout-content" method="POST" action="{{ route('contactuser') }}" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-12 col-sm-10">
                    <div class="page-section ws-box">
                        <div class="address">
                            <div class="multiple-form-group">
                                <div class="form-group">
                                    <label class="control-label" for="name">Your Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" id="name"  placeholder="Your Name" >
                                    @error('name')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 </div>
                                <div class="form-group">
                                    <label class="control-label" for="email">Your Email</label>
                                    <input type="text" id="email" name="email"  class="form-control @error('email') is-invalid @enderror" placeholder="Your Email">
                                    @error('email')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="Subject">Subject</label>
                                <input type="text" id="Subject" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject" >
                                @error('subject')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           <div class="form-group">
                               <label class="control-label" for="Message">Message</label>
                               <textarea id="Message" class="form-control @error('message') is-invalid @enderror" rows="6" name="message" placeholder="Message"></textarea>
                                @error('message')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Send Message</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>
</section>


@endsection