<?php 
$meta_title=$title=$Product->Product_Meta->title;
$meta_keywords=$keywords=$Product->Product_Meta->keywords;
$meta_desc=$description=$Product->Product_Meta->description;
?>
@extends('pages.master')
@section('content')
@include('layouts.home.sidebar')
{{ Form::open(array('id'=>'comment','url'=>'/comment', 'method'=>'post')) }}
<div class="content-page">
            <!-- Start content -->
            <div class="xx">
               <div class="container">

                  <!-- Page-Title -->
                  <div class="row">
                     <div class="col-sm-12">

                        <h4 class="page-title">Detail Produk</h4>
                        <ol class="breadcrumb">
                           <li>
                              <a href="/publisher/{{$Product->publishers->id}}">{{$Product->publishers->name}}</a>
                           </li>
                           <li>
                              <a href="/category/{{$Product->Category->id}}">{{$Product->Category->name}}</a>
                           </li>
                           <li class="active">
                              {{$Product->judul}}
                           </li>
                        </ol>
                     </div>
                  </div>

                       <div class="row">
                           <div class="col-xs-12">
                               <div class="card-box product-detail-box">
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <div class="sp-loading"><img src="/assets/images/sp-loading.gif" alt=""><br>LOADING
                                               IMAGES
                                           </div>
                                           <div class="sp-wrap">
                                               <a href="{{$Product->img_main}}"><img src="{{$Product->img_main}}" alt=""></a>
                                           </div>
                                       </div>

                                       <div class="col-sm-8">
                                           <div class="product-right-info">
                                               <h3><b>{{$Product->judul}}</b></h3>
                                               <a href="/seller/{{$Product->Member->id}}"><h4>Penjual : {{$Product->Member->username}}</h4></a>
                                               <div class="rating">
                                                    <ul class="list-inline">
                                                        <li><a class="fa fa-star" href=""></a></li>
                                                        <li><a class="fa fa-star" href=""></a></li>
                                                        <li><a class="fa fa-star" href=""></a></li>
                                                        <li><a class="fa fa-star" href=""></a></li>
                                                        <li><a class="fa fa-star-o" href=""></a></li>
                                                    </ul>
                                                </div>

                                               <h2> <b>Rp {{$Product->harga}}</b><small class="text-muted m-l-10"><del>{{$Product->harga*1.2}}</del> </small></b></h2>
                                               @if($Product->kuantitas>0)
                                               <h5 class="m-t-20"><b>Stock: </b> {{$Product->kuantitas}}pcs. <span class="label label-default m-l-5">In Stock</span></h5>
                                               @else
                                                <h5 class="m-t-20"><b>Stock: </b> {{$Product->kuantitas}}pcs. <span class="label label-danger m-l-5">Out Of Stock</span></h5>
                                               @endif
                                               <hr/>

                                               <h5 class="font-600">Deskripsi Buku</h5>

                                               <p class="text-muted">{{$Product->description}}</p>

                                               <div class="m-t-30">
                                                   @if($Product->kuantitas>0)
                                                   <a href="/addCart/{{$Product->id}}">
                                                   <button type="button" class="btn btn-inverse waves-effect waves-light m-l-10">
                                                     <span class="btn-label"><i class="fa fa-shopping-cart"></i>
                                                     </span>Beli Sekarang
                                                   </button>
                                                   </a>
                                                   @endif
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <!-- end row -->

                                   <div class="row m-t-30">
                                       <div class="col-xs-12">
                                           <h4><b>Keterangan Buku:</b></h4>
                                           <div class="table-responsive m-t-20">
                                               <table class="table">
                                                   <tbody>
                                                       <tr>
                                                           <td width="400">Penerbit</td>
                                                           <td>
                                                              {{$Product->publishers->name}}
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td>Tahun</td>
                                                           <td>
                                                               {{$Product->tahun_terbit}}
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td>Kategori</td>
                                                           <td>
                                                               {{$Product->Category->name}}
                                                           </td>
                                                       </tr>
                                                       
                                                   </tbody>
                                               </table>
                                           </div>
                                       </div>
                                   </div>


                               </div> <!-- end card-box/Product detai box -->
                           </div> <!-- end col -->
                       </div> <!-- end row -->


                       <div class="row">
                           <div class="col-xs-12">
                           <div class="container">
<div class="row">
<div class="col-md-12 col-lg-12 col-sm-12">
<div class="imgcontainer">
  </div>
</div>
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="panel">
            <!--Heading-->
            <div class="panel-heading">
                <h3 class="panel-title">Comment</h3>
            </div>
    
            <!--Widget body-->
            <div id="chat-body" class="collapse in">
                <div class="nano has-scrollbar">
                    <div class="nano-content pad-all" tabindex="0" style="right: -1.2vw;">
                    <ul class="list-unstyled media-block" id="chat-box">
                       <!--chat here-->
                       @foreach($Product->Comment as $Comment)
                       
                       @if($Comment->status==1)
                       <li class="mar-btm">
                          <div class="media-left">
                            <img src="/assets/images/users/avatar-11.jpg" class="img-circle img-sm" alt="Profile Picture">
                          </div>
                          <div class="media-body pad-hor">
                            <div class="speech">
                              @if($Comment->member==$Product->member)
                              <a href="#" class="media-heading">{{$Comment->Member->username}} (Penjual)</a>
                              @else
                              <a href="#" class="media-heading">{{$Comment->Member->username}}</a>
                              @endif
                                <p>{{$Comment->commentary}}</p>
                                <p class="speech-time"><i class="fa fa-clock-o fa-fw"></i>{{$Comment->created_at}}</p>
                            </div>
                          </div>
                       </li>
                       @endif

                       @endforeach
                    </ul>
                    </div>
                <div class="nano-pane"><div class="nano-slider" style="height: 1.2vw; transform: translate(0px, 0px);"></div></div></div>
                <form id="chat-form">
                <div class="panel-footer">
                    <div class="row">
                    
                        <div class="col-xs-9">
                            @if($Product->kuantitas==0)
                            <input type="text" placeholder="Masukkan Pesan Anda" name="comment" class="form-control chat-input" required="" disabled="">
                            @else
                            <input type="text" placeholder="Masukkan Pesan Anda" name="comment" class="form-control chat-input" required="">
                            @endif
                            <input type="hidden" name="id" value="{{$Product->id}}">
                        </div>
                        <div class="col-xs-3">
                            <button class="btn btn-primary btn-block" type="submit" >Send</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
<!--END CONTAINER -->
                                   <!-- end row -->
                               </div> <!-- end card-box/Comment box -->
                           </div> <!-- end col -->
                       </div> <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
                <style>.footer{bottom: initial;}</style>
{{ Form::close() }}
@endsection
@section('plugins')
         <link href="/assets/plugins/smoothproducts/css/smoothproducts.css" rel="stylesheet" type="text/css" />
         <link href="/assets/css/comment.css" rel="stylesheet" type="text/css" />
         <script src="/assets/plugins/smoothproducts/js/smoothproducts.min.js"></script>
         <script type="text/javascript">
            // wait for images to load
            $(window).load(function() {
                $('.sp-wrap').smoothproducts();
            });
        </script>
@endsection