<?php
$title='BUKULAPUK -INVOICE';
$page_title='INVOICE #BKL'.$Orders->id;
$page_desc=' ';
?>
@extends('layouts.member.master')
@section('content')
<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <h2 class="text-right"><b>BUKULAPUK</b></h2>
                                                
                                            </div>
                                            <div class="pull-right">
                                                <h4>Invoice # <br>
                                                    <strong>BKL{{$Orders->id}}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong>{{$Orders->Shipping->Address->penerima}}.</strong><br>
                                                      {{$Orders->Shipping->Address->alamat}}<br>
                                                       <abbr title="E-Mail">E:</abbr>{{$Orders->Shipping->Address->email}}<br>
                                                      <abbr title="Phone">P:</abbr> {{$Orders->Shipping->Address->telp}}
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Order Date: </strong>{{date_format($Orders->created_at,"D, d M Y")}}</p>
                                                    @if($Orders->status!=5)
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">{{$Orders->Order_Status->name}}</span></p>
                                                    @else
                                                     <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-success">{{$Orders->Order_Status->name}}</span></p>
                                                    @endif
                                                    <p class="m-t-10"><strong>Order ID: </strong> #{{$Orders->id}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table id="demo-foo-accordion" class="table m-b-0 toggle-arrow-tiny">
                                        <thead>
                                            <tr>
                                                <th data-sort-initial="true" data-toggle="true">#</th>
                                                <th>Judul</th>
                                                <th data-hide="phone">Deskripsi</th>
                                                <th data-hide="phone">Kuantitas</th>
                                                <th data-hide="phone">Harga Satuan</th>
                                                <th style="text-align: center;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $jumlah=0;?>
                                            @foreach($Orders->Order_detail as $key => $Order)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{$Order->Product->judul}}</td>
                                                <td>{{$Order->Product->description}}</td>
                                                <td>{{$kuantitas=$Order->quantity}}</td>
                                                <td>{{$Order->Product->harga}}</td>
                                                <td>{{$total=$Order->Product->harga*$kuantitas}}</td>
                                                <?php $jumlah+=$total;?>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-3 col-md-offset-9">
                                                <p class="text-right"><b>Sub-total:</b>Rp.{{$jumlah}}</p>
                                                <p class="text-right">Kirim:Rp.{{$kirim=$Orders->Shipping->Method->price}} ({{$Orders->Shipping->Method->name}})</p>
                                                <hr>
                                                <h3 class="text-right">Rp. {{$jumlah+$kirim}}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="/member/order" class="btn btn-primary waves-effect waves-light">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

@endsection
@section('plugins')
 <script src="/assets/plugins/custombox/js/custombox.min.js"></script>
 <script src="/assets/plugins/custombox/js/legacy.min.js"></script>
 <script src="/assets/plugins/footable/js/footable.all.min.js"></script>
 <script src="/assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
 <script src="/assets/pages/jquery.footable.js"></script>
@endsection