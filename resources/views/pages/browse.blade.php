<?php 
$title="BROWSE";
$meta_title="BROWSE";
?>
@extends('pages.master')
@section('content')
@include('layouts.home.sidebar')
<div class="content-page">
            <!-- Start content -->
            <div class="xx">
               <div class="container">

                  <!-- Page-Title -->
               <div class="row">
                  <div class="col-sm-12">
                     <h4 class="page-title">Browse Product</h4>
                     <ol class="breadcrumb">
                        <li>
                           <a href="#">Home</a>
                        </li>
                        <li class="active">
                           Browse Product
                        </li>
                     </ol>
                  </div>

               <div class="row m-t-10 m-b-10">
                  <div class="col-sm-6">
                     <form role="form" action="/search" method="post">
                      {{ csrf_field() }}
                        <div class="form-group contact-search m-b-0">
                           <input type="text" id="search" name="search" class="form-control product-search" placeholder="Cari judul...">
                           <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
                        </div>
                        <!-- form-group -->
                     </form>
                  </div>
               </div>
               </div>

                       <div class="row">
                           <div class="col-xs-12">
                                       <div class="row">
               <div class="m-b-15">
                  @foreach($Details as $Product)
                  @if($Product->Member->status==1)
                  <div class="col-sm-6 col-lg-3 col-md-4">
                     <div class="product-list-box thumb" style="padding-bottom: 54px;" onmouseover="dispBuy(this)" onmouseout="hideBuy(this)">
                        <a href="#;" class="image-popup" title="Screenshot-1">
                        <img src="{{$Product->img_main}}" class="thumb-img" alt="work-thumbnail">
                        </a>
                        <div class="product-action">
                        </div>
                        <div class="detail">
                           <h4 class="m-t-0"><a href="" class="text-dark"></a>{{$Product->judul or 'Buku'}} </h4>
                           <div class="rating">
                              <ul class="list-inline">
                                 <li><a class="fa fa-star" href=""></a></li>
                                 <li><a class="fa fa-star" href=""></a></li>
                                 <li><a class="fa fa-star" href=""></a></li>
                                 <li><a class="fa fa-star" href=""></a></li>
                                 <li><a class="fa fa-star-o" href=""></a></li>
                              </ul>
                           </div>
                           <h5 class="m-0"> <span class="text-muted"> Stock : {{$Product->kuantitas or '7'}}</span></h5>
                           <div style="display: none;" class="text-center p-t-10">
                              <a href="/product/{{$Product->id}}">
                              <button type="button" class="btn btn-inverse waves-effect waves-light">
                                 <i class="md-add-shopping-cart m-r-5"></i> BELI SEKARANG
                              </button>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <style>.footer{bottom:initial;}</style>
                  @endif
                  @endforeach
               </div>
               @if($Details->count()<1)
                                      <div class="ex-page-content text-center" style="margin-bottom: 30px;">
                                        <div class="text-error"><span class="text-primary">O</span><i class="ti-face-sad text-pink"></i><span class="text-info">ps</span></div>
                                          <h2>Who0ps! We Can't Find Your Products!</h2><br>
                                          <br>
                                          <a class="btn btn-default waves-effect waves-light" href="/"> Return Home</a>
                                    </div>
               <style>
              .footer{
                bottom: initial;
               }  
               
               </style>
               @endif
            </div><!--END Product List-->
         </div> <!-- end col -->
      </div> <!-- end row -->
   </div> <!-- container -->
</div> <!-- content -->

@endsection
@section('plugins')
         <link href="/assets/plugins/smoothproducts/css/smoothproducts.css" rel="stylesheet" type="text/css" />
         <script src="/assets/plugins/smoothproducts/js/smoothproducts.min.js"></script>
         <script type="text/javascript">
            // wait for images to load
            $(window).load(function() {
                $('.sp-wrap').smoothproducts();
            });

            function dispBuy(x){
               var c=x.children;
               var d=c[2].children;
               x.style.cssText="padding-bottom:10px";
               d[3].style.display="block";
            
            }
            function hideBuy(x){
               var c=x.children;
               var d=c[2].children;
               x.style.cssText="padding-bottom:54px";
               d[3].style.display="none";
            }
        </script>
@endsection