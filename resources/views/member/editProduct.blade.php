<?php
$title="BUKULAPUK - Tambah / Ubah Product";
$page_title="Tambah / Ubah Product";
$page_desc="Tambahkan atau ubah produk anda";
?>
@extends('layouts.member.master')
@section('content')
{{ Form::open(array('id'=>'addProductsForm','url'=>'/member/products/edit', 'files' => true)) }}
                        <div class="row">
                            <div class="col-sm-12">
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card-box">
                                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Umum</b></h5>
                                                    <div class="form-group m-b-20">
                                                        <label>Nama Buku <span class="text-danger">*</span></label>
                                                        <input type="text" name="nama_produk" class="form-control" placeholder="e.g : A Sing of Ice And Fire" required="true" value="{{$Product->judul}}">
                                                        <input type="hidden" name="id" value="{{$Product->id or 'X'}}" id="id">
                                                    </div>
                                                    <div class="form-group m-b-20">
                                                        <label>Deskripsi <span class="text-danger">*</span></label>
                                                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Buku ASOIAF Bekas 2 Tahun Kondisi Bagus Murah" required="true">{{$Product->description}}</textarea>
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label>Kategori <span class="text-danger">*</span></label>
                                                        <select class="form-control select2" name="kategori" required="true">
                                                            @foreach($Categories as $Category)    
                                                            @if($Product->category==$Category->id)
                                                            <option value="{{ $Category->id }}" selected="">{{ $Category->name }}</option>
                                                            @endif
                                                            <option value="{{ $Category->id }}">{{ $Category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                    <div class="form-group m-b-20">
                                                        <label>Penerbit <span class="text-danger">*</span></label>
                                                        <select class="form-control select2" name="penerbit" required="true">
                                                             @foreach($Publishers as $Publisher)    
                                                              @if($Product->penerbit==$Publisher->id)
                                                            <option value="{{ $Publisher->id }}" selected="">{{ $Publisher->name }}</option>
                                                              @endif
                                                              <option value="{{ $Publisher->id }}">{{ $Publisher->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label>Tahun Terbit <span class="text-danger">*</span></label>
                                                        <select class="form-control select2" name="tahun_terbit" required="true">
                                                          @for($i=1950;$i < 2017;$i++)
                                                            @if($Product->tahun_terbit==$i)
                                                            <option value=" {{ $i }} " selected="true">{{ $i }}</option>
                                                            @endif
                                                            <option value=" {{ $i }} ">{{ $i }}</option>
                                                          @endfor
                                                         </select>
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label>Harga <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="harga" value="{{ $Product->harga or '200000'}}">
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label>Kuantitas <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="kuantitas" value="{{ $Product->kuantitas or '10'}}" required="true">
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label class="m-b-15">Status <span class="text-danger">*</span></label>
                                                        <br/>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="inlineRadio1" name="status" value="2" name="radioInline" checked="">
                                                            <label for="inlineRadio1"> Online </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="inlineRadio2" name="status" value="5" name="radioInline">
                                                            <label for="inlineRadio2"> Offline </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="inlineRadio3" name="status" value="4" name="radioInline">
                                                            <label for="inlineRadio3"> Draft </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="card-box">
                                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>Meta Data</b></h5>

                                                    <div class="form-group m-b-20">
                                                        <label>Judul Meta</label>
                                                        <input type="text" name="metaTitle" class="form-control" placeholder="e.g : A Sing of Ice And Fire" value="{{$Product->Product_Meta->title}}">
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label>Keyword Meta</label>
                                                        <input type="text" name="metaKeywords" class="form-control" placeholder="e.g : Buku , ASOIAF Game Of Thrones , GOT" required="true" value="{{$Product->Product_Meta->keywords}}">
                                                    </div>

                                                    <div class="form-group m-b-20">
                                                        <label>Deskripsi Meta </label>
                                                        <textarea class="form-control" name="metaDescription" rows="5" placeholder="Buku ASOIAF Bekas 2 Tahun Kondisi Bagus Murah" required="true">{{$Product->Product_Meta->description}}</textarea>
                                                    </div>

                                                </div>

                                                <div class="card-box">
                                                    <h5 class="text-muted text-uppercase m-t-0 m-b-30"><b>Gambar Produk</b></h5>

                                                    <div class="table-box m-b-30">
                                                        <div class="table-detail">
                                                            <img src="{{$Product->img_main}}" class="thumb-lg" alt="img">
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
                                                    <input type="file" name="image" value="X" id="image" placeholder="Masukkan File">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <hr />
                                                <div class="text-center p-20">
                                                     <button type="button" class="btn w-sm btn-white waves-effect" id="sa-cancel">Cancel</button>
                                                     <button type="button" class="btn w-sm btn-default waves-effect waves-light" id="sa-save">Save</button>
                                                     <button type="button" class="btn w-sm btn-danger waves-effect waves-light" id="sa-delete">Delete</button>
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
          if($("#image").get(0).files.length===0){
             if($("#id").val()=="X"){
                var url = "/member/products/add";   
              }else{
                var url = "/member/products/edit";     
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
          }else{
            $("#addProductsForm").submit();
          }
      }

    function deleteProduct(callback){
          var url = "/member/products/delete";            
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