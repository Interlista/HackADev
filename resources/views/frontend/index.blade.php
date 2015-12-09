@extends('frontend.layouts.master')

@section('content')

<body>

<div id="preloader">
    <div id="status">
        <img src="images/preloader.gif" height="64" width="64" alt="">
    </div>
</div>

<!-- Header
================================================== -->
<header>

    <div class="logo">
        <p>Interlista Disaster Management System</p>
    </div>

    <nav id="nav-wrap">

        <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
        <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>

        <ul id="nav" class="nav">

        </ul> <!-- end #nav -->

    </nav> <!-- end #nav-wrap -->

    <ul class="header-social">
        @if(Auth::guest())
        {!! Form::open(['url' => 'auth/login', 'class' => 'form-inline', 'role' => 'form']) !!}

            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Username</label>
                <input type="text" class="form-control logininput" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label class="sr-only" for="exampleInputPassword3">Password</label>
                <input type="password" class="form-control logininput" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="submit" value="Login"  class="button btnlogin">
            </div>

       {!! Form::close() !!}
        @else
            @permission('view-backend')
            <li class="button adminbtn">{!! link_to_route('backend.dashboard', trans('navs.administration')) !!}</li>
            @endauth
            <li class="button adminbtn">{!! link_to('auth/logout', trans('navs.logout')) !!}</li>
        @endif



    </ul>

</header> <!-- Header End -->


<!-- Homepage Hero
================================================== -->
<section id="hero">

    <div class="row">

        <div class="twelve columns">

            <div class="hero-text">
                <h1 class="responsive-headline">Interlista Network </h1>
                {{--<img src={{ URL::asset('img/mos.jpg') }} class="logoimage img-responsive"  alt="" width="300px" />--}}
                <h3 class="registerbtn">Disaster Management System - Uva Province</h3>
            </div>

            <div class="buttons">
                <div class="col-md-3 col-md-offset-2">
                    <a class="button " href="#" data-toggle="modal" data-target="#mohregistermodel" >Register Today</a>
                </div>
                <div class="col-md-3 col-md-offset-2">
                    <a class="button learn-more smoothscroll" href="#features" data-toggle="modal" data-target="#phiregistermodel">Learn More...</a>
                </div>

            </div>

            {{--<div class="hero-image">--}}
                {{--<img src="images/hero-image.png" alt="" />--}}
            {{--</div>--}}

        </div>

    </div>

</section> <!-- Homepage Hero end -->

<!-- Modal -->

