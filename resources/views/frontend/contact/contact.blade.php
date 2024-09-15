@extends('frontend.master')

@section('title', 'Contact')
@section('content')

<section class="middle ">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center">
                    {{-- <h2 class="off_title">Contact Us</h2> --}}
                    <h3 class="ft-bold pt-3 py-3">Get In Touch</h3>
                </div>
            </div>
        </div>

        <div class="row align-items-start justify-content-between">

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="card-wrap-body mb-4">
                    <h4 class="ft-medium mb-3 theme-cl  color:red">Address</h4>
                    <p>Abed Dhali Road, kalabagan,Dhaka-1207</p>
                    <p class="lh-1"><span class="text-dark ft-medium">Email:</span>demo@gmail.com</p>
                </div>

                <div class="card-wrap-body mb-3">
                    <h4 class="ft-medium mb-3 theme-cl">Make a Call</h4>
                    <h6 class="ft-medium mb-1">Customer Care:</h6>
                    <p class="mb-2">01879997224</p>
                    <h6 class="ft-medium mb-1">Careers:</h6>
                    <p>01879997224</p>
                </div>

                <div class="card-wrap-body mb-3">
                    <h4 class="ft-medium mb-3 theme-cl">Drop A Mail</h4>
                    <p>Fill out our form and we will contact you within 24 hours.</p>
                    <p class="lh-1 text-dark">demo@gmail.com</p>
                    <p class="lh-1 text-dark">abdullahsultan237@gmail.com</p>
                </div>
            </div>

            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                <form class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="small text-dark ft-medium">Your Name *</label>
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="small text-dark ft-medium">Your Email *</label>
                            <input type="text" class="form-control" placeholder="Your Email">
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="small text-dark ft-medium">Subject</label>
                            <input type="text" class="form-control" placeholder="Type Your Subject">
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="small text-dark ft-medium">Message</label>
                            <textarea class="form-control ht-80" placeholder="Message"></textarea>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">Send Message</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>

  


  
   
@endsection
