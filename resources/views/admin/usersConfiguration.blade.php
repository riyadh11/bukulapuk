<?php
$title='BUKULAPUK - Konfigurasi Users';
$page_title='Konfigurasi Status User';
$page_desc='Konfigurasikan Status User pada Marketplace';
?>
@extends('layouts.admin.master')
@section('content')
                        
                            <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Konfigurasi Status Users</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        Tambah Atau Hapus Status Users.
                                    </p>
                                    
                                     <table id="demo-foo-accordion" class="table m-b-0 toggle-arrow-tiny">
                                        <thead>
                                            <tr>
                                                <th data-sort-initial="true" data-toggle="true">No</th>
                                                <th>Nama</th>
                                                <th data-hide="phone">Deskripsi</th>
                                                <th style="text-align: center;">Keterangan</th>
                                                <th data-sort-ignore="true" data-hide="phone" class="min-width">Options</th>
                                            </tr>
                                        </thead>
                                        <div class="pad-btm form-inline">
                                            <div class="row">
                                                <div class="col-sm-6 text-xs-center">
                                                    <div class="form-group">
                                                        <button  id="demo-btn-addrow"class="btn btn-default m-b-20" data-toggle="modal" data-target="#add_category" ><i class="fa fa-plus m-r-5"></i> Tambah Status User</button>
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
                                            @foreach($Member_Statuses as $key => $Member)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td id="name{{$Member->id}}">{{ $Member->name }}</td>
                                                <td id="desc{{$Member->id}}">{{ $Member->description }}</td>
                                                <td style="text-align: center;"><span class="label label-table label-success" >Active</span></td>
                                                <td>
                                                <button class="demo-delete-row btn btn-warning btn-xs btn-icon fa fa-cog" onclick="edit({{$Member->id}})"></button>
                                                &nbsp;
                                                <a href="/admin/member_status/delete/{{$Member->id}}"><button class="btn btn-danger btn-xs btn-icon fa fa-times"></button></a>
                                                &nbsp;
                                                <a href="/admin/show/member_status/{{$Member->id}}"><button class="btn btn-basic btn-xs btn-icon fa fa-table"></button></a></td>
                                            </tr>                                                
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
<!-- Modal ADD -->
                                        
                <div id="add_category" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                         {{ Form::open(array('id'=>'addCategoryForm','url'=>'/admin/configuration/users')) }}
                                        <div class="modal-dialog"> 
                                            <div class="modal-content"> 
                                                <div class="modal-header"> 
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                                    <h4 class="modal-title">Tambah Status User</h4> 
                                                </div> 
                                                <div class="modal-body"> 
                                                    <div class="row"> 
                                                        <div class="col-md-12"> 
                                                            <div class="form-group"> 
                                                                <label for="field-1" class="control-label">Nama</label> 
                                                                <input type="text" class="form-control" id="field-1" placeholder="Kategori 1" name="nama" required=""> 
                                                            </div> 
                                                        </div> 
                                                    <div class="row"> 
                                                        <div class="col-md-12"> 
                                                            <div class="form-group"> 
                                                                <label for="field-1" class="control-label">Deskripsi</label> 
                                                                <textarea class="form-control" id="field-1" placeholder="Ini Deskripsi Kategori 1" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;" name="deskripsi" required=""></textarea>
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                </div> 
                                                <div class="modal-footer"> 
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                                                    <button type="submit" class="btn btn-info waves-effect waves-light" id="sa-cat-save">Save</button> 
                                                </div> 
                                            </div> 
                                        </div>
                                    </div><!-- /.modal -->
                        {{ Form::close() }}
                        </div>

<!-- END Modal ADD -->

<!--Start Modal Edit -->
                                        
                <div id="edit_category" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        {{ Form::open(array('id'=>'editUserStatus','url'=>'/admin/configuration/users/edit')) }}
                                        <div class="modal-dialog"> 
                                            <div class="modal-content"> 
                                                <div class="modal-header"> 
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                                    <h4 class="modal-title">Ubah Status User</h4> 
                                                </div> 
                                                <div class="modal-body"> 
                                                    <div class="row"> 
                                                        <div class="col-md-12"> 
                                                            <div class="form-group"> 
                                                                <label for="field-1" class="control-label">Nama</label> 
                                                                <input type="text" class="form-control" placeholder="Kategori 1" name="nama" id="nama" required=""> 
                                                                <input type="hidden" name="id" value="" id="id">
                                                            </div> 
                                                        </div> 
                                                    <div class="row"> 
                                                        <div class="col-md-12"> 
                                                            <div class="form-group"> 
                                                                <label for="field-1" class="control-label">Deskripsi</label> 
                                                                <textarea class="form-control" placeholder="Ini Deskripsi Kategori 1" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;" name="deskripsi" id="deskripsi" required=""></textarea>
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
<!-- END Modal Edit -->
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
         $('#edit_category').modal('show'); 
     }
 </script>
@endsection