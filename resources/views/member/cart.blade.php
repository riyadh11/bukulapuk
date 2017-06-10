<?php
$title='BUKULAPUK - Melihat Detail Keranjang Belanja';
$page_title='Melihat Detail Keranjang Belanja';
$page_desc='Melihat Detail Keranjang Belanja Anda';
?>
@extends('layouts.member.master')
@section('content')
                        
                            <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Melihat Detail Keranjang Belanja Anda</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                       Melihat Detail Keranjang Belanja Anda #BKL{{$Orders->id}}
                                    </p>
                                    
                                    <table id="demo-foo-accordion" class="table m-b-0 toggle-arrow-tiny">
                                        <thead>
                                            <tr>
                                                <th data-sort-initial="true" data-toggle="true">No</th>
                                                <th>Nama</th>
                                                <th data-hide="phone">Jumlah</th>
                                                <th data-hide="phone">Harga Satuan</th>
                                                <th style="text-align: center;">Total</th>
                                                <th data-sort-ignore="true" class="min-width" data-hide="phone">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($Orders->Order_detail as $key => $Order)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{$Order->Product->judul}}</td>
                                                <td>{{$Order->quantity}}</td>
                                                <td>{{$Order->Product->harga}}</td>
                                                <td>{{$Order->Product->harga*$Order->quantity}}</td>
                                                <td>
                                                <a href="/product/{{$Order->Product->id}}"><button class="btn btn-success btn-xs btn-icon fa fa-eye"></button></a>
                                                &nbsp;
                                                <a href="/removeCart/{{$Order->Product->id}}"><button class="btn btn-danger btn-xs btn-icon fa fa-times"></button></a>
                                                &nbsp;
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-split m-t-30"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
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

 <script>
     function edit($id) {
         $('#id').val($id);
         $('#nama').val($('#name'+$id).html());
         $('#deskripsi').val($('#desc'+$id).html());
         $('#edit_product_status').modal('show'); 
     }
 </script>
@endsection