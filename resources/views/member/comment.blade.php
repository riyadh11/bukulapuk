<?php
$title='BUKULAPUK - Monitor Komentar';
$page_title='Monitor Komentar';
$page_desc='Monitoring komentar Anda di Marketplace';
?>
@extends('layouts.member.master')
@section('content')
                        
                            <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Monitoring Komentar</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                       Monitoring Komentar anda
                                    </p>
                                    
                                    <table id="demo-foo-accordion" class="table m-b-0 toggle-arrow-tiny">
                                        <thead>
                                            <tr>
                                                <th data-sort-initial="true" data-toggle="true">No</th>
                                                <th>Produk</th>
                                                <th data-hide="phone">Komentar</th>
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
                                            @foreach($Member->Comment as $key => $Comment)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td id="prod{{$Comment->id}}">{{ $Comment->Product->judul }}</td>
                                                 <td id="kom{{$Comment->id}}">{{ $Comment->commentary }}</td>
                                                @if($Comment->status!=1)
                                                <td style="text-align: center;"><span class="label label-table label-danger">
                                                @else
                                                 <td style="text-align: center;"><span class="label label-table label-success">
                                                @endif

                                                {{$Comment->Comment_Status->name}}</span></td>
                                                
                                                <td>
                                                <button class="btn btn-warning btn-xs btn-icon fa fa-cog" onclick="edit({{$Comment->id}})"></button>
                                                &nbsp;
                                                <a href="/member/comment/remove/{{$Comment->id}}"><button class="btn btn-danger btn-xs btn-icon fa fa-times"></button></a>
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
@section('modals')
                <!-- Start Edit_Comment Modals -->
                <div id="editComment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        {{ Form::open(array('id'=>'editComment','url'=>'/member/comment/update')) }}
                                        <div class="modal-dialog"> 
                                            <div class="modal-content"> 
                                                <div class="modal-header"> 
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                                    <h4 class="modal-title">Ubah Komentar</h4> 
                                                </div> 
                                                <div class="modal-body"> 
                                                    <div class="row"> 
                                                        <div class="col-md-12"> 
                                                            <div class="form-group"> 
                                                                <label for="field-1" class="control-label">Produk</label> 
                                                                <input type="text" class="form-control" id="produk" placeholder="Aktif" name="produk" disabled=""> 
                                                                <input type="hidden" name="id" id="id" value="">
                                                            </div> 
                                                        </div> 
                                                    <div class="row"> 
                                                        <div class="col-md-12"> 
                                                            <div class="form-group"> 
                                                                <label for="field-1" class="control-label">Komentar</label> 
                                                                <textarea class="form-control" id="komentar" placeholder="Ini Komentar 1" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;" name="komentar" required=""></textarea>
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
                <!-- END Edit_Comments Modals -->
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
         $('#produk').val($('#prod'+$id).html());
         $('#komentar').val($('#kom'+$id).html());
         $('#editComment').modal('show'); 
     }
 </script>
@endsection