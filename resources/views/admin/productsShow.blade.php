<?php
$title="BUKULAPUK - Lihat / Ubah Product";
$page_title="Lihat / Ubah Product";
$page_desc="Lihat atau ubah produk";
?>
@extends('layouts.admin.master')
@section('content')
{{ Form::open(array('id'=>'addProductsForm','url'=>'/member/addproduct', 'files' => true)) }}
                        <div class="row">
                            <div class="col-sm-12">
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card-box">
                                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Umum</b></h5>
                                                    <div class="form-group m-b-20">
                                                        <label>Nama Buku <span class="text-danger">*</span></label>
                                                        <input type="text" name="nama_produk" class="form-control" value="{{$Products->judul}}" disabled="">
                                                        <input type="hidden" name="id" value="{{$Products->id}}" id="id">
                                                    </div>
                                                    <div class="form-group m-b-20">
                                                        <label>Deskripsi <span class="text-danger">*</span></label>
                                                        <textarea name="deskripsi" class="form-control" rows="3" disabled=""> {{$Products->description}} </textarea>
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label>Kategori <span class="text-danger">*</span></label>
                                                        <select class="form-control select2" name="kategori" value="{{$Products->Category->name}}" disabled="">
                                                            <option value="{{$Products->category}}">{{$Products->Category->name}}</option>}
                                                            
                                                        </select>
                                                    </div>


                                                    <div class="form-group m-b-20">
                                                        <label>Penerbit <span class="text-danger">*</span></label>
                                                        <select class="form-control select2" name="penerbit" required="true" disabled="">
                                                              <option value="{{$Products->penerbit}}">{{$Products->publishers->name}}</option>}
                                                        </select>
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label>Tahun Terbit <span class="text-danger">*</span></label>
                                                        <select class="form-control select2" name="tahun_terbit" required="true" disabled="">
                                                          <option value="{{$Products->tahun_terbit}}">{{$Products->tahun_terbit}}</option>}
                                                         </select>
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label>Harga <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" value="{{$Products->harga}}" name="harga"  disabled="">
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label>Kuantitas <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="kuantitas" value="{{$Products->kuantitas}}" required="true" disabled="">
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label class="m-b-15">Status <span class="text-danger">*</span></label>
                                                        <br/>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="inlineRadio1" name="status" value="2" name="radioInline" checked="">
                                                            <label for="inlineRadio1"> Activate </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="inlineRadio2" name="status" value="5" name="radioInline">
                                                            <label for="inlineRadio2"> Terminate </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="card-box">
                                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Meta Data</b></h5>

                                                    <div class="form-group m-b-20">
                                                        <label>Judul Meta</label>
                                                        <input type="text" name="metaTitle" class="form-control" value="{{$Products->Product_Meta->title}}" required="">
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label>Keyword Meta</label>
                                                        <input type="text" name="metaKeywords" class="form-control" value="{{$Products->Product_Meta->keywords}}" required="true">
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label>Deskripsi Meta </label>
                                                        <textarea class="form-control" name="metaDescription" rows="5" value="{{$Products->Product_Meta->description}}" required="true">{{$Products->Product_Meta->description}}</textarea>
                                                    </div>

                                                </div>

                                                <div class="card-box">
                                                    <h5 class="text-muted text-uppercase m-t-0 m-b-30"><b>Gambar Produk</b></h5>

                                                    <div class="table-box m-b-30">
                                                        <div class="table-detail">
                                                            <img src="{{$Products->img_main}}" class="thumb-lg" alt="img">
                                                        </div>
                                                        <div class="table-detail">
                                                            <div class="radio radio-inline">
                                                                <input type="radio" id="inlineRadio7" value="1" name="radioInline3">
                                                                <label for="inlineRadio7"> Main Image </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" id="inlineRadio8" value="2" name="radioInline3" checked="">
                                                                <label for="inlineRadio8"> Thumbnail </label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="text-center m-t-30">
                                                    <input type="file" name="" value="" placeholder="Masukkan File" disabled="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <hr />
                                                <div class="text-center p-20">
                                                     <a href="/admin/products"><button type="button" class="btn w-sm btn-info waves-effect" id="sa-back">Back</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
{{ Form::close() }}

@endsection
@section('plugins')
 <link href="/assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
 <script src="/assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
 <script src="/assets/pages/jquery.sweet-alertv2.init.js"></script>
 
 <script>
     function crud(callback){
          if($("#id").val()=="X"){
          var url = "/member/addproduct";   
          }else{
          var url = "/member/editproduct";     
          }
           
           $.ajax({
               type: "POST",
               url: url,
               data: $("#addProductsForm").serialize(), 
               success: function(result) {
                hasil=JSON.parse(result);
                $('#id').attr('value',hasil['current_id']);
                callback(result);
               }
           });
           event.preventDefault(); 
      }

    function deleteProduct(callback){
          var url = "/member/deleteProduct";            
          $.ajax({
               type: "POST",
               url: url,
               data: $("#addProductsForm").serialize(), 
               success: function(result) {
                $('#id').attr('value',"X");
               callback(result);
               }
           });
           event.preventDefault(); 
      }

      function redirect() {
          $(location).attr('href', '/member/home');
      }
 </script>
@endsection