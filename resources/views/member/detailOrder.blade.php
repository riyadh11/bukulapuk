<?php
$title='BUKULAPUK - Melihat Detail Order';
$page_title='Melihat Detail Order';
$page_desc='Melihat Detail Order Anda';
?>
@extends('layouts.member.master')
@section('content')
                        
                            <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Melihat Detail Order Anda</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                       Melihat Detail Order Anda #BKL{{$Orders->id}}
                                    </p>
                                    
                                    <table id="demo-foo-accordion" class="table m-b-0 toggle-arrow-tiny">
                                        <thead>
                                            <tr>
                                                <th data-sort-initial="true" data-toggle="true">No</th>
                                                <th>Nama</th>
                                                <th data-hide="phone">Jumlah</th>
                                                <th data-hide="phone">Harga Satuan</th>
                                                <th style="text-align: center;">Total</th>
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