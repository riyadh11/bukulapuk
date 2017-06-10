<?php 
$meta_keywords="BUKULAPUK, Buku, Buku Usang";
$meta_desc="BUKULAPUK Adalah Pusat Jual Beli Online Buku terbesar se galaksi Andromeda";
$title="PEMBAYARAN ORDER";
$meta_title="PEMBAYARAN ORDER";
?>
@extends('pages.master')
@section('content')
@include('layouts.home.sidebar')
{{ Form::open(array('id'=>'checkout','url'=>'/checkout', 'method'=>'post')) }}
<div class="content-page">
            <!-- Start content -->
            <div class="xxx">
               <div class="container">
                <div class="row">
                     <div class="col-sm-12">

                        <h4 class="page-title">Pembayaran Order</h4>
                        <ol class="breadcrumb">
                           <li>
                              <a href="/">Home</a>
                           </li>
                           <li>
                              <a href="/cart">Order</a>
                           </li>
                           <li class="active">
                              Pembayaran Order
                           </li>
                        </ol>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-8">
                        <div class="card-box">
                           <h3>Isi Alamat Tujuan</h3>
                           <div class="row m-t-20">
                              <div class="col-md-12">
                                 <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                       <label class="col-md-3 control-label">Nama Penerima</label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" value="" id="penerima" name="penerima" required="">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-3 control-label">Alamat</label>
                                       <div class="col-md-9">
                                          <div class="col-md-12">
                                             <div class="col-md-12">
                                                <div class="radio radio-inverse radio-inline p-l-0">
                                                   <input type="radio" id="terakhir" value="terakhir" name="alamat_k" required="">
                                                   <label for="inlineRadio1"> Gunakan Alamat Terakhir </label>
                                                </div>
                                                <div class="radio radio-inline radio-inverse">
                                                   <input type="radio" id="baru" value="baru" name="alamat_k" required="" checked="">
                                                   <label for="inlineRadio2"> Tambah Alamat Baru </label>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                          </div>
                                          <input type="text" class="form-control" value="" name="alamat" required="" id="alamat">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-3 control-label" for="example-email">No Telp</label>
                                       <div class="col-md-9">
                                          <input type="tel" class="form-control" placeholder="" name="telp" id="telp" required="">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-3 control-label" for="example-email">Email</label>
                                       <div class="col-md-9">
                                          <input type="email" class="form-control" placeholder="" id="email" name="email" required="">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-3 control-label" for="example-email">Catatan</label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" placeholder="Contoh: Titipkan ke tetangga jika rumah kosong" name="catatan" required="">
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                              <div class="row">
                                 <h4>Pilih Metode Pengiriman</h4>
                                 <div class="col-md-12">
                                    <div class="row">
                                       @foreach($Shipping_Methods as $Shipping)
                                       <div class="col-sm-6 p-l-0">
                                          <div class="radio radio-inverse radio-inline  m-b-15">
                                             <input type="radio" id="shipp{{$Shipping->id}}" value="{{$Shipping->id}}" name="kirim" checked="">
                                             <label for="inlineRadio3"> {{$Shipping->name}} </label>
                                          </div>
                                       </div>
                                       @endforeach
                                    </div>
                                 </div>
                              </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="col-md-12">
                           <div class="card-box">
                              <div class="row">
                                 <h4>Ringkasan Berbelanja</h4>
                                 <div class="row">
                                 <?php $total=0;?>
                                 @foreach($Orders->Order_detail as $Order )
                                  <?php $total=$total + $Order->Product->harga*$Order->quantity;?>
                                 @endforeach
                                    <div class="col-md-6">Sub Total</div>
                                    <div class="col-md-6" align="right">Rp. {{$total}}</div>
                                    <div class="col-md-6">Biaya Kirim</div>
                                    <div class="col-md-6" align="right" id="kirim">Rp. 0</div>
                                 </div>
                                 <div class="row m-t-10">
                                    <div class="col-md-6">
                                       <h4>Total Belanja</h4>
                                    </div>
                                    <div class="col-md-6" align="right">
                                       <h4 id="total">Rp. {{$total}}</h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="card-box">
                              <div class="row">
                                 <h4>Pilih Pembayaran</h4>
                                 <div class="col-md-12">
                                    <div class="row">
                                       @foreach($Payment_Methods as $Payment)
                                       <div class="col-sm-6 p-l-0">
                                          <div class="radio radio-inverse radio-inline  m-b-15">
                                             <input type="radio" id="inlineRadio3" value="{{$Payment->id}}" name="bayar" checked="">
                                             <label for="inlineRadio3"> {{$Payment->name}} </label>
                                          </div>
                                       </div>
                                       @endforeach
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-inverse btn-custom waves-effect waves-light p-t-10 p-b-10" style="width: 100%">Bayar Sekarang</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- container -->
            </div>
  
                <style>.footer{bottom: initial;}</style>
{{ Form::close() }}
@endsection
@section('plugins')
         <link href="/assets/plugins/smoothproducts/css/smoothproducts.css" rel="stylesheet" type="text/css" />
         <link href="/assets/css/comment.css" rel="stylesheet" type="text/css" />
         <script src="/assets/plugins/smoothproducts/js/smoothproducts.min.js"></script>
         <script type="text/javascript">
            // wait for images to load
            $(window).load(function() {
                $('.sp-wrap').smoothproducts();
            });
            @foreach($Shipping_Methods as $Shipping)
            $('#shipp{{$Shipping->id}}').click(function(){
               $('#kirim').html('Rp. {{$Shipping->price}}');
               $('#total').html('Rp. {{$Shipping->price + $total}}');
            });
            @endforeach

            $('#terakhir').click(function(){
               $("#alamat").prop('disabled', true);
               $("#alamat").val('{{$Last->alamat}}');
               $("#telp").prop('disabled', true);
               $("#telp").val('{{$Last->telp}}');
               $("#penerima").prop('disabled', true);
               $("#penerima").val('{{$Last->penerima}}');
               $("#email").prop('disabled', true);
               $("#email").val('{{$Last->email}}');
            });


            $('#baru').click(function(){
               $("#telp").prop('disabled', false);
               $("#telp").val('');
               $("#penerima").prop('disabled', false);
               $("#penerima").val('');
               $("#email").prop('disabled', false);
               $("#email").val('');
               $("#alamat").prop('disabled', false);
               $("#alamat").val('');
            });

        </script>
@endsection