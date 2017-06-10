<?php 
$title='BUKULAPUK - Lihat Produk';
$page_title='Daftar Produk';
$page_desc='Daftar produk yang tersedia'; 
?>

@extends('layouts.admin.master')
@section('content')
                        <!-- SECTION FILTER
                        ================================================== -->
                        <div class="row m-t-10 m-b-10">

                            <div class="col-sm-6">
                                <form role="form">
                                    <div class="form-group contact-search m-b-0">
                                        <input type="text" id="search" class="form-control product-search" placeholder="Search here...">
                                        <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
                                    </div> <!-- form-group -->
                                </form>
                            </div>

                        </div>


                        <div class="row">
                           @foreach($Products as $product)
                            <div class="m-b-15">
                                <div class="col-sm-6 col-lg-3 col-md-4 mobiles">
                                    <div class="product-list-box thumb">
                                        <a href="#;" class="image-popup" title="Screenshot-1">
                                            <img src="{{ $product->img_main }}" class="thumb-img" alt="work-thumbnail">
                                        </a>

                                        <div class="product-action">
                                            <a href="/admin/products/show/{{ $product->id }}" class="btn btn-success btn-sm"><i class="md md-pageview"></i></a>
                                            <a href="/admin/products/delete/{{ $product->id }}" class="btn btn-danger btn-sm"><i class="md md-close"></i></a>
                                        </div>

                                        <div class="price-tag">
                                           {{ $product->harga }}
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-t-0"><a href="" class="text-dark">{{ $product->judul }}</a> </h4>
                                            <h5 class="m-0"> <span class="text-muted"> Stock {{ $product->kuantitas }}.</span></h5>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div> <!-- End row -->
@endsection


@section('plugins')
 <script src="/assets/plugins/peity/jquery.peity.min.js"></script>
 <script src="/assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
 <script src="/assets/plugins/counterup/jquery.counterup.min.js"></script>
 <script src="/assets/plugins/raphael/raphael-min.js"></script>
 <script src="/assets/plugins/jquery-knob/jquery.knob.js"></script>

@endsection