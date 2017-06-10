<?php 
$page_title="BUKULAPUK - ADMIN LOGIN";
?>
@extends('layouts.core.AuthTemplate')

@section('content')
            <div class=" card-box">
            <div class="panel-heading"> 
                <h3 class="text-center"> <strong class="text-custom">BUKULAPUK</strong> ADMIN PAGE </h3>
            </div> 


            <div class="panel-body">
            <form class="form-horizontal m-t-20" role="form" method="POST" action="{{ url('/admin/login') }}">
                        {{ csrf_field() }}
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="true" placeholder="E-Mail" name="email">
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

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">
                                Remember me
                            </label>
                        </div>
                        
                    </div>
                </div>
                
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="{{ url('/admin/password/reset') }}" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                    </div>
                </div>
            </form> 
            
            </div>   
            </div>                              
                <div class="row">
                <div class="col-sm-12 text-center">
                    <p>Don't have an account? <a href="{{ url('/admin/register') }}" class="text-primary m-l-5"><b>Sign Up</b></a></p>      
                    </div>
            </div>
            

@endsection
