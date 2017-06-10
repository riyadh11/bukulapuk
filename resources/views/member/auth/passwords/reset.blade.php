<?php
$page_title="BUKULAPUK - RECOVER PASSWORD";
?>
@extends('layouts.core.AuthTemplate')

@section('content')
            <div class=" card-box">
            <div class="panel-heading"> 
                <h3 class="text-center"> <strong class="text-custom">BUKULAPUK</strong> RECOVER PAGE </h3>
            </div> 
            <div class="panel-body">
            <form class="form-horizontal m-t-20" role="form" method="POST" action="{{ url('/member/password/reset') }}">
                        {{ csrf_field() }}
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="true" placeholder="E-Mail" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required="true" placeholder="Password" name="password">
                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required="true" placeholder="Confirmation Password" name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                    </div>
                </div>
                
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
                </div>
            </form> 
            
@endsection
