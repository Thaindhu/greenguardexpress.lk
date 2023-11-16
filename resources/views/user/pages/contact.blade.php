@extends('user.layouts.app')

@section('title')
    greenguardexpress.lk | Contact Us
@endsection

@section('styles')
@endsection

@section('content')
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Contact us</a></li>
        </ul>

        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="page-title">
                    <h2>Contact Us</h2>
                </div>

                <iframe
                   src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.385058523072!2d79.9133!3d6.9518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1f3a7fb4513ac3e1!2zNsKwMjAnMzkuMCJOIDgwwrAwNCc0OC40IkU!5e0!3m2!1sen!2slk!4v1670586047690!5m2!1sen!2slk"
                     width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="info-contact clearfix">
                    <div class="col-lg-4 col-sm-4 col-xs-12 info-store">
                        <div class="row">
                            <div class="name-store">
                                <h3>Your Store</h3>
                            </div>
                            <address>
                                <div class="address clearfix form-group">
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="text">Greenguardexpress.lk,Hibutuwelgoda,Kelaniya.
                                    </div>
                                </div>
                                <div class="phone form-group">
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="text">Phone : 0761019156</div>
                                </div>
                                <div class="phone form-group">
                                    <div class="icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="text">email : info@greenguardexpress.lk</div>
                                </div>
                            </address>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-8 col-xs-12 contact-form">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <fieldset>
                                <legend>Contact Form</legend>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-name">Your Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="" id="input-name"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-email">E-Mail Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" value="" id="input-email"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-enquiry">Enquiry</label>
                                    <div class="col-sm-10">
                                        <textarea name="enquiry" rows="10" id="input-enquiry" class="form-control"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="buttons">
                                <div class="pull-right">
                                    <button class="btn btn-default buttonGray" type="submit">
                                        <span>Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
