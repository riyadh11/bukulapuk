<?php 
$title="KERANJANG BELANJA";
$meta_title="KERANJANG BELANJA";
?>
@extends('pages.master')
@section('content')
@include('layouts.home.sidebar')
<div class="content-page">
            <!-- Start content -->
            <div class="xx">
               <div class="container">
                       <div class="row">
                       <div class="col-sm-12">

                        <h4 class="page-title">Keranjang Belanja</h4>
                        <ol class="breadcrumb">
                           <li>
                              <a href="/">Home</a>
                           </li>
                           <li>
                              <a href="/cart">Order</a>
                           </li>
                           <li class="active">
                              Keranjang Belanja
                           </li>
                        </ol>
                     </div>
                           <div class="col-xs-12">
                                   <div class="row">
                                   <div class="card-box">
                     <h2>Keranjang Belanja</h2>
                        <table data-toggle="table"  
                           data-page-size="10"
                           data-pagination="true" class="table-bordered ">
                           <thead>
                              <tr>
                                 <th data-field="state" data-checkbox="true"></th>
                                 <th data-field="id" data-switchable="false">Judul Buku</th>
                                 <th data-field="name">Kuantitas</th>
                                 <th data-field="date">Harga Buku</th>
                                 <th data-field="amount">Seller</th>
                                 <th data-field="user-status" class="text-center">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                                <?php $total=0;?>
                                 @foreach($Orders->Order_detail as $Order)
                              <tr>
                                 <td></td>
                                 <td>
                                    <a href="/product/{{$Order->Product->id}}">
                                       <img class="img-thumbnail img-responsive" style="max-height: 120px" src="{{$Order->Product->img_main}}">
                                       <p>{{$Order->Product->judul}}</p>
                                    </a>
                                 </td>
                                 <td>
                                    <p align="center">{{$Order->quantity}}</p>
                                 </td>
                                 <td>
                                    <p align="center">{{$Order->Product->harga}}</p>
                                 </td>
                                 <td>
                                    <p align="center">{{$Order->Product->Member->name}}</p>
                                 </td>
                                 <td><a href="#"><span class="label label-table label-success m-r-10">Beli</span></a><a href=/removeCart/{{$Order->Product->id}}"><span class="label label-table label-danger">Hapus</span></a></td>
                              </tr>
                              <?php $total=$total + $Order->Product->harga*$Order->quantity;?>
                              @endforeach
                           </tbody>
                        </table>
                        <div class="container p-20">
                           <div class="row">
                              <div class="col-sm-12" align="center">
                                 <a href="/shipping">
                                 <button type="button" class="btn btn-success btn-custom waves-effect waves-light">Bayar!</button>
                                </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="container">
                     <div class="col-sm-12">
                        <div class="col-md-12 p-20">
                           <div class="container" align="center">
                              <h4>Harga Total</h4>
                              <b>
                                 <p>Rp. {{$total}}</p>
                              </b>
                           </div>
                        </div>
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
         <link href="/assets/plugins/smoothproducts/css/smoothproducts.css" rel="stylesheet" type="text/css" />
         <link href="/assets/css/comment.css" rel="stylesheet" type="text/css" />
         <script src="/assets/plugins/smoothproducts/js/smoothproducts.min.js"></script>
         <script src="/assets/plugins/bootstrap-table/js/bootstrap-table.min.js"></script>
         <script src="/assets/pages/jquery.bs-table.js"></script>
         <script type="text/javascript">
            // wait for images to load
            $(window).load(function() {
                $('.sp-wrap').smoothproducts();
            });
        </script>
@endsection