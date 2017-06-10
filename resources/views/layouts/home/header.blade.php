<!-- ========== Top Bar Start ========== -->
<body class="fixed-left">
      <div id="wrapper">
         <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left" style="width: 240px">
               <div class="text-center">
                 <a href="/" class="logo"><i class="icon-book-open icon-c-logo"></i><span>BUKULAPUK</span></a>
               </div>
            </div>
            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
               <div class="container">
                  <div class="">
                     <ul class="nav navbar-nav hidden-xs">
                        <li><a href="/browse" class="waves-effect waves-light">Browse</a></li>
                        <li class="dropdown">
                           <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              @foreach($Categories as $Category)   
                              <li><a href="/category/{{$Category->id}} "> {{$Category->name}} </a></li>
                              @endforeach
                           </ul>
                        </li>
                     </ul>
                     <form role="search" class="navbar-left app-search pull-left hidden-xs" action="/search" name="search" method="post">
                         {{ csrf_field() }}
                        <input type="text" placeholder="Cari buku..." class="form-control" style="width:500px;" name="search">
                        <a href="#" onclick="document.forms['search'].submit(); return false;"><i class="fa fa-search"></i></a>
                     </form>
                     <ul class="nav navbar-nav navbar-right pull-right">
                        
                        <li class="top-menu-item-xs">
                           <a href="/cart" class="waves-effect waves-light"><i class="ti-shopping-cart"></i></a>
                        </li>
                        
                        <li class="dropdown top-menu-item-xs">
                           <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="ti-user"></i> </a> 
                           <ul class="dropdown-menu">
                             @if(Auth::guard('member')->check())
                              <li><a href="/login"><i class="ti-settings m-r-10 text-custom"></i> Dashboard</a></li>
                              <li><a href="/member/logout"><i class="ti-power-off m-r-10 text-custom"></i> Logout</a></li>
                             @else
                              <li><a href="/login"><i class="ti-user m-r-10 text-custom"></i> Login</a></li>
                              <li><a href="/member/register"><i class="ti-settings m-r-10 text-custom"></i> Register</a></li>
                             @endif
                           </ul>
                        </li>

                     </ul>
                  </div>
                  <!--/.nav-collapse -->
               </div>
            </div>
         </div>
         <div class="content-page" style="margin-left: 0px;padding-top: 75px">
<!-- ========== Top Bar End ========== -->
