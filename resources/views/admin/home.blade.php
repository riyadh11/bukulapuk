@extends('layouts.admin.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in as Admin!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('plugins')
 <script src="/assets/plugins/peity/jquery.peity.min.js"></script>
 <script src="/assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
 <script src="/assets/plugins/counterup/jquery.counterup.min.js"></script>

 <script src="/assets/plugins/raphael/raphael-min.js"></script>
 <script src="/assets/plugins/jquery-knob/jquery.knob.js"></script>
  
@endsection