<!-- Modal For PHI officer Register-->
<div id="phiregistermodel" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> PHI Officer Register</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url'=>'auth/register'])!!}
                    <div class="row">
                        {{--name--}}
                        <div class="col-md-6">
                            {!! Form::label('name', trans('validation.attributes.name'), ['class' => '']) !!}
                            {!! Form::input('name', 'name', old('name'), ['class' => 'form-control','required']) !!}
                        </div>
                        {{--nic--}}
                        <div class="col-md-6">
                            {!! Form::label('nic_number', trans('NIC'), ['class' => '']) !!}
                            {!! Form::input('nic_number', 'nic_number', old('nic_number'), ['class' => 'form-control','required']) !!}
                        </div>
                        {{--conact number--}}
                        <div class="col-md-6">
                            {!! Form::label('contact_number', trans('Contact Number'), ['class' => '']) !!}
                            {!! Form::input('number', 'contact_number', old('contact_number'), ['class' => 'form-control','required']) !!}
                        </div>
                        {{--phi_ref--}}
                        <div class="col-md-6">
                            {!! Form::label('phi_ref_number', trans('PHI Referance Number'), ['class' => '']) !!}
                            {!! Form::input('phi_ref_number', 'phi_ref_number', old('phi_ref_number'), ['class' => 'form-control','required']) !!}
                        </div>
                        {{--phi_area--}}
                        <div class="col-md-6">
                            {!! Form::label('phi_area', trans('PHI Area'), ['class' => '']) !!}
                            {{--{!! Form::input('se', 'name', old('name'), ['class' => 'form-control']) !!}--}}
                            <select class="form-control" name="phi_area" id="districtSelect" autocomplete="off" required>
                                <option selected>- Select District -</option>
                                <option value="Ampara">Ampara</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Matara">Matara</option>
                                <option value="Moneragala">Moneragala</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavuniya">Vavuniya</option>
                            </select>
                        </div>
                        {{--email--}}
                        <div class="col-md-6">
                            {!! Form::label('email', trans('validation.attributes.email'), ['class' => '']) !!}
                            {!! Form::input('email', 'email', old('email'), ['class' => 'form-control','required']) !!}
                        </div>
                        {{--password--}}
                        <div class="col-md-6">
                            {!! Form::label('password', trans('validation.attributes.password'), ['class' => '']) !!}
                            {!! Form::input('password', 'password', null, ['class' => 'form-control','required']) !!}
                        </div>
                        {{--confirm password--}}
                        <div class="col-md-6">
                            {!! Form::label('password_confirmation', trans('validation.attributes.password_confirmation'), ['class' => '']) !!}
                            {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control','required']) !!}
                        </div>

                        {{--hidden filed for status id--}}
                        <div class="col-md-6">
                            {!! Form::hidden('status', 1) !!}
                        </div>

                        {{--hidden filed for confirmed id--}}
                        <div class="col-md-6">
                            {!! Form::hidden('confirmed', 1) !!}
                        </div>

                        <div class="col-md-offset-8 col-md-2">
                            {!! Form::submit(trans('labels.register_button'), ['class' => 'btn btn-primary subphi']) !!}
                        </div>
                        <div class="col-md-2">
                            {!! Form::Reset(trans('Clear'), ['class' => 'btn btn-danger']) !!}
                        </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
</div>

<!-- Modal For MOH officer Register-->
<div id="mohregistermodel" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">


        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> MOH Officer Register</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url'=>'auth/register'])!!}
                <div class="row">
                    {{--name--}}
                    <div class="col-md-6">
                        {!! Form::label('name', trans('validation.attributes.name'), ['class' => '']) !!}
                        {!! Form::input('name', 'name', old('name'), ['class' => 'form-control']) !!}
                    </div>
                    {{--nic--}}
                    <div class="col-md-6">
                        {!! Form::label('nic_number', trans('NIC'), ['class' => '']) !!}
                        {!! Form::input('nic_number', 'nic_number', old('nic_number'), ['class' => 'form-control']) !!}
                    </div>
                    {{--conact number--}}
                    <div class="col-md-6">
                        {!! Form::label('contact_number', trans('Contact Number'), ['class' => '']) !!}
                        {!! Form::input('contact_number', 'contact_number', old('contact_number'), ['class' => 'form-control']) !!}
                    </div>
                    {{--moh_ref--}}
                    <div class="col-md-6">
                        {!! Form::label('moh_ref_number', trans('MOH Referance Number'), ['class' => '']) !!}
                        {!! Form::input('moh_ref_number', 'moh_ref_number', old('moh_ref_number'), ['class' => 'form-control']) !!}
                    </div>
                    {{--moh_area--}}
                    <div class="col-md-6">
                        {!! Form::label('moh_area', trans('MOH Area'), ['class' => '']) !!}
                        {{--{!! Form::input('se', 'name', old('name'), ['class' => 'form-control']) !!}--}}
                        <select class="form-control" name="moh_area" id="districtSelect" autocomplete="off">
                            <option selected>- Select District -</option>
                            <option value="Ampara">Ampara</option>
                            <option value="Anuradhapura">Anuradhapura</option>
                            <option value="Badulla">Badulla</option>
                            <option value="Batticalo">Batticalo</option>
                            <option value="Colombo">Colombo</option>
                            <option value="Galle">Galle</option>
                            <option value="Gampaha">Gampaha</option>
                            <option value="Hambantota">Hambantota</option>
                            <option value="Jaffna">Jaffna</option>
                            <option value="Kalutara">Kalutara</option>
                            <option value="Kandy">Kandy</option>
                            <option value="Kegalle">Kegalle</option>
                            <option value="Kurunegala">Kurunegala</option>
                            <option value="Mannar">Mannar</option>
                            <option value="Matara">Matara</option>
                            <option value="Moneragala">Moneragala</option>
                            <option value="Mullaitivu">Mullaitivu</option>
                            <option value="Nuwara Eliya">Nuwara Eliya</option>
                            <option value="Polonnaruwa">Polonnaruwa</option>
                            <option value="Puttalam">Puttalam</option>
                            <option value="Ratnapura">Ratnapura</option>
                            <option value="Trincomalee">Trincomalee</option>
                            <option value="Vavuniya">Vavuniya</option>
                        </select>
                    </div>
                    {{--email--}}
                    <div class="col-md-6">
                        {!! Form::label('email', trans('validation.attributes.email'), ['class' => '']) !!}
                        {!! Form::input('email', 'email', old('email'), ['class' => 'form-control']) !!}
                    </div>
                    {{--password--}}
                    <div class="col-md-6">
                        {!! Form::label('password', trans('validation.attributes.password'), ['class' => '']) !!}
                        {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
                    </div>
                    {{--confirm password--}}
                    <div class="col-md-6">
                        {!! Form::label('password_confirmation', trans('validation.attributes.password_confirmation'), ['class' => '']) !!}
                        {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) !!}
                    </div>

                    {{--hidden filed for status id--}}
                    <div class="col-md-6">
                        {!! Form::hidden('status', '1') !!}
                    </div>

                    {{--hidden filed for confirmed id--}}
                    <div class="col-md-6">
                        {!! Form::hidden('confirmed', '1') !!}
                    </div>

                    <div class="col-md-offset-8 col-md-2">
                        {!! Form::submit(trans('labels.register_button'), ['class' => 'btn btn-primary']) !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::Reset(trans('Clear'), ['class' => 'btn btn-danger']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            </div>

        </div>

    </div>
</div>

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



