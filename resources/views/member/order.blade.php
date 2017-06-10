<?php
$title='BUKULAPUK - Melihat Order Anda';
$page_title='Melihat Order Anda';
$page_desc='Melihat Order Anda di Marketplace';
?>
@extends('layouts.member.master')
@section('content')
                        
                            <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Melihat Semua Order</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                       Melihat Semua Order Anda
                                    </p>
                                    
                                    <table id="demo-foo-accordion" class="table m-b-0 toggle-arrow-tiny">
                                        <thead>
                                            <tr>
                                                <th data-sort-initial="true" data-toggle="true">No</th>
                                                <th>Nama</th>
                                                <th data-hide="phone">Total</th>
                                                <th data-hide="phone">Tanggal</th>
                                                <th style="text-align: center;">Status</th>
                                                <th data-sort-ignore="true" class="min-width" data-hide="phone">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($Member->Order as $key => $Order)
                                            @if($Order->status!=1)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <?php
                                                $total=0;
                                                foreach ($Order->Order_detail as $Orders) {
                                                    $total+=$Orders->quantity*$Orders->Product->harga;
                                                }
                                                ?>
                                                <td id="name{{$Order->id}}">#BKL{{ $Order->id }}</td>
                                                <td id="cat{{$Order->id}}">Rp. {{ $total }}</td>
                                                <td>{{date_format($Order->created_at,"D, d M Y")}}</td>
                                                @if($Order->Order_Status->id==5)
                                                <td style="text-align: center;"><span class="label label-table label-success">{{ $Order->Order_Status->name }}</span></td>
                                                @else
                                                <td style="text-align: center;"><span class="label label-table label-warning">{{ $Order->Order_Status->name }}</span></td>
                                                @endif
                                                <td>
                                                <a href="/member/order/invoice/{{$Order->id}}"><button class="btn btn-success btn-xs btn-icon fa fa-file-pdf-o"></button></a>
                                                &nbsp;
                                                <a href="/member/order/show/{{$Order->id}}"><button class="btn btn-info btn-xs btn-icon fa fa-table"></button></a>
                                                &nbsp;
                                                </td>
                                            </tr>
                                            @endif
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