<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="{{ $meta_desc or 'Bukulapuk adalah tempat jual beli buku online paling murah se indonesia'}}">
        <meta name="title" content="{{$meta_title or 'BUKULAPUK - JUAL BELI BUKU PALING GOKIL'}}">
        <meta name="keywords" content="{{$meta_keywords or 'Bukulapuk,Buku Bekas, Buku Baru , Buku Murah'}}">
        <meta name="author" content="Bukulapuk">

        <link rel="shortcut icon" href="/assets/images/favicon_1.ico">
        <link href="/assets/plugins/custombox/css/custombox.css" rel="stylesheet">
        <link href="/assets/plugins/footable/css/footable.core.css" rel="stylesheet">
        <link href="/assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />


        <title> {{ $title or 'BUKULAPUK - JUAL BELI BUKU PALING GOKIL!' }}</title>
        
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="/assets/js/modernizr.min.js"></script>


    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">
         @include('layouts.home.header')
            <div class="container-alt">
               <div class="row">
                  <div class="col-md-6 col-xs-12">
                     <!-- START carousel-->
                     <div id="carousel-banner" data-ride="carousel" class="carousel slide">
                        <ol class="carousel-indicators">
                           <li data-target="#carousel-banner" data-slide-to="0" class="active"></li>
                           <li data-target="#carousel-banner" data-slide-to="1" class=""></li>
                           <li data-target="#carousel-banner" data-slide-to="2" class=""></li>
                        </ol>
                        <div role="listbox" class="carousel-inner">
                           <div class="item active">
                              <img src="assets/images/hujan_safar.jpg" alt="First slide image" class="img-responsive">
                           </div>
                           <div class="item">
                              <img src="assets/images/toko-buku-online.jpg" alt="Second slide image" class="img-responsive">
                           </div>
                           <div class="item">
                              <img src="assets/images/Promo-buku-GGF-01.jpg" alt="Third slide image" class="img-responsive">
                           </div>
                        </div>
                     </div>
                     <style>
                       .img-responsive{
                        object-fit: cover;
                       }
                     </style>
                     <!-- END carousel-->
                  </div>
                  <div class="col-md-6 col-xs-12 hidden-xs">
                     <div class="row">
                        <div class="col-md-12" style="margin-bottom: 20px">
                           <img src="assets/images/Banner-Paket-Buku-Promo.jpg" alt="First slide image" class="img-responsive">
                        </div>
                        <div class="col-md-12">
                           <img src="assets/images/Banner-Paket-Buku-Promo-Agustus.jpg" alt="First slide image" class="img-responsive">
                        </div>
                     </div>
                  </div>
               </div>
               <!--End Top Banner-->
            </div>
            <!--BUKU TERBARU-->
            <div class="container-alt m-t-40">
               <div class="row m-b-15">
                  <div class="text-center">
                     <h2>BUKU TERBARU</h2>
                  </div>
                  @foreach($Latests as $Latest)
                  @if($Latest->Member->status==1)
                  <div class="col-sm-6 col-lg-3 col-md-4 col-xs-6">
                     <div class="product-list-box thumb" style="padding-bottom: 54px" onmouseover="dispBuy(this)" onmouseout="hideBuy(this)">
                        <a href="#;" class="image-popup" title="Screenshot-1">
                        <img src="{{$Latest->img_main}}" class="thumb-img" alt="work-thumbnail">
                        </a>
                        <div class="product-action"></div>
                        <div class="detail">
                           <h4 class="m-t-0"><a href="" class="text-dark">{{ $Latest->judul or 'Contoh'}}</a> </h4>
                           <div class="rating">
                              <ul class="list-inline">
                                 <li><a class="fa fa-star" href=""></a></li>
                                 <li><a class="fa fa-star" href=""></a></li>
                                 <li><a class="fa fa-star" href=""></a></li>
                                 <li><a class="fa fa-star" href=""></a></li>
                                 <li><a class="fa fa-star-o" href=""></a></li>
                              </ul>
                           </div>
                           <h5 class="m-0"> <span class="text-muted"> Stock : {{ $Latest->kuantitas or '1'}}</span></h5>
                           <div style="display: none;" class="text-center p-t-10"><a href="/product/{{$Latest->id}}"><button type="button" class="btn btn-inverse waves-effect waves-light">
                              <i class="md-add-shopping-cart m-r-5" ></i> BELI SEKARANG
                              </button></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
                  @endforeach
                  <!--End Buku Baru-->
               </div>
            </div>
            <!--BUKU TERLARIS-->
            <div class="container-alt m-t-40">
               <div>
                  <div class="text-center">
                     <h2>BUKU TERLARIS</h2>
                  </div>
                  <div class="row m-b-15">
                  @foreach($MostBuys as $MostBuy)
                   @if($MostBuy->Member->status==1)
                     <div class="col-sm-6 col-lg-3 col-md-4 col-xs-6">
                        <div class="product-list-box thumb" style="padding-bottom: 54px" onmouseover="dispBuy(this)" onmouseout="hideBuy(this)">
                           <a href="#;" class="image-popup" title="Screenshot-1">
                           <img src="{{ $MostBuy->img_main or '/assets/images/noImage.png'}}" class="thumb-img" alt="work-thumbnail">
                           </a>
                           <div class="product-action">

                           </div>
                           <div class="detail">
                              <h4 class="m-t-0"><a href="" class="text-dark">{{ $MostBuy->judul or 'Contoh'}}</a> </h4>
                              <div class="rating">
                                 <ul class="list-inline">
                                    <li><a class="fa fa-star" href=""></a></li>
                                    <li><a class="fa fa-star" href=""></a></li>
                                    <li><a class="fa fa-star" href=""></a></li>
                                    <li><a class="fa fa-star" href=""></a></li>
                                    <li><a class="fa fa-star-o" href=""></a></li>
                                 </ul>
                              </div>
                              <h5 class="m-0"> <span class="text-muted"> Stock : {{ $MostBuy->kuantitas or '1'}}</span></h5>
                              <div style="display: none;" class="text-center p-t-10">
                              <a href="/product/{{$MostBuy->id}}">
                                <button type="button" class="btn btn-inverse waves-effect waves-light">
                                 <i class="md-add-shopping-cart m-r-5" ></i> BELI SEKARANG
                                 </button>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endif
                     @endforeach
                     <div class="col-md-12 m-b-30 m-t-30" align="center">
                        <a href="/browse">
                        <button type="button" class="btn btn-inverse btn-custom waves-effect waves-light">Explore More Books »</button>
                        </a>
                     </div>
                  </div>
                  <!--End Buku Terlaris-->
               </div>
                           <!--Penerbit-->
            <div class="container-alt m-t-40">
               <div class="row m-b-15">
                  <div class="text-center">
                     <h2>PENERBIT</h2>
                  </div>
                  <div class="row">
                     <div class="col-md-4 col-xs-4">
                        <a href="#"><img src="assets/images/gramedia.jpg" class="img-responsive"></a>
                     </div>
                     <div class="col-md-4 col-xs-4">
                        <a href="#"><img src="assets/images/erlangga.jpg" class="img-responsive"></a>
                     </div>
                     <div class="col-md-4 col-xs-4">
                        <a href="#"><img src="assets/images/elex-media.jpg" class="img-responsive"></a>
                     </div>
                  </div>
                  <div class="row" style="margin-top: 20px">
                     <div class="col-md-4 col-xs-4">
                        <a href="#"><img src="assets/images/Mizan-Group.jpg" class="img-responsive"></a>
                     </div>
                     <div class="col-md-4 col-xs-4">
                        <a href="#"><img src="assets/images/republika-penerbit.jpg" class="img-responsive"></a>
                     </div>
                     <div class="col-md-4 col-xs-4">
                        <a href="#"><img src="assets/images/mepres.jpg" class="img-responsive"></a>
                     </div>
                  </div>
               </div>
               <!--End Penerbit-->
            </div>
               <!--Bottom Description-->
               <div class="container-alt">
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="panel panel-color panel-inverse">
                           <div class="panel-heading">
                              <h3 class="panel-title">BUKULAPUK</h3>
                           </div>
                           <div class="panel-body">
                              <p>
                              BUKULAPUK adalah toko buku online terbesar se-Galaksi Andromeda, BUKULAPUK atau dapat disingkat BPK adalah salah satu penjual buku antar galaksi yang paling termahsyur di dunia, sekarang memiliki 100 Anak Cabang yang tersebar di seluruh Planet di Galaksi Andromeda
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="panel panel-color panel-inverse">
                           <div class="panel-heading">
                              <h3 class="panel-title">Syarat Dan Ketentuan</h3>
                           </div>
                           <div class="panel-body">
                              <p>
                              BUKULAPUK atau BPK tidak menjamin barang sampai dengan tepat waktu dikarenakan, waktu pengiriman antar planet bisa memakan waktu > 7 Tahun Cahaya, dan Jika anda memilih kurir JNE maka kemungkinan Barang Anda akan datang pada 6 Juta Tahun Lagi.
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--END Bottom Description-->
               </div>
            </div>
            </div><div id="footer">
            <div class="container-alt" style="border-top: 1px solid rgba(0,0,0,0.1);">
               <div class="row" style="margin-top: 20px;margin-bottom: 20px">
                  <div class="col-md-2 col-xs-4">
                     <h4 style="border-bottom: 1px solid rgba(0,0,0,0.1)"><b>PEMBELI</b></h4>
                     <p>Cara Belanja</p>
                     <p>Pembayaran</p>
                     <p>Tips Berbelanja</p>
                     <p>Konfirmasi Order</p>
                  </div>
                  <div class="col-md-2 col-xs-4">
                     <h4 style="border-bottom: 1px solid rgba(0,0,0,0.1"><b>PENJUAL</b></h4>
                     <p>Cara Berjualan</p>
                     <p>Keuntungan</p>
                     <p>Tips Berjualan</p>
                     <p>Panduan</p>
                     <p>Direktori Penjual</p>
                  </div>
                  <div class="col-md-2 col-xs-4">
                     <h4 style="border-bottom: 1px solid rgba(0,0,0,0.1"><b>CARI KAMI DI</b></h4>
                     <p><a href="#" title="Facebook" style="color:#797979"><i class="fa fa-facebook-square"> Facebook</i></a></p>
                     <p><a href="#" title="Twitter" style="color:#797979"><i class="fa fa-twitter-square"> Twitter</i></a></p>
                     <p><a href="#" title="Instagram" style="color:#797979"><i class="fa fa-instagram"> Instagram</i></a></p>
                     <p><a href="#" title="Youtube" style="color:#797979"><i class="fa fa-youtube-square"> Youtube</i></a></p>
                     <p><a href="#" title="Google+" style="color:#797979"><i class="fa fa-google-plus-square"> Google+</i></a></p>
                  </div>
                  <div class="col-md-3 col-xs-6">
                     <h4 style="border-bottom: 1px solid rgba(0,0,0,0.1"><b>METODE PEMBAYARAN</b></h4>
                        <p>COD*</p>
                        <p>Visa</p>
                        <p>Master Card</p>
                        <p>Mandiri Click Pay</p>
                  </div>
                  <div class="col-md-3 col-xs-6">
                     <h4 style="border-bottom: 1px solid rgba(0,0,0,0.1"><b>JASA PENGIRIMAN</b></h4>
                        <p>JNE</p>
                        <p>POS Indonesia</p>
                        <p>TIKI</p>
                  </div>
               </div>
            </div>
            <div class="container-fluid" style="background-color: #36404a;color: white">
               <div class="row">
                  <div class="col-xs-12" style="border-bottom: 1px solid rgba(255,255,255,0.1)">
                     <div class="p-20" style="float: right;">
                        <a href="#" style="border-right: solid white 1px; padding-right: 8px; padding-left: 8px; color: white">Tentang Bukulapuk</a>
                        <a href="#" style="border-right: solid white 1px; padding-right: 8px; padding-left: 8px; color: white">Kebijakan Privasi</a>
                        <a href="#" style="border-right: solid white 1px; padding-right: 8px; padding-left: 8px; color: white">Bantuan</a>
                        <a href="#" style="padding-right: 8px; padding-left: 8px; color: white">Kontak</a>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-12">
                     <div class="p-20" style="float: left;">
                        ©2017 BUKULAPUK - JUAL BELI BUKU PALING GOKIL!
                     </div>
                  </div>
               </div>
            </div>
            <!--End Footer-->


      <!-- Display BELI SEKARANG on mouseover-->
      <script type="text/javascript">
         function dispBuy(x){
            var c=x.children;
            var d=c[2].children;
            x.style.cssText="padding-bottom:10px";
            d[3].style.display="block";
         
         }
         function hideBuy(x){
            var c=x.children;
            var d=c[2].children;
            x.style.cssText="padding-bottom:54px";
            d[3].style.display="none";
         }
      </script><!-- END Disp BELI SEKARANG> -->
<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/detect.js"></script>
        <script src="/assets/js/fastclick.js"></script>

        <script src="/assets/js/jquery.slimscroll.js"></script>
        <script src="/assets/js/jquery.blockUI.js"></script>
        <script src="/assets/js/waves.js"></script>
        <script src="/assets/js/wow.min.js"></script>
        <script src="/assets/js/jquery.nicescroll.js"></script>
        <script src="/assets/js/jquery.scrollTo.min.js"></script>
        <script src="/assets/js/jquery.core.js"></script>
        <script src="/assets/js/jquery.app.js"></script>

         @yield('plugins')
       
    </body>
</html>