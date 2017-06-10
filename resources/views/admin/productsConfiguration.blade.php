<?php
$title='BUKULAPUK - Konfigurasi Status Produk';
$page_title='Konfigurasi Produk';
$page_desc='Konfigurasikan Status Produk pada Marketplace';
?>
@extends('layouts.admin.master')
@section('content')
                        
                            <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Konfigurasi Status Produk</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        Tambah Atau Hapus Status Produk.
                                    </p>
                                    
                                    <table id="demo-foo-accordion" class="table m-b-0 toggle-arrow-tiny">
                                        <thead>
                                            <tr>
                                                <th data-sort-initial="true" data-toggle="true">No</th>
                                                <th>Nama</th>
                                                <th data-hide="phone">Deskripsi</th>
                                                <th style="text-align: center;">Keterangan</th>
                                                <th data-sort-ignore="true" class="min-width" data-hide="phone">Options</th>
                                            </tr>
                                        </thead>
                                        <div class="pad-btm form-inline">
                                            <div class="row">
                                                <div class="col-sm-6 text-xs-center">
                                                    <div class="form-group">
                                                        <button  id="demo-btn-addrow"class="btn btn-default m-b-20" data-toggle="modal" data-target="#add_product_status" ><i class="fa fa-plus m-r-5"></i> Tambah Status Produk</button>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 text-xs-center text-right">
                                                    <div class="form-group">
                                                        <input id="demo-input-search2" type="text" placeholder="Search" class="form-control  input-sm" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <tbody>
                                            @foreach($Product_Statuses as $key => $Product_Status)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td id="name{{$Product_Status->id}}">{{ $Product_Status->name }}</td>
                                                <td id="desc{{$Product_Status->id}}">{{ $Product_Status->details }}</td>
                                                <td style="text-align: center;"><span class="label label-table label-success">Active</span></td>
                                                <td>
                                                <button class="btn btn-warning btn-xs btn-icon fa fa-cog" onclick="edit({{$Product_Status->id}})"></button>
                                                &nbsp;
                                                <a href="/admin/status/delete/{{$Product_Status->id}}"><button class="btn btn-danger btn-xs btn-icon fa fa-times"></button></a>
                                                &nbsp;
                                                <a href="/admin/show/status/{{$Product_Status->id}}"><button class="btn btn-basic btn-xs btn-icon fa fa-table"></button></a></td>
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
@section('modals')
                <!-- Start Add_ProductStatus Modals -->
                <div id="add_product_status" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        {{ Form::open(array('id'=>'addProductStatus','url'=>'/admin/configuration/products')) }}
                                        <div class="modal-dialog"> 
                                            <div class="modal-content"> 
                                                <div class="modal-header"> 
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                                    <h4 class="modal-title">Tambah Status Produk</h4> 
                                                </div> 
                                                <div class="modal-body"> 
                                                    <div class="row"> 
                                                        <div class="col-md-12"> 
                                                            <div class="form-group"> 
                                                                <label for="field-1" class="control-label">Nama</label> 
                                                                <input type="text" class="form-control" id="field-1" placeholder="Aktif" name="nama" required=""> 
                                                            </div> 
                                                        </div> 
                                                    <div class="row"> 
                                                        <div class="col-md-12"> 
                                                            <div class="form-group"> 
                                                                <label for="field-1" class="control-label">Deskripsi</label> 
                                                                <textarea class="form-control" id="field-1" placeholder="Ini Deskripsi Aktif 1" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;" name="deskripsi" required=""></textarea>
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                </div> 
                                                <div class="modal-footer"> 
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                                                    <button type="submit" class="btn btn-success waves-effect waves-light" id="sa-cat-save">Save</button> 
                                                </div> 
                                            </div> 
                                        </div>
                                    </div><!-- /.modal -->
                                    {{ Form::close() }}
                </div>
                <!-- END Add_ProductStatus Modals -->

                <!-- Start Add_ProductStatus Modals -->
                <div id="edit_product_status" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        {{ Form::open(array('id'=>'addProductStatus','url'=>'/admin/configuration/products/edit')) }}
                                        <div class="modal-dialog"> 
                                            <div class="modal-content"> 
                                                <div class="modal-header"> 
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                                    <h4 class="modal-title">Ubah Status Produk</h4> 
                                                </div> 
                                                <div class="modal-body"> 
                                                    <div class="row"> 
                                                        <div class="col-md-12"> 
                                                            <div class="form-group"> 
                                                                <label for="field-1" class="control-label">Nama</label> 
                                                                <input type="text" class="form-control" id="nama" placeholder="Aktif" name="nama" required=""> 
                                                                <input type="hidden" name="id" value="" id="id">
                                                            </div> 
                                                        </div> 
                                                    <div class="row"> 
                                                        <div class="col-md-12"> 
                                                            <div class="form-group"> 
                                                                <label for="field-1" class="control-label">Deskripsi</label> 
                                                                <textarea class="form-control" id="deskripsi" placeholder="Ini Deskripsi Aktif 1" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;" required="" name="deskripsi"></textarea>
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                </div> 
                                                <div class="modal-footer"> 
                                                    <button type="submit" class="btn btn-success waves-effect waves-light" id="sa-cat-save">Save changes</button> 
                                                    <button type="button" class="btn btn-danger waves-effect waves-light" id="sa-cat-save">Delete</button> 
                                                </div> 
                                            </div> 
                                        </div>
                                    </div><!-- /.modal -->
                                    {{ Form::close() }}
                </div>
                <!-- END Add_ProductStatus Modals -->


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