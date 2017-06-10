<?php
$title='BUKULAPUK - Monitor Komentar';
$page_title='Monitor Komentar';
$page_desc='Monitoring komentar di Marketplace';
?>
@extends('layouts.admin.master')
@section('content')
                        
                            <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Monitoring Komentar</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                       Monitoring Komentar user
                                    </p>
                                    
                                    <table id="demo-foo-accordion" class="table m-b-0 toggle-arrow-tiny">
                                        <thead>
                                            <tr>
                                                <th data-sort-initial="true" data-toggle="true">No</th>
                                                <th>Nama</th>
                                                <th data-hide="phone">Produk</th>
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
                                            @foreach($Comments as $key => $Comment)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td id="name{{$Comment->id}}">{{ $Comment->Member->name }}</td>
                                                <td id="cat{{$Comment->id}}">{{ $Comment->Product->judul }}</td>
                                                 <td id="cat{{$Comment->id}}">{{ $Comment->commentary }}</td>
                                                @if($Comment->status!=1)
                                                <td style="text-align: center;"><span class="label label-table label-danger">
                                                @else
                                                 <td style="text-align: center;"><span class="label label-table label-success">
                                                @endif

                                                {{$Comment->Comment_Status->name}}</span></td>
                                                
                                                <td>
                                                <button class="btn btn-warning btn-xs btn-icon fa fa-cog"></button>
                                                &nbsp;
                                                <a href="/admin/Comments/toggle/{{$Comment->id}}"><button class="btn btn-success btn-xs btn-icon fa fa-check"></button></a>
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
         $('#edit_Comment_status').modal('show'); 
     }
 </script>
@endsection