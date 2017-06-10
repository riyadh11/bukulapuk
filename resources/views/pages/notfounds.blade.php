<?php 
$title=$meta_title="OOPS TIDAK DITEMUKAN";
?>
@extends('pages.master')
@section('content')
@include('layouts.home.sidebar')
<div class="content-page">
            <!-- Start content -->
            <div class="xx">
               <div class="container">
                       <div class="row">
                           <div class="col-xs-12">
                                   <div class="row">
                                      <div class="ex-page-content text-center" style="margin-bottom: 30px;">
                                        <div class="text-error"><span class="text-primary">4</span><i class="ti-face-sad text-pink"></i><span class="text-info">4</span></div>
                                          <h2>Who0ps! Page not found</h2><br>
                                          <p class="text-muted">This page cannot found or is missing.</p>
                                          <p class="text-muted">Use the navigation above or the button below to get back and track.</p>
                                          <br>
                                          <a class="btn btn-default waves-effect waves-light" href="/"> Return Home</a>
                                    </div>
                                   </div>
                                   <!-- end row -->
                           </div> <!-- end col -->
                       </div> <!-- end row -->
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<style type="text/css" media="screen">
.footer{
  bottom: initial;
}  
</style>
@endsection
@section('plugins')
@endsection