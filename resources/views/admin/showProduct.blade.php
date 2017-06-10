<?php
$title='BUKULAPUK - Show Produk';
$page_title='Melihat Produk';
$page_desc='Melihat Produk di Marketplace';
?>
@extends('layouts.admin.master')
@section('content')
                        
                            <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Melihat Semua Produk</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                       Melihat Semua Produk Berdasarkan Filter
                                    </p>
                                    
                                    <table id="demo-foo-accordion" class="table m-b-0 toggle-arrow-tiny">
                                        <thead>
                                            <tr>
                                                <th data-sort-initial="true" data-toggle="true">No</th>
                                                <th>Nama</th>
                                                <th data-hide="phone">Kategori</th>
                                                <th style="text-align: center;">Keterangan</th>
                                                <th data-sort-ignore="true" class="min-width" data-hide="phone">Options</th>
                                            </tr>
                                        </thead>
                                        <div class="pad-btm form-inline">
                                            <div class="row">
                                                <div class="col-sm-6 text-xs-center">
                                                </div>
                                                <div class="col-sm-6 text-xs-center text-right">
                                                    <div class="form-group">
                                                        <input id="demo-input-search2" type="text" placeholder="Search" class="form-control  input-sm" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <tbody>
                                            @foreach($Products->Product as $key => $Product)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td id="name{{$Product->id}}">{{ $Product->judul }}</td>
                                                <td id="cat{{$Product->id}}">{{ $Product->category }}</td>
                                                @if($Product->status!=1)
                                                <td style="text-align: center;"><span class="label label-table label-danger">{{$Product->Product_Status->name}}</span></td>
                                                <td>
                                                @else
                                                <td style="text-align: center;"><span class="label label-table label-success">{{$Product->Product_Status->name}}</span></td>
                                                <td>
                                                @endif
                                                <button class="btn btn-warning btn-xs btn-icon fa fa-cog"></button>
                                                &nbsp;
                                                <a href="/admin/products/delete/{{$Product->id}}"><button class="btn btn-danger btn-xs btn-icon fa fa-times"></button></a>
                                                &nbsp;
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