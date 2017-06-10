@extends('layouts.core.AuthTemplate')

@section('content')
            <div class=" card-box">
            <div class="panel-heading"> 
                <h3 class="text-center"> <strong class="text-custom">BUKULAPUK</strong> MEMBER REGISTER </h3>
            </div> 


            <div class="panel-body">
            <form class="form-horizontal m-t-20" role="form" method="POST" action="{{ url('/member/register') }}">
                        {{ csrf_field() }}
                
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="true" placeholder="Nama" name="name" value="{{ old('name') }}" autofocus>
                        @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                    <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="true" placeholder="Username" name="username" value="{{ old('username') }}" autofocus>
                        @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

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
                        <button class="btn btn-success btn-block text-uppercase waves-effect waves-light" type="submit">Register</button>
                    </div>
                </div>
            </form> 
            
            </div>   
            </div>                              
                <div class="row">
                <div class="col-sm-12 text-center">
                    <p>have an account? <a href="{{ url('/member/login') }}" class="text-primary m-l-5"><b>Login</b></a></p>      
                    </div>
            </div>
            

@endsection
